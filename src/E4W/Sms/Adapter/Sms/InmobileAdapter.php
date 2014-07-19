<?php
namespace E4W\Sms\Adapter\Sms;

class InmobileAdapter implements SmsAdapterInterface
{
    protected $config;

    /**
     * Send message
     * @param $to
     * @param $text
     * @param string $from
     * @return mixed
     */
    public function send($to, $text, $from = null)
    {
        if ($from == null) {
            $from = '1245';
        }

        $config = $this->getConfig();
        $url = "https://mm.inmobile.dk/Api/V2/SendMessages";
        $post = "xml=<request>
       <authentication
          apikey=\"".$config['apiKey']."\" />
       <data>
             <message>
                    <sendername>".$from."</sendername>
                    <text><![CDATA[".iconv("UTF-8", "ISO-8859-1", $text)."]]></text>
                    <recipients>
                           <msisdn>".$to."</msisdn>
                    </recipients>
             </message>
       </data>
</request>";

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
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
