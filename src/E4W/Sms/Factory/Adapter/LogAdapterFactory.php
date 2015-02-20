<?php

namespace E4W\Sms\Factory\Adapter;

use E4W\Sms\Adapter\Sms\LogAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LogAdapterFactory implements FactoryInterface
{
    /**
     * Offer service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $logger = $serviceLocator->get('Log\Sms');
        
        $service = new LogAdapter($logger);
        
        return $service;
    }
}
