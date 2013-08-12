<?php

namespace Bookstore\Service;

use Bookstore\Repository\BookRepository;
use Bookstore\Entity\Book;

class BookService
{
	private $bookRepository;

	public function __construct(BookRepository $bookRepository)
	{
		$this->bookRepository = $bookRepository;		
	}

	public function getAll()
	{
		$arrayBooks = $this->bookRepository->fetchAll('books');
		$books = new \ArrayObject();

		foreach ($arrayBooks as $book) {
			$entityBook = new Book();
			$books->append($entityBook->exchangeArray($book));
		}

		return $books;
	}

	public function save($data)
	{
		return $this->bookRepository->persist('books', $data);
	}
}