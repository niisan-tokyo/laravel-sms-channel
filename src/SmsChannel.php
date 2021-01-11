<?php
namespace Niisan\Notification;

use Illuminate\Notifications\Notification;
use Niisan\Notification\Contracts\SmsClient;
use RuntimeException;

class SmsChannel
{

    /** @var SmsClient $client */
    private $client;

    public function __construct(SmsClient $client)
    {
        $this->client = $client;
    }

    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSms($notifiable);
        if (!$message->to) {
            if (!method_exists($notifiable, 'routeNotificationForSms')) {
                throw new RuntimeException('A notifiable object must have "routeNotificationForSms" method.');
            }
            $message->to($notifiable->routeNotificationForSms());
        }

        $message->from(config('sms-notification.default_from'));
        
        $this->client->send($message);
    }
}