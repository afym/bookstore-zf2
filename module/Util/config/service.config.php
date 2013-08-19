<?php

namespace Util;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;

return array(
    'factories' => array(
        'connection' => function(ServiceLocatorInterface $e) {
            $configuration = $e->get('config');
            return new Adapter($configuration['db']);
        }
    )
);