<?php

return [
    'admin' => [
        'section-title' => 'إشعار المخزون',
        'section-info'  => 'تعيين الفاصل الزمني وحد المنتج لتنبيهات تحديث المخزون',
        'status'        => 'إرسال إشعار عندما تصل المنتجات إلى الحد الأدنى',
        'schedule'      => 'جدولة الإشعار',
        'schedule-info' => 'متى يجب إرسال الإشعار؟',
        'interval' => [
            'hourly' => 'كل ساعة',
            'daily'  => 'يوميًا',
            'weekly' => 'أسبوعيًا'
        ],
        'min-stock'     => 'حد المنتج الأدنى'
    ],

    'mail' => [
        'subject'     => 'خدمات تقرير المخزون',
        'dear-reader' => 'عزيزي القارئ',
        'message'     => 'في مرفقات هذا البريد الإلكتروني ستجد نظرة عامة على جميع المنتجات التي وصلت إلى حد المخزون الأدنى.'
    ]
];
