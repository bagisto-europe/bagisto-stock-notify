<?php

return [
    'admin' => [
        'section-title' => 'Stock Notification',
        'status'        => 'Send a notification when products reach the threshold',
        'schedule'      => 'Schedule notification',
        'schedule-info' => 'When should the notification be sent?',
        'interval' => [
            'hourly' => 'Hourly',
            'daily'  => 'Daily',
            'weekly' => 'Weekly'
        ],
        'min-stock'     => 'Product threshold'
    ],

    'mail' => [
        'subject'     => 'Inventory Reporting Services',
        'dear-reader' => 'Dear reader',
        'message'     => 'In the attachment of this email you will find an overview of all products that reached the inventory threshold.'
    ]
];