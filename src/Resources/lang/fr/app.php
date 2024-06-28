<?php

return [
    'admin' => [
        'section-title' => 'Notification de Stock',
        'section-info'  => 'Définir l\'intervalle et la limite de produit pour les alertes de mise à jour d\'inventaire',
        'status'        => 'Envoyer une notification lorsque les produits atteignent le seuil',
        'schedule'      => 'Programmer la notification',
        'schedule-info' => 'Quand la notification doit-elle être envoyée ?',
        'interval' => [
            'hourly' => 'Toutes les heures',
            'daily'  => 'Quotidien',
            'weekly' => 'Hebdomadaire'
        ],
        'min-stock'     => 'Seuil de produit'
    ],

    'mail' => [
        'subject'     => 'Services de Rapport d\'Inventaire',
        'dear-reader' => 'Cher lecteur',
        'message'     => 'En pièce jointe de cet email, vous trouverez un aperçu de tous les produits ayant atteint le seuil d\'inventaire.'
    ]
];