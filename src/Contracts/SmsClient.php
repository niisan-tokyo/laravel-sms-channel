<?php
namespace Niisan\Notification\Contracts;

use Niisan\Notification\SmsMessage;

interface SmsClient
{
    public function send(SmsMessage $message): void;
}