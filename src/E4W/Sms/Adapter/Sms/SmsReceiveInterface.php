<?php

namespace E4W\Sms\Adapter\Sms;

interface SmsReceiveInterface {
    public function receive(array $data);
}
