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
     * @return int $id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return String $title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @return String $isbn
     */
    public function getIsbn() {
        return $this->isbn;
    }

    /**
     * @return String $author
     */
    public function getAuthor() {
        return $this->author;
    }

    /**
     * @return Category $category
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @param String $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @param String $isbn
     */
    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    /**
     * @param String $author
     */
    public function setAuthor($author) {
        $this->author = $author;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category) {
        $this->category = $category;
    }

    /**
     * @param Array $data
     * @return Object
     */
    public function exchangeArray($data) {
        foreach (get_object_vars($this) as $property => $value) {
            $this->$property = isset($data[$property]) ? $data[$property] : $value;
        }

        return $this;
    }

    /**
     * @return Array
     */
    public function toArray() {
        $array = array();

        foreach (get_object_vars($this) as $property => $value) {
            $array[$property] = $this->$property;
        }

        return $array;
    }

}