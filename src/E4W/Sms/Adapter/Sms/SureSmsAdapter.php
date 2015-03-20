<?php
namespace E4W\Sms\Adapter\Sms;

class SureSmsAdapter implements SmsAdapterInterface
{
    /** @var array */
    protected $config;

    /**
     * Send message
     */
    public function send($to, $text, $from)
    {
        $response = file_get_contents('http://suresms.com/Script/GlobalSendSMS.aspx' .
        "?login=" . urlencode($this->config['user']) .
        "&password=" . urlencode($this->config['pass']) .
        "&to=" . urlencode($to) .
        "&Text=" . urlencode($text) .
        "&from=" . urlencode($this->config['sender']));

        if (preg_match("/Message sent./", $response, $array))
        {
            // SMS ID
            // $id = $array[1];
            return true;
        }
        elseif (preg_match("/^ERROR\|([0-9]+)\|(.*)$/", $response, $array))
        {
            // Error
            $error = $array[2];
            return $error;
        }
        else
        {
            // Unknown error
            $error = "Unknown answer";
            return $error;
        }
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
}
