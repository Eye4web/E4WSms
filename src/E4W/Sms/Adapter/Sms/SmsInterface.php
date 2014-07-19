<?php

namespace E4W\Sms\Adapter\Sms;

interface SmsAdapterInterface
{
    public function send($to, $text, $from);
    public function setConfig(array $config);
    public function getConfig();
}
