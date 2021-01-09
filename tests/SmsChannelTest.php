<?php
namespace Test;

use Config;
use Illuminate\Notifications\Notification;
use Mockery;
use Niisan\Notification\Contracts\SmsClient;
use Niisan\Notification\SmsChannel;
use Niisan\Notification\SmsMessage;

class SmsChannelTest extends TestCase
{

    public function test_messageSend()
    {
        Config::set('sms-notification.default_from', '+81011111111');
        $message = new SmsMessage;
        $message->to('+81000001111')->body('Test Message')->unicode();
        $notification = Mockery::mock(Notification::class);
        $notification->allows()->toSms()->andReturn($message);

        $client = Mockery::mock(SmsClient::class);
        $client->allows()->send($message);

        $channel = new SmsChannel($client);
        $channel->send(null, $notification);
        $this->assertEquals('+81011111111', $message->from);
    }
}