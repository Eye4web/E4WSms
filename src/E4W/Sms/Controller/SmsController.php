<?php
namespace E4W\Sms\Controller;

use E4W\Sms\Service\SmsService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SmsController extends AbstractActionController
{
    /* @var SmsService */
    protected $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function indexAction()
    {
        $smsService = $this->smsService;

        if (count($_POST)) {
            return $smsService->receive($_POST);
        } elseif (count($_GET)) {
            return $smsService->receive($_GET);
        } else {
            throw new \Exception('No data was received');
        }
    }
}
