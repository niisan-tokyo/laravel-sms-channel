<?php
namespace Niisan\Notification;

use Illuminate\Notifications\Notification;
use Niisan\Notification\Contracts\SmsClient;

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
        
    }
}