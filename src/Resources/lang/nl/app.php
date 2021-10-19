<?php

return [
    'admin' => [
        'section-title' => 'Voorraad Notificatie',
        'status'        => 'Stuur een melding wanneer producten de drempel bereiken',
        'schedule'      => 'Notificatie plannen',
        'schedule-info' => 'Wanneer moet de notificatie worden verzonden?',
        'interval' => [
            'hourly' => 'Per uur',
            'daily'  => 'Dagelijks',
            'weekly' => 'Wekelijks'
        ],
        'min-stock'     => 'Productdrempel'
    ],

    'mail' => [
        'subject'     => 'Voorraad rapportage',
        'dear-reader' => 'Geachte lezer',
        'message'     => 'In de bijlage van deze e-mail vindt u een overzicht van alle producten die de voorraaddrempel hebben bereikt.'
    ]
];