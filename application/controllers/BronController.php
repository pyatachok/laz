<?php

class BronController extends Zend_Controller_Action
{

    public function indexAction()
    {
		$this->view->title = 'Просмотр старых заказов.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$bron = new Application_Model_Bron();
		$this->view->orders = $bron->getAll();
		
		$paginator = Zend_Paginator::factory($this->view->orders);
		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$paginator->setItemCountPerPage(10);
		$this->view->paginator = $paginator;
    }

}

