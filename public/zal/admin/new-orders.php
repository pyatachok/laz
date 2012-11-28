<?php
include_once "../../inc/conf.php";
header("Location: http://liveanimation.ru/admin/order");
exit;
$orderClass = new Order();
$action = safe_get($_REQUEST, 'action', false);
$orderId =  safe_get($_REQUEST, 'order_id', false);
if ( false !== $action )
{
	$order = $orderClass->getById($orderId);
	
	if (in_array($action, array('buy', 'cancel')) )
	{
		if ( $order)
		{
			$seatState = ('buy' == $action ? Order::SEATE_soled : Order::SEATE_free);
			$orderType = ('buy' == $action ? Order::TYPE_PAYED : Order::TYPE_CANCEL);
			$orderClass->markSeatsAsState($order->seats, $seatState, $order->zal_alias);
			$orderClass->updateOrder($orderId, 'type', $orderType);
			smtpmail(ADMIN_EMAIL, strtoupper($action) . ' ORDER: '.$orderId, var_export(array($_REQUEST, $order, $_SERVER), true));
		}
		else 
		{
			smtpmail(ADMIN_EMAIL, 
					'ERROR ORDER MANAGEMENT: Can not get order.', 
					var_export(array(
						'order_id' => $orderId,
						'action' => $action,
						'REQUEST' => $_REQUEST,
						'SERVER' => $_SERVER,
					), true) );
		}
		$orderClass->markSeatsAsState($seats, $state, $zal_alias);
	} 
	elseif ( 'del' == $action )
	{
		if( $order )
		{
			smtpmail(ADMIN_EMAIL, 'DEL ORDER: '.$orderId, var_export(array($_REQUEST, $_SERVER, $order), true));
//			$orderClass->markSeatsAsState($order->seats, Order::SEATE_free, $order->zal_alias);
			$orderClass->delOrder($orderId);
		}
	}
}


$orders = $orderClass->getAll('*', true, 'modify_date DESC');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<style>
				td{
					border: 1px #2b81af solid;
					
				}
				th{
					background-color: #ffdd57;
				}
			</style>
			<title>Новые заказы</title>
			<script type="text/javascript" src="js/jquery-ui-1.8.24.custom/js/jquery-1.8.0.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
//				$('form [name="orders-form"').submit();
				$('.buy-button, .cancel-button, .del-button').click(function(){
					var $form = $('#orders-form');
					var $action = $('#action');
					var $order_id = $('#order_id');
					$action.val($(this).attr('name'));
					$order_id.val($(this).attr('data-order-id'));
					$form.submit();
				});

			})
		</script>
    </head>
    <body>
		<b style="color: #c40000 ">Помните! Действия производимые вами могут иметь последствия!</b>
		<p>Кнопка Del <b>НЕ</b> изменяет статус места на схеме. <br />Кнопки Canсel и Buy <b>изменяют</b> статус места на схеме зала.<br/>Будьте осторожны с внесением изменений</p>
		<form name="orders-form" id="orders-form" action="<?php $_SERVER['PHP_SELF']?>" method="post">
		<input type="hidden" name="action" id="action" value="" />
		<input type="hidden" name="order_id" id="order_id" value="" />
		<table>
			<thead>
				<?php foreach ($orderClass->columns_to_display as $field => $value) : ?>
				<th>
					<?php echo $value; ?>
				</th>
				<?php endforeach; ?>
			</thead>
			<tbody>
				<?php foreach ($orders as $id => $order) : ?>
				<tr>
					<?php foreach ($orderClass->columns_to_display as $field => $value) : ?>
					<td>
						<?php if ('operations' == $field ) : ?>
							<?php if ( in_array($order->type, array('booked', 'payed') ) ) : ?>
								<input type="button" value="Cancel!" name="cancel" class="cancel-button" data-order-id="<?php echo $order->id ?>"/>
								<?php if ( $order->type == 'booked' ) : ?>
									<input type="button" value="Buy!" name="buy" class="buy-button" data-order-id="<?php echo $order->id ?>" />
								<?php endif; ?>
							<?php endif; ?>
					
						<input type="button" value="Del!" name="del" class="del-button" data-order-id="<?php echo $order->id ?>" />
						<?php else :?>
							<?php echo safe_get($order, $field, '&nbsp;'); ?>
						<?php endif; ?>
					</td>
					<?php endforeach; ?>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</form>
    </body>
</html>
