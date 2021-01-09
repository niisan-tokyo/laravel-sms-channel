<?php
namespace Niisan\Notification\Clients;

use Niisan\Notification\Contracts\SmsClient;
use Niisan\Notification\SmsMessage;
use Twilio\Rest\Client;

class Twilio implements SmsClient
{

    private $client;

    public function __construct()
    {
        $this->client = new Client(
            config('sms-notification.twilio.sid'),
            config('sms-notification.twilio.token')
        );
    }
    
    /**
     * Send message through Twilio.
     *
     * @param SmsMessage $message
     *
     * @return void
     */
    public function send(SmsMessage $message): void
    {
        $this->client->message->create(
            $message->to,
            [
                'from' => $message->from,
                'body' => $message->body,
                'smartEncoded' => $message->unicode
            ]
        );
    }
}