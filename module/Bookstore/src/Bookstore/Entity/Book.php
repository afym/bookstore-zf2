<?php

namespace Bookstore\Entity;
use Bookstore\Entity\Category;

/**
 * @author Frank  
 */

class Book {
	private $id;
	private $title;
	private $isbn;
	private $author;
	private $category;

	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return the $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @return the $isbn
	 */
	public function getIsbn() {
		return $this->isbn;
	}

	/**
	 * @return the $author
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * @return the $category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * @param field_type $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @param field_type $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @param field_type $isbn
	 */
	public function setIsbn($isbn) {
		$this->isbn = $isbn;
	}

	/**
	 * @param field_type $author
	 */
	public function setAuthor($author) {
		$this->author = $author;
	}

	/**
	 * @param field_type $category
	 */
	public function setCategory(Category $category) {
		$this->category = $category;
	}

	public function exchangeArray($data) 
	{
		$this->id = isset($data['id']) ? $data['id'] : null;
		$this->title = isset($data['title']) ? $data['title'] : null;
		$this->isbn = isset($data['isbn']) ? $data['isbn'] : null;
		$this->author = isset($data['author']) ? $data['author'] : null;
		
		return $this;
	}

	public function toArray()
	{
		return array(
			'id' 	 => $this->id,
			'title'  => $this->title,
			'isbn' 	 => $this->isbn,
			'author' => $this->author,
		);
	}
}