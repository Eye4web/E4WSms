<?php
namespace E4W\Sms\Factory\Adapter;

use E4W\Sms\Adapter\Sms\StadelAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class StadelAdapterFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return StadelAdapter
     */
    public function createService (ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var \Doctrine\ORM\EntityManager $entityManager
         * @var \E4W\Sms\Adapter\Sms\SmsAdapterInterface $adapter
         */
        $adapter = new StadelAdapter;

        // Adapter
        $config = $serviceLocator->get('Config');
        $adapter->setConfig($config['e4wsms']['stadel']);

        // Receivable
        if (isset($config['e4wsms']['receivable'])) {
            $receivable = $serviceLocator->get($config['e4wsms']['receivable']);
            $adapter->setReceivable($receivable);
        }

        return $adapter;
    }
}
