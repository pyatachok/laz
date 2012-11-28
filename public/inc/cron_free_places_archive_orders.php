<?php
/* Connect to an ODBC database using driver invocation */
error_reporting(E_ALL);
ini_set('display_errors','on');
ob_start();

//$fn = fopen($filename, $mode);

include_once __DIR__.'/conf.php';
echo 'Archive orders & free places;';
$dsn = 'mysql:dbname='.DBNAME.';host='.DBHOST;
$user = DBUSER;
$password = DBUSERPASS;

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
// Получить время жизни брони
$book_expiration_days = (int) get_static_variable('book_expiration_days', 5);
// Получить все заказы которые у которых превышено время жизни брони
$sth = $dbh->query($sql = "
SELECT orders.id, orders.`type`, orders.create_date, orders.seans_id, orders.zal_alias, seans.seans_date
FROM orders
INNER JOIN seans ON orders.seans_id = seans.id
WHERE orders.create_date < (NOW() - INTERVAL {$book_expiration_days} DAY) AND orders.`type` = " . Order::TYPE_BOOKED);

$orders = $sth->fetchAll(PDO::FETCH_OBJ);
echo "<pre>";
var_dump($sql);
echo "<br/>SELECTED ".count($orders)." rows<br/>";
echo "</pre>";
echo "<pre>";
var_dump($orders);
echo "</pre>";

// Пройти по заказам освободить места в залах, а заказы переместить в состояние 'Cancel'
foreach ($orders as $order) 
{
	$seats = $dbh->query($sql = "SELECT GROUP_CONCAT(seat_id) AS seat_ids
FROM order_contents
WHERE order_id='{$order->id}'")->fetchColumn();
	echo "<br/>$sql<br/>";
	if ( empty($seats) )
	{
		continue;
	}
	
	$dbh->query($sql = "UPDATE {$order->zal_alias}_hall SET place_type_id=2 WHERE id IN ({$seats})");
	echo "$sql</br>";
	$dbh->query($sql = "UPDATE `orders` SET type=".Order::TYPE_CANCEL.", modify_date='".date('Y-m-d H:i:s', time())."' WHERE id='{$order->id}'");
	echo "$sql</br>";
	
}


//Заказы на сеансы которые уже прошли - в архив
echo '<br/>=================================================================<br/>';
$sth = $dbh->query($sql = "
SELECT orders.id
FROM orders
INNER JOIN seans ON orders.seans_id = seans.id
WHERE seans.seans_date < NOW() ");

echo "$sql</br>";

$orders = $sth->fetchAll(PDO::FETCH_OBJ);
echo "<pre>";
var_dump($orders);
echo "</pre>";
foreach ($orders as $order) {
	$dbh->query($sql = "UPDATE orders SET type=" . Order::TYPE_ARCHIVE . ", modify_date='".date('Y-m-d H:i:s', time())."' WHERE id = {$order->id}");
	
}



