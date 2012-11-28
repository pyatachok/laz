<?php

include_once 'conf.php';

function setCID()
{
	$cid = safe_get($_COOKIE, 'CID', false);
	if (false == $cid)
	{
		setcookie('CID', time(), 60*60*24*183, '/', $_SERVER['HTTP_HOST']);
	}
}