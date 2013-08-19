<?php

namespace Bookstore;

use Zend\ServiceManager\ServiceLocatorInterface;

return array(
    'factories' => array(
        'BookService' => function(ServiceLocatorInterface $sm) {
            $connection = $sm->get('connection');
            $bookRepository = new \Bookstore\Repository\BookRepository($connection);
            return new \Bookstore\Service\BookService($bookRepository);
        }
    )
);