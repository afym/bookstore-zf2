<?php

namespace Util\Helper;

use Zend\View\Helper\AbstractHelper;

class ActionLink extends AbstractHelper
{
	public function __invoke($path)
	{
		return $this->view->url('home') . $path;
	}	
}