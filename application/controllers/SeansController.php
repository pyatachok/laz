<?php

class SeansController extends Zend_Controller_Action
{

	private $_months = array(
		1 => 'Январь', 
		2 => 'Февраль', 
		3 => 'Март', 
		4 => 'Апрель', 
		5 => 'Май', 
		6 => 'Июнь', 
		7 => 'Июль', 
		8 =>'Август', 
		9 => 'Сентябрь', 
		10 => 'Октябрь', 
		11 => 'Ноябрь', 
		12 => 'Декабрь'		
	);
	
	public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
		$this->view->title = 'Менеджер сеансов.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$seans = new Application_Model_Seans();
		$seans->setOrder(array('id' => 'DESC'));
		$this->view->seanses = $seans->getAll();
		
		$paginator = Zend_Paginator::factory($this->view->seanses);
		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$paginator->setItemCountPerPage(10);
		$this->view->paginator = $paginator;
    }

	public function addAction()
    {
		$this->view->title = 'Добавление нового сеанса.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$form = new Application_Form_Seans();
		$this->view->form = $form;

		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->getRequest()->getPost())) {
				$seans = new Application_Model_Seans();
				$seans->fill($form->getValues());
				$seans->date = $this->_formatDate($seans->seans_date);
				
				$zal = new Application_Model_Zal();
				$seans->name_zal = $zal->getByAlias($seans->zal_alias)->name;
				$seans->save();
				{
					//LOG
					$user = new Application_Model_User(Zend_Auth::getInstance()->getIdentity()->id);
					$log = new Application_Model_Logs();
					$zal = new Application_Model_Zal();
					$seans->name_zal = $zal->getByAlias($seans->zal_alias)->name;
					
					$log->fill(array(
						'action_date' => date('Y-m-d H:i:s', time()),
						'log_variant_id' => Application_Model_LogVariants::CREATE_SEANS,
						'log_message' => "<p class='logs'>Добавлен новый сеанс:<br/>
Название: <b>{$seans->name}</b><br/>
Дата: <b>{$seans->seans_date}</b><br/>
Зал(Псевдоним): <b>{$seans->name_zal} ({$seans->zal_alias})</b><br/>
Порядок: <b>" . ( $seans->is_strickt_seat ? 'Строгий' : 'Не строгий' ) . "</b><br/>
Подарки: <b>" . ( $seans->is_present ? 'Есть' : 'Нет' ) . "</b><br/>
Стоимость подарка: <b>{$seans->present_price}</b><br/>
Псевдоним: <b>{$seans->alias}</b></p>",
						'remote_ip' => $user->getRemoteIP(),
						'user_id' => $user->id
						));
					$log->save();
				}
				/*
				 * Сохранить схему равную дефолтной
				 */
				
				$scheme = new Application_Model_Scheme($seans->zal_alias);
				$scheme->createSchemeLikeDefault($seans->id);
				
				$this->_helper->redirector('index');
			}
		}
    }
	
	public function editAction()
    {
		$this->view->title = 'Редактирование сеанса.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$id = $this->_getParam('id');
		$form = new Application_Form_Seans();
		$form->removeElement('zal_alias');
		$seans = new Application_Model_Seans($id);
		$oldSeans = array(
			'name' => $seans->name,
			'seans_date' => $seans->seans_date,
			'is_strickt_seat' => ( $seans->is_strickt_seat ? 'Строгий' : 'Не строгий' ),
			'is_present' => ( $seans->is_present ? 'Есть' : 'Нет' ),
			'present_price' => $seans->present_price,
			'alias' => $seans->alias
		);
		$oldSeans = (object) $oldSeans;
		
		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->getRequest()->getPost())) {
				$seans->fill($form->getValues());
				$seans->date = $this->_formatDate($seans->seans_date);
				
				$zal = new Application_Model_Zal();
				$seans->name_zal = $zal->getByAlias($seans->zal_alias)->name;
				
				{
					//LOG
					$user = new Application_Model_User(Zend_Auth::getInstance()->getIdentity()->id);
					$log = new Application_Model_Logs();
					$log->fill(array(
						'action_date' => date('Y-m-d H:i:s', time()),
						'log_variant_id' => Application_Model_LogVariants::EDIT_SEANS,
						'log_message' => "<p class='logs'>Изменение сеанса #{$seans->id}:<br/>
Название: <i>{$oldSeans->name}</i> --> <b>{$seans->name}</b><br/>
Дата: <i>{$oldSeans->seans_date}</i> --> <b>{$seans->seans_date}</b><br/>
Зал(Псевдоним): <b>{$seans->name_zal} ({$seans->zal_alias})</b><br/>
Порядок: <i>{$oldSeans->is_strickt_seat}</i> --> <b>" . ( $seans->is_strickt_seat ? 'Строгий' : 'Не строгий' ) . "</b><br/>
Подарки: <i>{$oldSeans->is_present}</i> --> <b>" . ( $seans->is_present ? 'Есть' : 'Нет' ) . "</b><br/>
Стоимость подарка: <i>{$oldSeans->present_price}</i> --> <b>{$seans->present_price}</b><br/>
Псевдоним: <i>{$oldSeans->alias}</i> --> <b>{$seans->alias}</b></p>",
						'remote_ip' => $user->getRemoteIP(),
						'user_id' => $user->id
						));
					$log->save();
				}
				
				$seans->save();
					
				$this->_helper->redirector('index');
			}
		}	
		else
		{
			$form->populate($seans->populateForm());
		}
		$this->view->form = $form;

		
    }
	
	function deleteAction() 
	{
		$this->view->title = '';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$id = $this->_getParam('id');
		$seans = new Application_Model_Seans($id);
		
		{
			//LOG
			$user = new Application_Model_User(Zend_Auth::getInstance()->getIdentity()->id);
			$log = new Application_Model_Logs();
			$zal = new Application_Model_Zal();
			$seans->name_zal = $zal->getByAlias($seans->zal_alias)->name;
			$log->fill(array(
				'action_date' => date('Y-m-d H:i:s', time()),
				'log_variant_id' => Application_Model_LogVariants::DELETE_SEANS,
				'log_message' => "<p class='logs'>Удаление сеанса:<br/>
Название: <b>{$seans->name}</b><br/>
Дата: <b>{$seans->seans_date}</b><br/>
Зал(Псевдоним): <b>{$seans->name_zal} ({$seans->zal_alias})</b><br/>
Порядок: <b>" . ( $seans->is_strickt_seat ? 'Строгий' : 'Не строгий' ) . "</b><br/>
Подарки: <b>" . ( $seans->is_present ? 'Есть' : 'Нет' ) . "</b><br/>
Стоимость подарка: <b>{$seans->present_price}</b><br/>
Псевдоним: <b>{$seans->alias}</b></p>",
				'remote_ip' => $user->getRemoteIP(),
				'user_id' => $user->id
				));
			$log->save();
		}
		
		$seans->delete();
		$this->_helper->redirector('index');
		
	}
	
	private function _formatDate($date)
	{
		$dateArray = date_parse_from_format('Y-m-d H:i:s', $date);
		
		return $dateArray['day'] . ' ' . $this->_months[$dateArray['month']] 
				. ' / ' . $dateArray['hour'] . ':00' ;
	}

}

