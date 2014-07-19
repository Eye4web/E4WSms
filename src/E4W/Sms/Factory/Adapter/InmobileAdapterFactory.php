<?php
namespace E4W\Sms\Factory\Adapter;

use E4W\Sms\Adapter\Sms\InmobileAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class InmobileAdapterFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return InmobileAdapter
     * @throws \Exception
     */
    public function createService (ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var \Doctrine\ORM\EntityManager $entityManager
         * @var \E4W\Sms\Adapter\Sms\SmsAdapterInterface $adapter
         */
        $adapter = new InmobileAdapter;

        // Adapter
        $config = $serviceLocator->get('Config');
        $adapter->setConfig($config['e4wsms']['inmobile']);

        return $adapter;
    }
}
