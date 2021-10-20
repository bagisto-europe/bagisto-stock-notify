<?php

namespace Bagisto\StockNotify\Console\Commands;

use Bagisto\StockNotify\Mail\OutOfStock;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Webkul\User\Models\Admin;

class SendOutOfStockNotifcation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:nostock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send out of stock notifications';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (core()->getConfigData('catalog.inventory.notifications.status')) {        
            $query = DB::table('product_flat')
                ->leftJoin('products', 'product_flat.product_id', '=', 'products.id')
                ->leftJoin('product_inventories', 'product_flat.product_id', '=', 'product_inventories.product_id')
                ->select(
                    'product_flat.product_id',
                    DB::raw('SUM(DISTINCT ' . DB::getTablePrefix() . 'product_inventories.qty) as quantity'),
                    'product_flat.locale',
                    'product_flat.channel'
                    )
                ->where('product_flat.status', '=', 1)
                ->where('product_inventories.qty', '=<', core()->getConfigData('catalog.inventory.notifications.min-stock'))
                ->orderBy('product_flat.id', 'DESC')->groupBy('product_flat.product_id', 'product_flat.locale', 'product_flat.channel')->exists();
                
            if ($query) {
                $admins = Admin::all();
                    
                foreach($admins as $admin) {
                    return Mail::to($admin->email)->send(new OutOfStock());
                }
            }
        }
    }
}
