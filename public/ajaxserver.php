<?php
include_once 'inc/conf.php';
header('Content-Type : application/json');
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Accept-Charset: utf-8");
$action = safe_get($_REQUEST, 'action', false);
switch ($action)
{
	case 'getHall':
		$hallClass = new Hall();
		$seans = safe_get($_REQUEST, 'seans', false);
		$seansClass = new Seans();
		$prices = $seansClass->getPricesBySeans($seans);
		$seans = $seansClass->getById($seans);
		$zalClass = new Zal();
		$zal = $zalClass->getByAlias($seans->zal_alias);
		$hallScheame = $hallClass->getHallScheameBySeansId($seans->id);
		ob_start();
		?>
			<div  style="width: <?php echo (int)$zal->display_width + 280 + 30 + 30; ?>px">
			<table class="hall-scheame-wrapper collumn-1">
				<tr>
					<td></td>
					<td>Схема зала</td>
					<td></td>
				</tr>
				
				<tr>
					<td></td>
					<td>
						<table class="hall-scheame">
							<?php foreach ($hallScheame as $hall_part => $hallScheamePart) : ?>
							<?php foreach ($hallScheamePart as $rowId => $row) : ?>
								<tr class="hall-scheame-row">
									<td class="row-number"><?php echo ( !empty($row[1]->ticket_row) ? $row[1]->ticket_row : '' ) ?></td>
									
									<td style="border: none; "></td>
									<?php foreach ($row as $seatNumber => $seat) : ?>
									<?php if ( in_array( $seat->place_type, array('empty', 'not_active'))) : ?>
										<td style="border: none; ">
											<span class="<?php echo $seat->place_type ?>"></span>
										</td>
									<?php else : ?>
										<td class="hall-scheame-seat <?php echo $seat->ticket_state ?>">
											<a id="seat_<?php echo $seat->id."_r_{$seat->ticket_row}_n_{$seat->seat_number}" ?>" 
												<?php echo ('free' == $seat->place_type ? 'class="seat"' : '') ?> 
											   title="место <?php echo $seat->seat_number?>"
											   <?php echo ( 'kassa' === $seat->place_type ? "href='{$seat->kassa_url}'" : '' ) ;?>
											   >
												<span class="<?php echo $seat->place_type ?>">
												</span>
											</a>
										</td>
										<?php endif; ?>
									<?php endforeach; ?>
									<td style="border: none; "></td>
									<td class="row-number"><?php echo ( !empty($row[1]->ticket_row) ? $row[1]->ticket_row : '' ) ?></td>
								</tr>
							<?php endforeach; ?>
								<tr><td colspan="<?php	echo $seatNumber;?>" class ="road" style="border: none; font-size: 10px;">
										<span >&nbsp;</span>
									</td>
								</tr>
							<?php endforeach; ?>
						</table>
					<td></td>
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td>Сцена</td>
					<td></td>
				</tr>
			</table>
				
			<div class="collumn-2">
			 <table class="legend">
				 <tbody>
				<tr>
					<td colspan="2" style="text-align: center; white-space: nowrap">Категория мест:</td>
				</tr>
				<tr>
					<td class="hall-scheame-seat VIP"> VIP </td>
					<td class="hall-scheame-seat VIP"> <?php echo ( isset($prices[1]) ? $prices[1]->price  : '---' )?> </td>
				</tr>
				<tr>
					<td class="hall-scheame-seat deluxe"> Deluxe </td>
					<td class="hall-scheame-seat deluxe"> <?php echo ( isset($prices[2]) ? $prices[2]->price  : '---' )?> </td>
				</tr>
				<tr>
					<td class="hall-scheame-seat standart"> Standart </td>
					<td class="hall-scheame-seat standart"> <?php echo ( isset($prices[3]) ? $prices[3]->price : '---' )?> </td>
				</tr>
				<tr>
					<td class="hall-scheame-seat economy"> Economy </td>
					<td class="hall-scheame-seat economy"> <?php echo ( isset($prices[4]) ? $prices[4]->price  : '---' )?>  </td>
				</tr>
			</tbody>
			</table>
			<input type="hidden" name="seats" id="seats" value="" />
			<div class="choise-block">
				<p>Ваш Выбор:</p>
				<textarea readonly="readonly" name="seats-rows" id="seats-rows"></textarea>
			</div>
			</div>
			<?php if ( 0 == $seans->is_strickt_seat ) : ?> 
			<div style="clear: both"></div>
				<p> Рассадка свободная. Выбор места не влиет на рассадку в зале.</p>
			<?php endif; ?>
		</div>
		<?php
		$out = ob_get_contents();
		ob_end_clean();
		echo json_encode(array(	'html' => trim($out),'width' => $zal->display_width, 'height' => $zal->display_height,));
		break;
	default :
		echo json_encode(array(	'html' => 'Попробуйте повторить операцию в другом броузере.','width' => '800', 'height' => '300',));
		break;
}


