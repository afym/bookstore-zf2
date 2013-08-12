<?php

namespace Util\Helper;

use Zend\View\Helper\AbstractHelper;

class FieldError extends AbstractHelper
{
	public function __invoke($element)
	{
		return $this->view->formElementErrors()
					->setMessageOpenFormat('<div class="error">')
                	->setMessageCloseString('</div>')
                	->render($element); 
	}
}