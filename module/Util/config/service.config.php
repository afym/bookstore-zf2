<?php
namespace Util;

use Zend\ServiceManager\ServiceLocatorInterface;
use Util\DataBase\Connection;

return array(
	'factories' => array(
		'connection' => function(ServiceLocatorInterface $e) {
			$configuration = $e->get('config');
			return new Connection($configuration['db']);
		}
	)
);