<?php

namespace Bagisto\StockNotify\Exports;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OutOfStockExport implements ShouldAutoSize, FromQuery, WithHeadings, Responsable
{
    use Exportable;

    private $fileName = 'inventory-report.xlsx';

    public function query()
    {
        return DB::table('product_flat')
        ->leftJoin('products', 'product_flat.product_id', '=', 'products.id')
        ->leftJoin('product_inventories', 'product_flat.product_id', '=', 'product_inventories.product_id')
        ->leftJoin('inventory_sources as warehouse', 'product_inventories.inventory_source_id', '=', 'warehouse.id')
        ->select(
            'product_flat.product_id',
            'products.sku as product_sku',
            'product_flat.product_number',
            'product_flat.name as product_name',
            'products.type as product_type',
            'product_flat.price',
            DB::raw('SUM(DISTINCT ' . DB::getTablePrefix() . 'product_inventories.qty) as quantity'),
            'product_flat.channel',
            'warehouse.name'
        )
        ->where('product_flat.status', '=', 1)
        ->where('product_inventories.qty', '=<', core()->getConfigData('catalog.inventory.notifications.min-stock'))
        ->orderBy('product_flat.id', 'DESC')->groupBy('product_flat.product_id', 'product_flat.locale', 'product_flat.channel', 'warehouse.id');
    }

    public function headings() :array
    {
        return [
            trans('admin::app.datagrid.id'),
            trans('admin::app.datagrid.sku'),
            trans('admin::app.datagrid.product-number'),
            trans('admin::app.datagrid.name'),
            trans('admin::app.datagrid.type'),
            trans('admin::app.datagrid.price'),
            trans('admin::app.datagrid.qty'),
            trans('admin::app.sales.orders.channel'),
            trans('admin::app.datagrid.inventory-source')
        ];
    }
}
