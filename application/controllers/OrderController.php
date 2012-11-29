<?php

class OrderController extends Zend_Controller_Action
{

	const SHOW_DELIVERED_MODE = '2';
	const EXCLUDE_DELIVERED_MODE = '1';
	const ALL_MODE = '3';
	const ARCHIVE_MODE = '4';


	public function indexAction()
    {
		$this->view->title = 'Менеджер заказов.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		$this->view->mode = $this->_getParam('mode', self::EXCLUDE_DELIVERED_MODE);
		
		$order = new Application_Model_Order();
		
		$search_form = new Application_Form_SearchOrder();
		if ( 'search_order' == $this->_getParam('act', false) ) 
		{
			$searchConditions = array(
				'id' => $this->_getParam('id', false),
				'fio' => $this->_getParam('fio', false),
				'tel' => $this->_getParam('tel', false),
				'email' => $this->_getParam('email', false),
				'dostavka' => $this->_getParam('dostavka', false),
				'date_from' => $this->_getParam('date_from', false),
				'date_to' => $this->_getParam('date_to', false),
				'seans_id' => $this->_getParam('seans_id', false),
				'zal_alias' => $this->_getParam('zal_alias', false),
				
			);
			$orders = $order->getBySearchConditions($searchConditions);
			$searchConditions['act'] = 'search_order';
			$search_form->populate($searchConditions);
		}
		else 
		{
		
			switch ($this->view->mode) {
				case self::EXCLUDE_DELIVERED_MODE:
					$orders = $order->getByTypes(array(
					Application_Model_Order::TYPE_BOOKED,
					Application_Model_Order::TYPE_CANCEL,
					Application_Model_Order::TYPE_PAYED,
					));
					break;
				case self::SHOW_DELIVERED_MODE:
					$orders = $order->getByTypes(array(
					Application_Model_Order::TYPE_SEND_TO_DELIVERY,
					));
					break;
				case self::ARCHIVE_MODE:
					$orders = $order->getByTypes(array(
					Application_Model_Order::TYPE_ARCHIVE,
					));
					break;

				default:
					$orders = $order->getAll();
					break;
			}
		}

		foreach ($orders as $id => $order) 
		{
			$orders[$id] = new Application_Model_Order($id);
		}

		$this->view->orders = $orders;
		
		$paginator = Zend_Paginator::factory($orders);
		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$paginator->setItemCountPerPage(10);
		$this->view->paginator = $paginator;
		
		$static = new Application_Model_StaticVariables();
		$this->view->book_expiration_days = (int)$static->getByName('book_expiration_days')->value -1;
		
		$date = new DateTime(date('Y-m-d H:i:s', time()));
		$this->view->alarm_date = $date->modify("- " . $this->view->book_expiration_days . " day"); //за день до
		
		
		$this->view->page = $this->_getParam('page', 1);
		
			$this->view->search_form = $search_form;
		
		
    }

	public function buyAction()
    {
		$this->view->title = 'Менеджер заказов.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$id = $this->_getParam('id');
		$order = new Application_Model_Order($id);

		$this->markSeatsAsState($order->getRow()->getSeats(), Application_Model_Order::SEATE_soled, $order->seans_id);
		
		$this->_logOrder(Application_Model_LogVariants::PURCHASE_ORDER, $order);
		
		$order->type = Application_Model_Order::TYPE_ARCHIVE;
		$order->modify_date = date('Y-m-d H:i:s', time());
		$order->save();
		
		$page = $this->_getParam('page');
		$mode = $this->_getParam('mode');
		
		if ( !empty ($page) || !empty($mode) )
		{
			$params = array();
			
			!empty($page) ? $params['page'] = $page : '';
			!empty($mode) ? $params['mode'] = $mode : '';
			
			$this->_helper->redirector->gotoSimpleAndExit('index', 'order', null, $params);
		}
		$this->_helper->redirector('index');
    }
	
	public function cancelAction()
    {
		$this->view->title = 'Менеджер заказов.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$id = $this->_getParam('id');
		$order = new Application_Model_Order($id);

		$this->markSeatsAsState($order->getRow()->getSeats(), Application_Model_Order::SEATE_free, $order->seans_id);

		$this->_logOrder(Application_Model_LogVariants::CANCEL_ORDER, $order);
		
		$order->modify_date = date('Y-m-d H:i:s', time());
		$order->type = Application_Model_Order::TYPE_CANCEL ;
		$order->save();
		
		$page = $this->_getParam('page');
		$mode = $this->_getParam('mode');
		
		if ( !empty ($page) || !empty($mode) )
		{
			$params = array();
			
			!empty($page) ? $params['page'] = $page : '';
			!empty($mode) ? $params['mode'] = $mode : '';
			
			$this->_helper->redirector->gotoSimpleAndExit('index', 'order', null, $params);
		}
		$this->_helper->redirector('index');
    }
	
	public function deleteAction()
    {
		$this->view->title = 'Менеджер заказов.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$id = $this->_getParam('id');
		$order = new Application_Model_Order($id);
		
		$this->_logOrder(Application_Model_LogVariants::DEL_ORDER, $order);
		
		$order->modify_date = date('Y-m-d H:i:s', time());
		$order->delete();
		
		$page = $this->_getParam('page');
		$mode = $this->_getParam('mode');
		
		if ( !empty ($page) || !empty($mode) )
		{
			$params = array();
			
			!empty($page) ? $params['page'] = $page : '';
			!empty($mode) ? $params['mode'] = $mode : '';
			
			$this->_helper->redirector->gotoSimpleAndExit('index', 'order', null, $params);
		}
		$this->_helper->redirector('index');
    }
	
	
	private function markSeatsAsState($seats, $seatState, $seans_id)
	{
		$seans = new Application_Model_Seans($seans_id);
		$scheme = new Application_Model_Scheme($seans->zal_alias, $seans->id);

		$seatsSttr = '';
		foreach ($seats as $key => $value) 
		{
			if ( '' !== $seatsSttr )
			{
				$seatsSttr .= ",";
			}
			$seatsSttr .= $value->id;
		}
		$where = ' id IN ('. $seatsSttr .')';
		$scheme->update(
			array('place_type_id' => $seatState), $where
		);
		
		
	}
	
	
	public function printAction()
    {
		$this->_helper->layout->setLayout('ticket');
		$this->view->title = 'Менеджер заказов.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$id = $this->_getParam('id');
		$this->view->seat_id = $this->_getParam('seat_id');
		$order = new Application_Model_Order($id);
		$seans = new Application_Model_Seans($order->seans_id);
		$seans->getPricesBySeans();
		$this->view->order = $order;
		$this->view->order_seats = $order->getRow()->getSeats();
		foreach ($this->view->order_seats as $key => $value) {
			$this->view->order_seats[$key]->price = $seans->prices[$value->ticket_state_id];
 		}
		$vars = new Application_Model_StaticVariables();
		$this->view->static_variables = $vars->getByName($name);

    }
	
	public function deliverAction()
    {
		$this->view->title = 'Менеджер заказов.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$id = $this->_getParam('id');
		$order = new Application_Model_Order($id);
//		$this->markSeatsAsState($order->getRow()->getSeats(), Application_Model_Order::SEATE_soled, $order->seans_id);
				
		$this->_logOrder(Application_Model_LogVariants::DELIVER_ORDER, $order);
		
		$order->modify_date = date('Y-m-d H:i:s', time());
		$order->type = Application_Model_Order::TYPE_DELIVERED;
		$order->save();
		
		$page = $this->_getParam('page');
		$mode = $this->_getParam('mode');
		
		if ( !empty ($page) || !empty($mode) )
		{
			$params = array();
			
			!empty($page) ? $params['page'] = $page : '';
			!empty($mode) ? $params['mode'] = $mode : '';
			
			$this->_helper->redirector->gotoSimpleAndExit('index', 'order', null, $params);
		}
		$this->_helper->redirector('index');
    }
	
	public function sendtodeliveryAction()
    {
		$this->view->title = 'Менеджер заказов.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$id = $this->_getParam('id');
		$order = new Application_Model_Order($id);
				
		$this->_logOrder(Application_Model_LogVariants::DELIVER_ORDER, $order);
		
		$order->modify_date = date('Y-m-d H:i:s', time());
		$order->type = Application_Model_Order::TYPE_SEND_TO_DELIVERY;
		$order->save();
		
		
		$page = $this->_getParam('page');
		$mode = $this->_getParam('mode');
		
		if ( !empty ($page) || !empty($mode) )
		{
			$params = array();
			
			!empty($page) ? $params['page'] = $page : '';
			!empty($mode) ? $params['mode'] = $mode : '';
			
			$this->_helper->redirector->gotoSimpleAndExit('index', 'order', null, $params);
		}
		$this->_helper->redirector('index');
    }
	
	public function rebookAction()
    {
		$this->view->title = 'Менеджер заказов.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$id = $this->_getParam('id');
		$order = new Application_Model_Order($id);
		$order->create_date = date('Y-m-d H:i:s', time());
		$order->modify_date = date('Y-m-d H:i:s', time());
				
		$this->_logOrder(Application_Model_LogVariants::REBOOK_ORDER, $order);
		
		$order->save();
		
		$page = $this->_getParam('page');
		$mode = $this->_getParam('mode');
		
		if ( !empty ($page) || !empty($mode) )
		{
			$params = array();
			
			!empty($page) ? $params['page'] = $page : '';
			!empty($mode) ? $params['mode'] = $mode : '';
			
			$this->_helper->redirector->gotoSimpleAndExit('index', 'order', null, $params);
		}
		$this->_helper->redirector('index');
    }
	
	public function archiveAction()
    {
		$this->view->title = 'Менеджер заказов.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$id = $this->_getParam('id');
		$order = new Application_Model_Order($id);
//		$this->markSeatsAsState($order->getRow()->getSeats(), Application_Model_Order::SEATE_soled, $order->seans_id);
		
		$this->_logOrder(Application_Model_LogVariants::ARCHIVE_ORDER, $order);
		
		$order->modify_date = date('Y-m-d H:i:s', time());
		$order->type = Application_Model_Order::TYPE_ARCHIVE;
		$order->save();
		
		$page = $this->_getParam('page');
		$mode = $this->_getParam('mode');
		
		if ( !empty ($page) || !empty($mode) )
		{
			$params = array();
			
			!empty($page) ? $params['page'] = $page : '';
			!empty($mode) ? $params['mode'] = $mode : '';
			
			$this->_helper->redirector->gotoSimpleAndExit('index', 'order', null, $params);
		}
		$this->_helper->redirector('index');
    }
	
	
	
	protected function _logOrder($type, $order)
	{
		$user = new Application_Model_User(Zend_Auth::getInstance()->getIdentity()->id);
		
		$logInfo = array(
			'action_date' => date('Y-m-d H:i:s', time()),
			'log_variant_id' => $type,
			'remote_ip' => $user->getRemoteIP(),
			'user_id' => $user->id
			);
		
		switch ($type) {
			case Application_Model_LogVariants::ARCHIVE_ORDER :
				$logInfo['log_message'] = '<p class="logs">Заказ добавлен в архив <b>'.$order->id.'</b>.<br/>';
				break;
			case Application_Model_LogVariants::DELIVER_ORDER :
				$logInfo['log_message'] = '<p class="logs">Заказ передан в службу доставки <b>'.$order->id.'</b>.<br/>';
				break;
			case Application_Model_LogVariants::DEL_ORDER :
				$logInfo['log_message'] = '<p class="logs">Заказ удален <b>'.$order->id.'</b>.<br/>';
				break;
			case Application_Model_LogVariants::CANCEL_ORDER :
				$logInfo['log_message'] = '<p class="logs">Заказ отменен <b>'.$order->id.'</b>.<br/>';
				break;
			case Application_Model_LogVariants::PURCHASE_ORDER :
				$logInfo['log_message'] = '<p class="logs">Заказ оплачен <b>'.$order->id.'</b>.<br/>';
				break;
			case Application_Model_LogVariants::REBOOK_ORDER :
				$logInfo['log_message'] = '<p class="logs">Продление брони <b>'.$order->id.'</b>.<br/>';
				break;

			default:
				break;
		}
		
		$logInfo['log_message'] .= '
Ф.И.О.: <b>' . $order->fio . '</b><br/>
E-mail: <b>' . $order->email . '</b><br/>
Адресс: <b>' . $order->adress . '</b><br/>
Дата создания: <b>' . $order->create_date . '</b><br/>
Дата модификации: <b>' . $order->modify_date . '</b><br/>
Сеанс: <b>' .$order->getRow()->findParentRow('Application_Model_DbTable_Seans')->name. '</b><br/>
Зал: <b>' .$order->getRow()->findParentRow('Application_Model_DbTable_Zal')->name. '</b><br/>
Телефон: <b>' . $order->tel . '</b><br/> 
Доставка: <b>' . $order->dostavka. '</b><br/>
Стоимость: <b>' . $order->amount . '</b><br/>' . 
( empty( $order->presents_count ) ? "Подарки: <b>{$order->presents_count}шт. {$order->presents_amount}р.</b>" : '') . 
'</p>';
			$log = new Application_Model_Logs();
			$log->fill($logInfo);
			$log->save();
	}
}



