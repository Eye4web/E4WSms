<?php
namespace E4W\Sms\Adapter\Sms;

class BulkSmsAdapter implements SmsAdapterInterface
{
    /** @var array */
    protected $config;

    /**
     * Send message
     */
    public function send($to, $text, $from)
    {
        $sender = ($from) ? $from : $this->config['sender'];
        $url = 'https://bulksms.vsms.net/eapi/submission/send_sms/2/2.0';
        $fields = array(
            'username' => urlencode($this->config['username']),
            'password' => urlencode($this->config['password']),
            'message' => urlencode($text),
            'msisdn' => urlencode(str_replace("+", "", $to)),
            'sender' => urlencode($sender),
        );
        $fieldString = http_build_query($fields);

        try {
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, count($fields));
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fieldString);
            //curl_setopt($ch, CURLOPT_FAILONERROR, true);
            //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
        } catch (\Exception $e) {}
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
