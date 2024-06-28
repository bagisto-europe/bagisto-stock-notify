<?php

return [
    'admin' => [
        'section-title' => 'Lagerbenachrichtigung',
        'section-info'  => 'Stellen Sie das Intervall und die Produktgrenze für Inventur-Update-Benachrichtigungen ein',
        'status'        => 'Benachrichtigung senden, wenn Produkte den Schwellenwert erreichen',
        'schedule'      => 'Benachrichtigung planen',
        'schedule-info' => 'Wann soll die Benachrichtigung gesendet werden?',
        'interval' => [
            'hourly' => 'Stündlich',
            'daily'  => 'Täglich',
            'weekly' => 'Wöchentlich'
        ],
        'min-stock'     => 'Produktschwelle'
    ],

    'mail' => [
        'subject'     => 'Bestandsmeldedienst',
        'dear-reader' => 'Sehr geehrter Leser',
        'message'     => 'Im Anhang dieser E-Mail finden Sie eine Übersicht aller Produkte, die den Bestandsschwellenwert erreicht haben.'
    ]
];