<?php
namespace Niisan\Notification\Clients;

use Niisan\Notification\Contracts\SmsClient;
use Niisan\Notification\SmsMessage;
use Twilio\Rest\Client;

class Twilio implements SmsClient
{

    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
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
        $this->client->messages->create(
            $message->to,
            [
                'from' => $message->from,
                'body' => $message->body,
                'smartEncoded' => $message->unicode
            ]
        );
    }
}