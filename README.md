# laravel-sms-channel
Add SMS notification channnel to laravel.

# Install

Fisrt, install package via composer.

```
composer require niisan/laravel-sms-notification
```

And install using client sdk.
If we use twilio, we install twilio sdk.

```
composer require twilio/sdk
```

Then we publish configuration.

```
php artisan vendor:publish --provider "Niisan\Notification\SmsNotificationServiceProvider"
```

# Usage

Set `.env`.

```
SMS_DRIVER=twilio
SMS_DEFAULT_FROM='+1111222233'
TWILIO_SID=***********************
TWILIO_TOKEN=***********************
```

In notification class, we can write followin:

```php
    public function via($notifiable)
    {
        return ['sms'];
    }

    public function toSms($notifiable)
    {
        return (new SmsMessage)
                ->body('hello world! ' . $notifiable->name);
    }
```

And in notifiable model, we get `phone_number` from `routeNotificationForSms` method to send messages:

```php
    public function routeNotificationForSms()
    {
        return $this->phone_number;
    }
```

In this case, SMS sent from the env value: `SMS_DEFAULT_FROM`.

Otherwise, set `to` and `from` by SmsMessage class:

```php
    public function toSms($notifiable)
    {
        return (new SmsMessage)
                ->body('hello world! ' . $notifiable->name)
                ->to('+2222333344')
                ->from('+1111222233');
    }
```

# Unicode

if we want to use unicode string, we use unicode method:

```php
    public function toSms($notifiable)
    {
        return (new SmsMessage)
                ->body('hello world! ' . $notifiable->name)
                ->unicode();
    }
```