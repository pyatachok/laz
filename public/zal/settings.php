<?php
include_once '../inc/conf.php';

function is_deluxe($i,$j,$zal_name){
    $Query = mysql_query("SELECT * FROM `zal` WHERE type = 'deluxe' AND name = '".$zal_name."'");
    $zal = mysql_fetch_assoc($Query);

    if ($j >= $zal['mest'] && $j <= $zal['mestend'] && $i >= $zal['ryad'] && $i <= $zal['ryadend']){
        return true;
    }else{
        return false;
    }
}

function is_vip($i,$j,$zal_name){
    $Query = mysql_query("SELECT * FROM `zal` WHERE type = 'vip' AND name = '".$zal_name."'");
    $zal = mysql_fetch_assoc($Query);

    if ($j >= $zal['mest'] && $j <= $zal['mestend'] && $i >= $zal['ryad'] && $i <= $zal['ryadend']){
        return true;
    }else{
        return false;
    }
}

function is_bron($name,$i,$j,$zal_name){
    $Query = mysql_query("SELECT * FROM `bron` WHERE seans = '$name' AND zal = '".$zal_name."' AND mesto = $j AND ryad = $i");

    if (mysql_num_rows($Query) != NULL ){
        return true;
    }else{
        return false;
    }
}


function is_bron_new($name,$i,$j,$zal_name,$sector){
    $Query = mysql_query("SELECT * FROM `bron` WHERE seans = '$name' AND zal = '$zal_name' AND mesto = $j AND ryad = $i AND SECTOR = '$sector'");

    if (mysql_num_rows($Query) != NULL ){
        return true;
    }else{
        return false;
    }
}


function bgm($name,$i,$j,$zal_name){
    if(is_bron($name,$i,$j,$zal_name)){
        return 'bgcolor="#dbdbdb"';
        }else{
    if(is_vip($i,$j,$zal_name)){
        return 'bgcolor="#FF0000"';
        }else{
    if(is_deluxe($i,$j,$zal_name)){
        return 'bgcolor="#00DFFF"';
    }else{
        return 'bgcolor="#FFFF00"';
    }
}
}
}

function bgm_new($name,$i,$j,$zal_name,$sector,$TypeMesto)
{
	if(is_bron_new($name,$i,$j,$zal_name,$sector))
	{
		return 'bgcolor="#A0A0A4"';
	}
	else
	{
		if($TypeMesto=='VIP')
		{
			return 'bgcolor="#FF0000"';
		}
		else
		{

			if($TypeMesto=='VIP2')
			{
				return 'bgcolor="#FF7979"';
			}
			else
			{
				if($TypeMesto=='DELUXE')
				{
					return 'bgcolor="#286FFF"';
				}
				else
				{
					if($TypeMesto=='DELUXE2')
					{
						return 'bgcolor="#00DFFF"';
					}
					else
					{
						return 'bgcolor="#FFFF00"';
					}
				}
			}
		}
	}
}


function cost($v,$d,$s,$i,$j,$zal_name){

    if(is_vip($i,$j,$zal_name)){
        return $v;
        }else{
    if(is_deluxe($i,$j,$zal_name)){
        return $d;
    }else{
        return $s;
    }
}

}




function m($i,$j,$zal_name){

    if(is_vip($i,$j,$zal_name)){
        return 'VIP';
        }else{
    if(is_deluxe($i,$j,$zal_name)){
        return 'Делюкс';
    }else{
        return 'Стандарт';
    }
}

}

function m_new($i,$j,$zal_name,$TypeMesto){

    if($TypeMesto=='VIP')
    {
        return 'VIP';
    }
    else
    {
	    if($TypeMesto=='DELUXE')
	    {
	        return 'Делюкс';
	    }
	    else
	    {
   		    if($TypeMesto=='DELUXE2')
		    {
		        return 'Стандарт(2)';
		    }
		    else
		    {
		        return 'Стандарт';
		    }
	    }
	}

}

/**
 * Возвращает элемент массива или дефолтное значение
 * @param type $array
 * @param type $index
 * @param type $default
 * @return type 
 */
function safe_get($array, $index, $default=false)
{
	if ( isset($array[$index]) && !empty($array[$index]) ) 
	{
		return $array[$index];
	} 
	else 
	{
		return $default;
	}
}
?>