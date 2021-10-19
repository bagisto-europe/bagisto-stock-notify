<?php

namespace Bagisto\StockNotify\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Bagisto\StockNotify\Exports\OutOfStockExport;
use Maatwebsite\Excel\Excel as BaseExcel;
use Maatwebsite\Excel\Facades\Excel;

use Config;

class OutOfStock extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = config('mail.from.address');
        $attachment = Excel::raw(new OutOfStockExport(), BaseExcel::XLSX);
        $filename = "inventory-report.xlsx";
        $subject = trans('stocknotify::app.mail.subject');

        return $this->from($address, env('MAIL_FROM_NAME', 'Bagisto - Reporting Service'))
            ->subject($subject)
            ->view('stocknotify::email.notification')
            ->attachData($attachment, $filename);
    }
}
