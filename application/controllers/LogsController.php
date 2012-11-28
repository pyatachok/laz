<?php
class LogsController extends Zend_Controller_Action
{
	function indexAction()
	{
		$this->view->title = 'Просмотр Логов.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$logs = new Application_Model_Logs();
		$this->view->logs = $logs->getAll();
		
		$paginator = Zend_Paginator::factory($this->view->logs);
		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$paginator->setItemCountPerPage(10);
		$this->view->paginator = $paginator;
	}
}