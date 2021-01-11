# laravel-sms-channel
Add SMS notification channnel to laravel.

# Usage

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