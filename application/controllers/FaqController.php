<?php

class FaqController extends Zend_Controller_Action
{

    public function indexAction()
    {
		$this->view->title = 'Administration Manual.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		
    }

}

