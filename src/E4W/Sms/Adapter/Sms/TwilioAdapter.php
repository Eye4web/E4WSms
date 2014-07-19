<?php
namespace E4W\Sms\Adapter\Sms;

// Require Twilio SDK
require 'vendor/twilio/sdk/Services/Twilio.php';

class TwilioAdapter implements SmsAdapterInterface
{
    protected $config;
    protected $client;

    /**
     * Send message
     *
     * @param $to
     * @param $text
     * @param $from
     * @return object
     */
    public function send($to, $text, $from = '9991231234')
    {
        $client = $this->getClient();

        $message = $client->account->messages->sendMessage(
            $from,
            $to,
            $text
        );

        return $message;
    }

    /**
     * Call client
     *
     * @param $to
     * @param $from
     * @param string $twiml
     * @return object
     */
    public function call($to, $from, $twiml = 'http://twimlets.com/holdmusic?Bucket=com.twilio.music.ambient')
    {
        $call = $this->getClient()->account->calls->create(
            $from,
            $to,
            $twiml
        );

        return $call;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Get client
     *
     * @return \Services_Twilio
     * @throws \Exception
     */
    public function getClient()
    {
        if (!$this->client) {
            if (!isset($this->config['sid'])) {
                throw new \Exception('"sid" is missing in your configuration for Twilio');
            } elseif (!isset($this->config['token'])) {
                throw new \Exception('"token" is missing in your configuration for Twilio');
            }

            $this->client = new \Services_Twilio($this->config['sid'], $this->config['token']);
        }

        return $this->client;
    }
}
