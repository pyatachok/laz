<?php

/**
 * Description of robokassa
 *
 * @author pyatachok
 */
class Robokassa
{

	const MRH_URL = 'https://merchant.roboxchange.com/Index.aspx';
	const MRH_METHOD = 'POST';
	const MRH_LOGIN = "liveanimation"; 
	const MRH_PASS1 = "asRew2ERy";
	const INCCURRLABEL = "";
	const CULTURE  = "ru";
	const ENCODING   = "utf8";
	
	var $orderId = "OrderId";
	var $orderDesc = "OrderDesc";
	var $orderAmount = "0";
	var $shopItem = "";

	function setOrder($orderId, $orderDesc, $orderAmount, $shopItem)
	{
		$this->orderId = $orderId;
		$this->orderDesc = $orderDesc;
		if (isset($_COOKIE['testing_merchant_system_by_piglet']) && $_COOKIE['testing_merchant_system_by_piglet'] == 1)
		{
			$this->orderAmount = 1;
		} 
		else
		{
			$this->orderAmount = $orderAmount;
		}
//		$this->orderAmount = '1';
		$this->shopItem = 'tickets';
	}
	
	function generatePaymentForm()
	{
		$str = self::MRH_LOGIN.":".$this->orderAmount.":".$this->orderId.":".self::MRH_PASS1;
		$signature = md5($str);
		//sMerchantLogin:nOutSum:nInvId:sMerchantPass1[:пользовательские параметры, в отсортированном алфавитном порядке] 
		return "<html>". 
			"<form id='payment-form' action='".self::MRH_URL."' method=".self::MRH_METHOD.">". 
			"<input type=hidden name=MrchLogin value='".self::MRH_LOGIN."'>". 
			"<input type=hidden name=OutSum value='".$this->orderAmount."'>". 
			"<input type=hidden name=InvId value='".$this->orderId."'>". 
			"<input type=hidden name=Desc value='".$this->orderDesc."'>". 
			"<input type=hidden name=SignatureValue value='".$signature."'>". 
//			"<input type=hidden name=Shp_item value='".$this->shopItem."'>". 
			"<input type=hidden name=IncCurrLabel value='".self::INCCURRLABEL."'>". 
			"<input type=hidden name=Culture value='".self::CULTURE."'>". 
			"<input type=hidden name=Encoding value='".self::ENCODING."'>".
			"<input type=submit value='Оплатить'>". "</form></html>";
	}
}

