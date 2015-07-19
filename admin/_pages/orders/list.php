<?php 

$objOrder = new Order();
$srch = Url::getParam('srch');

if (!empty($srch)) {
	$orders = $objOrder->getOrders($srch);
	$empty = 'There are no results matching your searching criteria.';
} else {
	$orders = $objOrder->getOrders();
	$empty = 'There are currently no records.';
}

$objPaging = new Paging($orders, 5);
$rows = $objPaging->getRecords();

$objPaging->_url = substr_replace($objPaging->_url, "/start/admin/", 0, 7);

require_once('template/_header.php') ;?>

<h1>Orders</h1>

<form action="" method="get">
	<?php echo Url::getParams4Search(array('srch', Paging::$_key));?>
	<table cellspacing="0" cellpadding="0" border="0" class="tbl_repeat">
		<tr>
			<th><label for="srch">Order no.:</label></th>
			<td>
				<input type="text" name="srch" id="srch" value="<?php echo stripcslashes($srch) ;?>" class="fld" />
			</td>
			<td>
				<label for="btn_add" class="sbm sbm_blue fl_l">
					<input type="submit" id="btn_add" class="btn" value="Search" />
				</label>
			</td>
		</tr>
	</table>
</form>

<?php if (!empty($rows)) { ?>

<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
	<tr>
		<th class="col_5">ID</th>
		<th>Date</th>
		<th class="col_15 ta_r">Total</th>
		<th class="col_15 ta_r">Status</th>
		<th class="col_15 ta_r">PayPal Status</th>
		<th class="col_15 ta_r">Remove</th>
		<th class="col_15 ta_r">View</th>
	</tr>

	<?php foreach ($rows as $order) { ?>

	<tr>
		<td><?php echo $order['id'];?></td>
		<td><?php echo Helper::setDate(1, $order['total']);?></td>
		<td class="ta_r">&pound;<?php echo number_format($order['date'], 2);?></td>
		<td class="ta_r">
			<?php 
					$status = $objOrder->getStatus($order['status']);
					echo $status['name'];
			?>
		</td>
		<td>
			<?php 
				echo $order['payment_status'];
			?>
		</td>
		

		<td class="ta_r"><a href="/start/admin/?page=products&amp;action=remove&amp;id=<?php echo $product['id'];?>">Remove</a></td>
		<td class="ta_r"><a href="/start/admin?page=products&amp;action=edit&amp;id=<?php echo $product['id'];?>">Edit</a></td>
	</tr>

	<?php }?>
</table>

<?php echo $objPaging->getPaging();?>

<?php } else { 
	echo '<p>'.$empty.'</p>';
} ?>
<?php require_once('template/_footer.php') ;?>