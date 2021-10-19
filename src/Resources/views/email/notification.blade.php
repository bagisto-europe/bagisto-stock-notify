@component('shop::emails.layouts.master')
    <div style="padding: 20px;">
        <div style="font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 34px;">
            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {{ __('stocknotify::app.mail.dear-reader') }},<br> <br>
                {{ __('stocknotify::app.mail.message') }}
            </p>

        </div>

        <div style="width: 100%;margin-top: 45px;font-size: 16px;color: #5E5E5E;line-height: 24px;display: inline-block">
            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {!!
                    __('shop::app.mail.order.help', [
                        'support_email' => '<a style="color:#0041FF" href="mailto:info@bagisto.eu">info@bagisto.eu</a>'
                        ])
                !!}
            </p>
        </div>
    </div>
@endcomponent
