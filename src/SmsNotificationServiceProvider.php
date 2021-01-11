<?php
namespace Niisan\Notification;

use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;
use Niisan\Notification\Clients\Twilio;
use Niisan\Notification\Contracts\SmsClient;

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
        $this->app->bind(SmsClient::class, function ($app) {
            if (config('sms-notification.driver') === 'twilio') {
                $client = new \Twilio\Rest\Client(
                    config('sms-notification.twilio.sid'),
                    config('sms-notification.twilio.token')
                );
                return new Twilio($client);
            }
        });

        Notification::resolved(function (ChannelManager $service) {
            $service->extend('sms', function ($app) {
                return $app[SmsChannel::class];
            });
        });
    }
}