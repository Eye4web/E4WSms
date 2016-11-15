<?php
return array(
    'aliases' => array(
        'SmsService' => 'E4W\Sms\Service\SmsService',
    ),
    'factories' => array(
        'E4W\Sms\Service\SmsService' => 'E4W\Sms\Factory\Service\SmsServiceFactory',
        'E4W\Sms\Adapter\Sms\Inmobile' => 'E4W\Sms\Factory\Adapter\InmobileAdapterFactory',
        'E4W\Sms\Adapter\Sms\Smsgatewaydk' => 'E4W\Sms\Factory\Adapter\SmsgatewaydkAdapterFactory',
        'E4W\Sms\Adapter\Sms\Smscloud' => 'E4W\Sms\Factory\Adapter\SmscloudAdapterFactory',
        'E4W\Sms\Adapter\Sms\Twilio' => 'E4W\Sms\Factory\Adapter\TwilioAdapterFactory',
        'E4W\Sms\Adapter\Sms\Log' => 'E4W\Sms\Factory\Adapter\LogAdapterFactory',
        'E4W\Sms\Adapter\Sms\Stadel' => 'E4W\Sms\Factory\Adapter\StadelAdapterFactory',
        'E4W\Sms\Adapter\Sms\SureSms' => 'E4W\Sms\Factory\Adapter\SureSmsAdapterFactory',
        'E4W\Sms\Adapter\Sms\BulkSmsAdapter' => 'E4W\Sms\Factory\Adapter\BulkSmsAdapterFactory',
    ),
);
