<?php

namespace Application\Controller;

use Bookstore\Entity\Book;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Bookstore\Form\BookForm;
use Bookstore\Form\BookFilter;

class BookController extends AbstractActionController
{
	public function indexAction() 
	{
		return new ViewModel ( array (
				'books' => $this->getBookService()->getAll() 
		));
	}

	public function addAction() 
	{
		$form = $this->getBookForm();
		$request = $this->getRequest();

		if ($request->isPost()) {
			$form->setInputFilter($this->getBookFilter()->getInputFilter());
			$form->setData($request->getPost());

			if ($form->isValid()) {
				$book = new Book();
				$book->exchangeArray($request->getPost()->toArray());

				$this->getBookService()->save($book->toArray());

				return $this->redirect()->toRoute('application',
					array('controller'	=> 'book',
				          'action' 		=> 'index',
				          'params' 		=> array())
					);
			}
		}

		return new ViewModel(array(
			'form' => $form,
		));
	}

	private function getBookFilter()
	{
		return new BookFilter();
	}

	private function getBookForm()
	{
		return new BookForm();
	}

	private function getBookService() 
	{
		return $this->getServiceLocator()->get('BookService');
	}
}