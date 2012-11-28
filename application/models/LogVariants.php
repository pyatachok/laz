<?php

class Application_Model_LogVariants extends My_Model
{

	const CREATE_ORDER					= 1;
	const PURCHASE_ORDER				= 2;
	const CANCEL_ORDER					= 3;
	const DELIVER_ORDER					= 4;
	const DEL_ORDER						= 5;
	const ARCHIVE_ORDER					= 6;
	const CREATE_SEANS					= 7;
	const EDIT_SEANS					= 8;
	const DELETE_SEANS					= 9;
	const CHANGE_SEANS_PRICE			= 10;
	const RESERVE_BY_KASSA				= 11;
	const CHANGE_PLACES_CATEGORY_SEANS	= 12;
	const ADD_HALL						= 13;
	const EDIT_HALL						= 14;
	const DELETE_HALL					= 15;
	const CHANGE_PLACES_CATEGORY_HALL	= 16;
	const CHANGE_GEOMETRY				= 17;
	const ADD_USER						= 18;
	const EDIT_USER						= 19;
	const DELETE_USER					= 20;
	const REGISTER_USER					= 21;
	const CONFIRM_USER					= 22;
	const RESEND_ACTIVATION				= 23;
	const GET_NEW_PASSWORD				= 24;
	const ACTIVATE_USER					= 25;
	const REBOOK_ORDER					= 26;
	
	function __construct($id = NULL, $data = array()) {
		parent::__construct(new Application_Model_DbTable_LogVariants(array('db' => 'my_db')), $id, $data );
	}
	
}

