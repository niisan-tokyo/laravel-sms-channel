<?php
namespace Test\Clients;

use Mockery;
use Niisan\Notification\Clients\Twilio;
use Niisan\Notification\SmsMessage;
use Test\TestCase;
use Twilio\Rest\Api\V2010\Account\MessageList;
use Twilio\Rest\Client;

use function PHPUnit\Framework\assertTrue;

class TwilioTest extends TestCase
{

    public function test_sendMessageFrom()
    {
        $message = new SmsMessage;
        $message->to('+0818011112222');
        $message->from('+0818022223333');
        $message->body('abcdefghijklmnopqrst');
        $message->unicode();

        $obj = Mockery::mock(MessageList::class);
        $obj->allows()->create('+0818011112222',[
            'from' => '+0818022223333',
            'body' => 'abcdefghijklmnopqrst',
            'smartEncoded' => true
        ]);
        $client = Mockery::mock(Client::class);
        $client->messages = $obj;

        $target = new Twilio($client);
        $target->send($message);

        $this>assertTrue(true);
    }
}