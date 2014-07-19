<?php
namespace E4W\Sms\Adapter\Sms;

class SmsgatewaydkAdapter implements SmsAdapterInterface
{
    protected $config;

    /**
     * Send message
     *
     * @param $to
     * @param $text
     * @param $from
     * @return string
     */
    public function send($to, $text, $from)
    {
        if($from == null) $from = '1272';
        $config = $this->getConfig();
        $url1="http://smschannel1.dk";
        $url2="http://smschannel2.dk";
        $str ="/sendsms/";
        $str .= "?username=" . $config['username'];
        $str .= "&password=" . $config['password'];
        $str .= "&to=" . $to; 
        $str .= "&from=" . $from;
        $str .= "&charset=iso-8859-1";
        $str .= "&message=".urlencode(iconv("UTF-8", "ISO-8859-1", $text));

        if (!file_get_contents($url1))	$response = file_get_contents($url2.$str);else	$response = file_get_contents($url1.$str);
        return $response;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

}
