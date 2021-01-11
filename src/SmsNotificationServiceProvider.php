<?php
namespace Niisan\Notification;

use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;
use Niisan\Notification\Clients\Twilio;

class SmsNotificationServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/sms-notification.php' => config_path('sms-notification.php'),
        ]);
    }

    public function register()
    {
        Notification::resolved(function (ChannelManager $service) {
            $service->extends('sms', function ($app) {
                if (config('sms-notification.driver') === 'twilio') {
                    $client = new \Twilio\Rest\Client(
                        config('sms-notification.twilio.sid'),
                        config('sms-notification.twilio.token')
                    );
        
                    return new Twilio($client);
                }
            });
        });
    }
}