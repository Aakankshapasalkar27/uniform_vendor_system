<?phprequire('connection.inc.php');require('functions.inc.php');echo '<b>Transaction In Process, Please do not reload</b>';mysqli_query($con,"update `order` set payment_status='$status', mihpayid='$mihpayid' where txnid='$txnid'");	?>	<script>		window.location.href='payment_fail.php';	</script>	<?php	?>