<?php

namespace Bookstore\Form;

use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory;
use Util\Form\FilterInterface;

class BookFilter implements InputFilterAwareInterface, FilterInterface
{
	private $inputFilter;
	private $factory;

	public function __construct()
	{
		$this->inputFilter = new InputFilter();
		$this->factory = new Factory();
	}

	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw  new \Exception('Not used');
	}

	public function getInputFilter()
	{
		$this->addElement($this->getId())
			 ->addElement($this->getTitle())
			 ->addElement($this->getIsbn())
			 ->addElement($this->getAuthor());

		return $this->inputFilter;
	}

	public function addElement($element)
	{
		$this->inputFilter->add($this->factory->createInput($element));

		return $this;
	}

	private function getId()
	{
		return array(
				'name'     => 'id',
				'required' => true,
				'filters'  => array(
						array('name' => 'Int'),
				),
		);
	}

	private function getTitle()
	{
		return array(
			'name'     => 'title',
			'required' => true,
			'filters'  => array(
				array('name' => 'StripTags'),
				array('name' => 'StringTrim'),
			),
			'validators' => array(
				array(
					'name'    => 'StringLength',
					'options' => array(
						'encoding' => 'UTF-8',
						'min'      => 2,
						'max'      => 255,
					),
				),
			),
		);
	}

	private function getIsbn()
	{
		return array(
			'name'     => 'isbn',
			'required' => true,
			'filters'  => array(
				array('name' => 'Digits'),
				array('name' => 'StringTrim'),
			),
			'validators' => array(
				array(
					'name'    => 'StringLength',
					'options' => array(
						'encoding' => 'UTF-8',
							'min'      => 13,
							'max'      => 13,
						),
					),
			),
		);
	}

	private function getAuthor()
	{
		return array(
			'name'     => 'author',
			'required' => true,
			'filters'  => array(
				array('name' => 'StripTags'),
				array('name' => 'StringTrim'),
			),
			'validators' => array(
				array(
					'name'    => 'StringLength',
					'options' => array(
						'encoding' => 'UTF-8',
						'min'      => 2,
						'max'      => 255,
					),
				),
			),
		);
	}
}