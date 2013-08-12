<?php

namespace Bookstore\Form;

use Zend\Form\Form;

class BookForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct();
	
		$this->setName('book-form');
	
		$this->setAttributes(array(
			'method' => 'post',
		));

		$this->add(array(
			'name' => 'id',
			'attributes' => array(
				'type'  => 'hidden',
				'value' => '0',
			),
		));

		$this->add(array(
			'name' => 'title',
			'attributes' => array(
				'type' => 'text',
			),
			'options' => array(
				'label' => 'Title : '
			)
		));

		$this->add(array(
			'name' => 'isbn',
				'attributes' => array(
					'type' => 'text',
				),
				'options' => array(
					'label' => 'ISBN : '
				)
		));

		$this->add(array(
			'name' => 'author',
			'attributes' => array(
				'type' => 'text',
			),
			'options' => array(
				'label' => 'Author : '
			)
		));

		$this->add(array(
			'type' => 'Zend\Form\Element\Button',
			'name' => 'submit',
			'attributes' => array(
				'type' => 'submit',
			),
		));
	}
}