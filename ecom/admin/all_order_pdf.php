<?php
include ('vendor/autoload.php');
require('connection.inc.php');
require('functions.inc.php');

if(!$_SESSION['ADMIN_LOGIN']){
   ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php
}

$css=file_get_contents('css/bootstrap.min.css');
$css.=file_get_contents('style.css');

$html='<div class="wishlist-table table-responsive">

<div style="font-family:Poppins; font-size:16px;">   
     
      <p style="text-align:center; font-family:Poppins; font-size:18px;"><b>Order Report<b></p>
      <br>
</div>
   <table style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%;">
      <thead style="border: 1px solid #dddddd;text-align:left;padding: 8px;">
         <tr style="nth-child(even) {background-color: #dddddd;}">
<th style="border:1px solid black;" class="product-thumbnail">ID</th>
<th style="border:1px solid black;" class="product-thumbnail">Name</th>
<th style="border:1px solid black;" class="product-thumbnail" class="product-thumbnail">Date</th>
<th style="border:1px solid black;" class="product-thumbnail" class="product-name">Address</th>
<th style="border:1px solid black;" class="product-thumbnail" class="product-name">Payment Mode</th>
<th style="border:1px solid black;" class="product-thumbnail" class="product-name">Order Status</th>
         </tr>
      </thead>
      <tbody>';
      
      if(isset($_SESSION['ADMIN_LOGIN'])){
      $sql="select `order`.*,users.name,order_status.name as order_status_str from `order`,users,order_status where users.id=order.user_id and order_status.id=`order`.order_status";
         $res=mysqli_query($con,$sql,);
      }
		if(mysqli_num_rows($res)==0){
			die();
		}
		while($row=mysqli_fetch_assoc($res)){
         
         $html.='<tr style="border:1px solid black;">
<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name">'.$row['id'].'</td>

<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name">'.$row['name'].'</td>

<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name" width="15%">'.$row['added_on'].'</td>

<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name">'.$row['address'].'</td>

<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name">'.$row['payment_type'].'</td>

<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name">'.$row['order_status_str'].'</td>

</tr>';
         }
      $html.='</tbody>
   </table>
</div>';
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html,2);
$file=time().'.pdf';
$mpdf->Output($file,'D');
?>

