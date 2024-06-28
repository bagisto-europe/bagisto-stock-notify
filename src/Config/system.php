<?php

return [
    [
        'key' => 'catalog.inventory.notifications',
        'name' => 'stocknotify::app.admin.section-title',
        'info'   => 'stocknotify::app.admin.section-info',
        'sort' => 2,
        'fields' => [
            [
                'name'          => 'status',
                'title'         => 'stocknotify::app.admin.status',
                'type'          => 'boolean',
                'channel_based' => false,
            ], [
                'name'          => 'schedule',
                'title'         => 'stocknotify::app.admin.schedule',
                'info'          => 'stocknotify::app.admin.schedule-info',
                'depends'       => 'status',
                'type'          => 'select',
                'options'       => [
                    [
                        'title' => 'stocknotify::app.admin.interval.hourly',
                        'value' => 'hourly',
                    ], [
                        'title' => 'stocknotify::app.admin.interval.daily',
                        'value' => 'daily',
                    ], [
                        'title' => 'stocknotify::app.admin.interval.weekly',
                        'value' => 'weekly',
                    ]
                ],
                'default' => 'daily',
                'channel_based' => false,
            ], [
                'name'          => 'min-stock',
                'title'         => 'stocknotify::app.admin.min-stock',
                'depends'       => 'status',
                'type'          => 'text',
                'default'       => 0,
                'channel_based' => false,
            ]
        ]
    ]
];
