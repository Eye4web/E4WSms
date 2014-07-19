<?php
namespace E4W\Sms\Factory\Controller;

use E4W\Sms\Controller\SmsController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SmsControllerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $controllerManager
     * @return SmsController
     */
    public function createService (ServiceLocatorInterface $controllerManager)
    {
        /**
         * @var \Zend\ServiceManager\ServiceManager $serviceLocator
         * @var \E4W\Sms\Service\SmsService $smsService
         */
        $serviceLocator = $controllerManager->getServiceLocator();
        $smsService = $serviceLocator->get('SmsService');

        $controller = new SmsController($smsService);

        return $controller;
    }
}
