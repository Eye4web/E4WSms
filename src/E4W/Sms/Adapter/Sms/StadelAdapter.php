<?php
namespace E4W\Sms\Adapter\Sms;

class StadelAdapter implements SmsAdapterInterface, SmsReceiveInterface
{
    /** @var array */
    protected $config;

    /** @var SmsReceiveInterface */
    protected $receivable;

    /**
     * Send message
     */
    public function send($to, $text, $from)
    {
        $response = file_get_contents($this->config['api'] .
        "?user=" . urlencode($this->config['user']) .
        "&pass=" . urlencode($this->config['pass']) .
        "&mobile=" . urlencode($to) .
        "&message=" . urlencode($text) .
        "&sender=" . urlencode($this->config['sender']));

        if (preg_match("/^OK\|([0-9]+)\|(.*)$/", $response, $array))
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
     * Receive
     */
    public function receive(array $data)
    {
        // Convert charset
        array_walk_recursive($data, function(&$value, $key) {
            if (is_string($value)) {
                $value = iconv('iso-8859-1', 'utf-8', $value);
            }
        });

        $result = array(
            'name' => $data['name'],
            'zipcode' => $data['zipcode'],
            'address' => $data['address'],
            'message' => $data['message'],
            'mobile' => $data['mobile'],
            'city' => $data['city'],
        );

        if (isset($this->receivable)) {
            $this->receivable->receive($data);
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

    /**
     * @param \E4W\Sms\Adapter\Sms\SmsReceiveInterface $receivable
     */
    public function setReceivable($receivable)
    {
        $this->receivable = $receivable;
    }

    /**
     * @return \E4W\Sms\Adapter\Sms\SmsReceiveInterface
     */
    public function getReceivable()
    {
        return $this->receivable;
    }
}
