<?php
include_once 'inc/conf.php';;

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


function bgm($name,$i,$j,$zal_name){
	if(is_bron($name,$i,$j,$zal_name)){
        return 'bgcolor="#A0A0A4"';
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




function cost($i,$j){

    if(is_vip($i,$j)){
        return 950;
        }else{
    if(is_deluxe($i,$j)){
        return 750;
    }else{
        return 500;
    }
}

}

?>