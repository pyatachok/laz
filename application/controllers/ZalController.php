<?php

class ZalController extends Zend_Controller_Action
{

    private $display_fields = array(
        'id',
        'name',
        'mest',
        'alias',
        'rows',
        'colls',
        'display_width',
        'display_height'
        );

    public function indexAction()
    {
		$this->view->title = 'Менеджер залов.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$zal = new Application_Model_Zal();
		$this->view->zals = $zal->getAll();
		
		$paginator = Zend_Paginator::factory($this->view->zals);
		$paginator->setCurrentPageNumber($this->_getParam('page'));
		$paginator->setItemCountPerPage(10);
		$this->view->paginator = $paginator;
    }

    public function addAction()
    {
        $this->view->title = 'Добавить новый зал.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		$form = new Application_Form_Zal();
		$this->view->form = $form;
		
		if ( $this->getRequest()->isPost() )
		{
			if ( $form->isValid($this->getRequest()->getPost()) )
			{
				$zal = new Application_Model_Zal();
				$rows = new stdClass();
				$rows->parter = $form->getValue('rows_parter');
				$rows->amphitheatre = $form->getValue('rows_amph');
				$rows->balcony = $form->getValue('rows_balc');
				$zal->fill($form->getValues());
				$zal->save();
				
				{
					//LOG
					$user = new Application_Model_User(Zend_Auth::getInstance()->getIdentity()->id);
					$log = new Application_Model_Logs();
					
					$log->fill(array(
						'action_date' => date('Y-m-d H:i:s', time()),
						'log_variant_id' => Application_Model_LogVariants::ADD_HALL,
						'log_message' => "<p class='logs'>Добавлен новый зал <b>{$zal->name}</b>:<br/>
Зал(Псевдоним): <b>{$zal->name} ({$zal->alias})</b><br/>
Количество мест: <b>{$zal->mest}</b><br/>
Количество рядов: <b>{$zal->rows}</b><br/>
Количество позиций в ряду: <b>{$zal->colls}</b><br/>
Ширина схемы в пикселях примерная: <b>{$zal->display_width}</b><br/>
Высота схемы в пикселях примерная: <b>{$zal->display_height}</b><br/>
",
						'remote_ip' => $user->getRemoteIP(),
						'user_id' => $user->id
						));
					$log->save();
				}
				
				/**
				 * Создать дефолтную схему зала
				 */
				
				$this->_generateDefaultScheame($zal, $rows);
				
				
				
				
				$this->_helper->redirector('index');
			}
		}
    }

    public function editAction()
    {
		$this->view->title = 'Редактирование данных зала.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$id = $this->_getParam('id');
		$zal = new Application_Model_Zal($id);
		$form = new Application_Form_Zal();
		$form->removeElement('alias');
		$form->removeElement('rows_parter');
		$form->removeElement('rows_amph');
		$form->removeElement('rows_balc');
		if ( $this->getRequest()->isPost() )
		{
			if ( $form->isValid($this->getRequest()->getPost()) )
			{
				$oldHall = array(
					'name' => $zal->name,
					'mest' => $zal->mest,
					'rows' => $zal->rows,
					'colls' => $zal->colls,
					'display_width' => $zal->display_width,
					'display_height' => $zal->display_height,
				);
				$oldHall = (object) $oldHall;
				$zal->fill($form->getValues());
				$zal->save();
				
				{
					//LOG
					$user = new Application_Model_User(Zend_Auth::getInstance()->getIdentity()->id);
					$log = new Application_Model_Logs();

					$log->fill(array(
						'action_date' => date('Y-m-d H:i:s', time()),
						'log_variant_id' => Application_Model_LogVariants::EDIT_HALL,
						'log_message' => "<p class='logs'>Редактирование зала <b>{$zal->name} ({$zal->alias})</b>:<br/>
Название: <i>{$oldHall->name}</i> --> <b>{$zal->name}</b><br/>
Количество мест: <i>{$oldHall->mest}</i> --> <b>{$zal->mest}</b><br/>
Количество рядов: <i>{$oldHall->rows}</i> --> <b>{$zal->rows}</b><br/>
Количество позиций в ряду: <i>{$oldHall->colls}</i> --> <b>{$zal->colls}</b><br/>
Ширина схемы в пикселях примерная: <i>{$oldHall->display_width}</i> --> <b>{$zal->display_width}</b><br/>
Высота схемы в пикселях примерная: <i>{$oldHall->display_height}</i> --> <b>{$zal->display_height}</b><br/>
",
						'remote_ip' => $user->getRemoteIP(),
						'user_id' => $user->id
						));
					$log->save();
				}
				
				$this->_helper->redirector('index');
			}
		}
		else
		{
			$form->populate($zal->populateForm());
		}
		$this->view->form = $form;

    }

	function deleteAction() 
	{
		$this->view->title = '';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		
		$id = $this->_getParam('id');
		$zal = new Application_Model_Zal($id);
		
		{
			//LOG
			$user = new Application_Model_User(Zend_Auth::getInstance()->getIdentity()->id);
			$log = new Application_Model_Logs();

			$log->fill(array(
				'action_date' => date('Y-m-d H:i:s', time()),
				'log_variant_id' => Application_Model_LogVariants::DELETE_HALL,
				'log_message' => "<p class='logs'>Зал удален <b>{$zal->name}</b>:<br/>
Зал(Псевдоним): <b>{$zal->name} ({$zal->alias})</b><br/>
Количество мест: <b>{$zal->mest}</b><br/>
Количество рядов: <b>{$zal->rows}</b><br/>
Количество позиций в ряду: <b>{$zal->colls}</b><br/>
Ширина схемы в пикселях примерная: <b>{$zal->display_width}</b><br/>
Высота схемы в пикселях примерная: <b>{$zal->display_height}</b><br/>
",
				'remote_ip' => $user->getRemoteIP(),
				'user_id' => $user->id
				));
			$log->save();
		}
		$zal->delete();
		$this->_helper->redirector('index');
		
	}
	
	function viewschemeAction()
	{
		$this->view->title = 'Просмотр схемы.';
		$this->view->headTitle( $this->view->title, 'PREPEND' );
		$id = $this->_getParam('id');
		$zal = new Application_Model_Zal($id);

		$scheme = new Application_Model_Scheme($zal->alias);
		$this->view->scheme = $scheme->getAll();
		$this->view->zal = $zal;
		
		$seans = new stdClass();
		$seans->is_strickt_seat = 0;
		$seans->is_default = true;
		$this->view->seans = $seans;
	}

	public function updateAction()
	{
		$action = $this->_getParam('act');
		$data = $this->_getParam('data');
		$time = $this->_getParam('time');
		
		if ($this->getRequest()->isXmlHttpRequest()) 
		{
			$seans_id = $data['seans_id'];
			$zal_alias = $data['zal_alias'];
			$scheme = new Application_Model_Scheme($zal_alias, $seans_id);
			
			if ('updatePricesTypes' != $action)
			{
				preg_match_all('/(([a-z]+)([0-9]+)\,?)/i', $data['row'], $matchesAll);
				foreach ($matchesAll[2] as $key => $value)
				{
					$hall_part[$value][] = $matchesAll[3][$key];
				}
			}
			
			if ('updateTicketStates' === $action)
			{
				if ( Application_Model_Scheme::DEFAULT_SEANS == $seans_id )
				{
//					mail(
//	'piglet.freelancer@gmail.com', 
//	'DEBUG: EX updateTicketStates', 
//	var_export(array($data, $hall_part, $matchesAll), true)
//				);
					// изменения для всех сеансов этого зала
					$logInfo = new stdClass();
					$logInfo->zal_alias = $zal_alias;
					$logInfo->seans_id = $seans_id;
					$scheme = new Application_Model_Scheme($zal_alias);
					
					foreach ($hall_part as $part => $rows) 
					{
						$where = ' `hall_part`="' .$part.'" '
								.' AND `row` IN ('. implode(',', $rows) .') AND `column` IN ('. $data['places'] .')';
						$scheme->update(
								array('ticket_state_id' => $data['ticket_state']), $where
								);
						$logInfo->$part = new stdClass();
						$logInfo->$part->rows = '('. implode(', ', $rows) .')';
						$logInfo->$part->column = '('. str_replace(',', ', ', $data['places']) .')';
						$logInfo->ticket_state = $scheme->ticketStates[$data['ticket_state']];
					}
					
					$this->_logIt(Application_Model_LogVariants::CHANGE_PLACES_CATEGORY_HALL, $logInfo);
					
				}
				else
				{
					$logInfo = new stdClass();
					$logInfo->zal_alias = $zal_alias;
					$logInfo->seans_id = $seans_id;
					$scheme = new Application_Model_Scheme($zal_alias);
					foreach ($hall_part as $part => $rows) 
					{
						$where = '`seans_id` = "'.$data['seans_id'] . '" AND `hall_part`=' .$scheme->hall_parts[$part].' '
								.' AND `row` IN ('. implode(',', $rows) .') AND `column` IN ('. $data['places'] .')';
						$scheme->update(
								array('ticket_state_id' => $data['ticket_state']), $where);
						
						$logInfo->$part = new stdClass();
						$logInfo->$part->rows = '('. implode(', ', $rows) .')';
						$logInfo->$part->column = '('. str_replace(',', ', ', $data['places']) .')';
						$logInfo->ticket_state = $scheme->ticketStates[$data['ticket_state']];
						$logInfo->seans_id = $seans_id;
					}
					$this->_logIt(Application_Model_LogVariants::CHANGE_PLACES_CATEGORY_SEANS, $logInfo);

				}
			} 
			elseif ('updatePlacesTypes' === $action) 
			{
				if ( Application_Model_Scheme::DEFAULT_SEANS == $seans_id )
				{
					$logInfo = new stdClass();
					$logInfo->zal_alias = $zal_alias;
					$logInfo->seans_id = $seans_id;
					
					// изменения для всех сеансов этого зала
					foreach ($hall_part as $part => $rows) 
					{
						$logInfo->$part = new stdClass();
						$logInfo->$part->rows = '('. implode(', ', $rows) .')';
						$logInfo->$part->column = '('. str_replace(',', ', ', $data['places']) .')';
						$logInfo->place_type = $scheme->placeTypes[$data['place_type']];
						
						$where = ' `hall_part`="' .$part.'" '
								.' AND `row` IN ('. implode(',', $rows) .') AND `column` IN ('. $data['places'] .')';
						$scheme->update(
								array('place_type_id' => $data['place_type']), $where
								);
						if ( Application_Model_Scheme::NOT_ACTIVE_PLACE_TYPE != $data['place_type'])
						{
							foreach ($rows as $row) 
							{
								//перенумеровать места
								$scheme->recalculatePlacesInRow($row, $part);		
							}
						}
					}
					
					
					$this->_logIt(Application_Model_LogVariants::CHANGE_GEOMETRY, $logInfo);
				} 
			} 
			elseif ('updatePricesTypes' === $action) 
			{
				$type = $data['ticket_state'];
				
				
				$price = new Application_Model_SeansTypePrice(NULL, array('type_id'=>$type));
				$price_obj = $price->getBySeansIdAndType($seans_id, $type);
				
				if ( false === $price_obj )
				{
					$price = new Application_Model_SeansTypePrice(NULL, 
							array(
								'type_id'=>$type,
								'seans_id'=>$seans_id,
								'price'=>$data['price']
								));
					$price->save();
				}
				
				$logInfo = new stdClass();
				$logInfo->zal_alias = $zal_alias;
				$logInfo->seans_id = $seans_id;
				$scheme = new Application_Model_Scheme($zal_alias);
				$logInfo->ticket_state = $scheme->ticketStates[$data['ticket_state']];
				$oldObj = new stdClass();
				$oldObj->price = ( false !== $price_obj ? $price_obj->price : '0.00');
				$logInfo->oldObj = $oldObj;
				$logInfo->price = $data['price'];
				
				$price->price = $data['price'];
				$price->save();
				$this->_logIt(Application_Model_LogVariants::CHANGE_SEANS_PRICE, $logInfo, $logInfo->oldObj);

				
			} 
			elseif ( 'updateKassaUrl' === $action) 
			{
				$logInfo = new stdClass();
				$logInfo->zal_alias = $zal_alias;
				$logInfo->seans_id = $seans_id;
				
				//получить идшки мест
				$seats = array();
				foreach ($hall_part as $part => $rows) 
				{
					foreach ($scheme->getSeats($part, $rows, explode(',', $data['places'])) as $seat)
					{
						if ($seat['place_type_id'] != Application_Model_Scheme::EMPTY_PLACE_TYPE && $seat['place_type_id'] != Application_Model_Scheme::NOT_ACTIVE_PLACE_TYPE)
						{
							$seats[] = $seat['id'];
							//внести в базу новые записи
							$seatKassa = new Application_Model_SeatKassaUrl();
							$seatKassa->fill(array('seat_id' => $seat['id'], 'zal_alias' => $zal_alias, 'url' => $data['kassa_url']));
							$seatKassa->save();
							
							$logInfo->$part = new stdClass();
							$logInfo->$part->rows = '('. implode(', ', $rows) .')';
							$logInfo->$part->column = '('. str_replace(',', ', ', $data['places']) .')';
							$logInfo->url = $data['kassa_url'];
						}
					}
				}
				$this->_logIt(Application_Model_LogVariants::RESERVE_BY_KASSA, $logInfo);
				
				//обновить статус места на схеме
				$where = " id IN ('" . implode("', '", $seats) . "')";
				$scheme->update(array('place_type_id' => Application_Model_Scheme::KASSA_PLACE_TYPE), $where);
			}

			$myArrayofData = array('action' => 'reload' );

			//encode your data into JSON and send the response
			$this->_helper->json($myArrayofData);
		}

	}
	

	private function _generateDefaultScheame(Application_Model_Zal $zal, $rows)
	{
		if ( !$zal->alias )
		{
			return false;
		}
		

		$sql = "CREATE TABLE IF NOT EXISTS `{$zal->alias}_hall` LIKE `hall`";

		$db = Zend_Db_Table_Abstract::getDefaultAdapter();
		$db->query($sql);
		
		$seat = array(
			'id' => 1,
			'place_type_id' => 2, 
			'ticket_state_id' => 3, 
			'seat_number' => 0, 
			'row' => 0, 
			'ticket_row' => 0, 
			'column' => 0,
			'seans_id' => Application_Model_Scheme::DEFAULT_SEANS, 
			'hall_part' => Application_Model_Scheme::PARTER_PART); 
		$id = 1;
		
		foreach ($rows as $part => $row_col) 
		{
			
			for ($index = 1; $index <= $row_col; $index++) 
			{
				for ($index1 = 1; $index1 <= $zal->colls; $index1++) 
				{
					$scheme = new Application_Model_Scheme($zal->alias);
					$seat['id'] = $id;
					$seat['seat_number'] = $index1;
					$seat['row'] = $index;
					$seat['ticket_row'] = $index;
					$seat['column'] = $index1;
					$seat['hall_part'] = $part;

					$scheme->fill($seat);
					$scheme->save();
					$id++;
				}
			}
		}
	}
	
	private function _logIt($type, $newZal, $oldZal = array() )
	{
		$user = new Application_Model_User(Zend_Auth::getInstance()->getIdentity()->id);
		$log = new Application_Model_Logs();
		$zal = new Application_Model_Zal();
		$seans = new Application_Model_Seans($newZal->seans_id);
		$newZal->name = $zal->getByAlias($newZal->zal_alias)->name;
		$logInfo = array(
			'action_date' => date('Y-m-d H:i:s', time()),
			'log_variant_id' => $type,
			'remote_ip' => $user->getRemoteIP(),
			'user_id' => $user->id
			);
		
		switch ($type) {
			case Application_Model_LogVariants::CHANGE_PLACES_CATEGORY_HALL:
				$logInfo['log_message'] = "
<p class='logs'>Редактирование категорий мест для зала <b>{$newZal->name} ({$newZal->zal_alias})</b>:<br/>
Категория мест: <b>{$newZal->ticket_state}</b><br/>
" . ( isset($newZal->parter) ? '<b>Партер</b>: <br/>Ряды: '.$newZal->parter->rows.'; <br/>Позиции: '.$newZal->parter->column.';<br/>' : '' ) . "
" . ( isset($newZal->amphitheatre) ? '<b>Амфитетр</b>: <br/>Ряды: '.$newZal->amphitheatre->rows.'; <br/>Позиции: '.$newZal->amphitheatre->column.';<br/>' : '' ) . "
" . ( isset($newZal->balcony) ? '<b>Балкон</b>: <br/>Ряды: '.$newZal->balcony->rows.'; <br/>Позиции: '.$newZal->balcony->column.';<br/>' : '' ) . "
";
				break;

			case Application_Model_LogVariants::CHANGE_PLACES_CATEGORY_SEANS:
				$logInfo['log_message'] = "
<p class='logs'>Редактирование категорий мест для зала <b>{$newZal->name} ({$newZal->zal_alias})</b>:<br/>
Сеанс: <b>{$seans->name} ({$newZal->seans_id})</b><br/>
Категория мест: <b>{$newZal->ticket_state}</b><br/>
" . ( isset($newZal->parter) ? '<b>Партер</b>: <br/>Ряды: '.$newZal->parter->rows.'; <br/>Позиции: '.$newZal->parter->column.';<br/>' : '' ) . "
" . ( isset($newZal->amphitheatre) ? '<b>Амфитетр</b>: <br/>Ряды: '.$newZal->amphitheatre->rows.'; <br/>Позиции: '.$newZal->amphitheatre->column.';<br/>' : '' ) . "
" . ( isset($newZal->balcony) ? '<b>Балкон</b>: <br/>Ряды: '.$newZal->balcony->rows.'; <br/>Позиции: '.$newZal->balcony->column.';<br/>' : '' ) . "
";				
				break;
			case Application_Model_LogVariants::CHANGE_SEANS_PRICE:
				$logInfo['log_message'] = "<p class='logs'>Редактирование стоимости мест для зала <b>{$newZal->name} ({$newZal->zal_alias})</b>:<br/>
Сеанс: <b>{$seans->name} ({$newZal->seans_id})</b><br/>
Категория мест: <b>{$newZal->ticket_state}</b><br/>
Цена: <i>{$oldZal->price}</i> <b>{$newZal->price}</b>
";				
				break;
			case Application_Model_LogVariants::RESERVE_BY_KASSA:
				
				$logInfo['log_message'] = "
<p class='logs'>Резервирование мест за кассами: <br/>
Зал:<b>{$newZal->name} ({$newZal->zal_alias})</b><br/>
Сеанс: <b>{$seans->name} ({$newZal->seans_id})</b><br/>
Url кассы: <b>{$newZal->url}</b><br/>
" . ( isset($newZal->parter) ? '<b>Партер</b>: <br/>Ряды: '.$newZal->parter->rows.'; <br/>Позиции: '.$newZal->parter->column.';<br/>' : '' ) . "
" . ( isset($newZal->amphitheatre) ? '<b>Амфитетр</b>: <br/>Ряды: '.$newZal->amphitheatre->rows.'; <br/>Позиции: '.$newZal->amphitheatre->column.';<br/>' : '' ) . "
" . ( isset($newZal->balcony) ? '<b>Балкон</b>: <br/>Ряды: '.$newZal->balcony->rows.'; <br/>Позиции: '.$newZal->balcony->column.';<br/>' : '' ) . "

";				
				break;
			
			case Application_Model_LogVariants::CHANGE_GEOMETRY:
				
				$logInfo['log_message'] = "
<p class='logs'>Изменение геометрии зала: <br/>
Зал:<b>{$newZal->name} ({$newZal->zal_alias})</b><br/>
Новый тип позиций: <b>{$newZal->place_type}</b><br/>
" . ( isset($newZal->parter) ? '<b>Партер</b>: <br/>Ряды: '.$newZal->parter->rows.'; <br/>Позиции: '.$newZal->parter->column.';<br/>' : '' ) . "
" . ( isset($newZal->amphitheatre) ? '<b>Амфитетр</b>: <br/>Ряды: '.$newZal->amphitheatre->rows.'; <br/>Позиции: '.$newZal->amphitheatre->column.';<br/>' : '' ) . "
" . ( isset($newZal->balcony) ? '<b>Балкон</b>: <br/>Ряды: '.$newZal->balcony->rows.'; <br/>Позиции: '.$newZal->balcony->column.';<br/>' : '' ) . "

";				
				break;
		}
		
		$log->fill($logInfo);
		$log->save();
	}
	
	
}




