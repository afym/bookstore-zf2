<?php

namespace Bookstore\Service;

use Bookstore\Repository\BookRepository;
use Bookstore\Entity\Book;

class BookService {
    private $bookRepository;

    public function __construct(BookRepository $bookRepository) {
        $this->bookRepository = $bookRepository;
    }

    public function getAll() {
        $arrayBooks = $this->bookRepository->find();
        $books = new \ArrayObject();

        foreach ($arrayBooks as $book) {
            $entityBook = new Book();
            $books->append($entityBook->exchangeArray($book));
        }

        return $books;
    }

    public function save($data) {
        return $this->bookRepository->add($data);
    }
}