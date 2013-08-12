<?php
namespace Bookstore;

use Zend\ServiceManager\ServiceLocatorInterface;

return array(
	'factories' => array(
		'BookRepository' => function(ServiceLocatorInterface $sm) {
			$connection = $sm->get('connection');
			return new \Bookstore\Repository\BookRepository($connection);
		},
		'BookService' => function(ServiceLocatorInterface $sm) {
			$bookRepository = $sm->get('BookRepository');
			return new \Bookstore\Service\BookService($bookRepository);
		}
	)
);