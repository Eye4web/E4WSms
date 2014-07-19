<?php
namespace E4W\Sms\Factory\Service;

use E4W\Sms\Service\SmsService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SmsServiceFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return SmsService
     * @throws \Exception
     */
    public function createService (ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var \Doctrine\ORM\EntityManager $objectManager
         * @var \E4W\Sms\Adapter\Sms\SmsAdapterInterface $smsAdapter
         */
        $service = new SmsService;

        // Adapter
        $config = $serviceLocator->get('Config');
        $smsAdapter = $serviceLocator->get($config['e4wsms']['adapter']);
        $service->setAdapter($smsAdapter);

        return $service;
    }
}
