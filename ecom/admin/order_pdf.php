<?php
include ('vendor/autoload.php');
require('connection.inc.php');
require('functions.inc.php');

if(!$_SESSION['ADMIN_LOGIN']){
	if(!isset($_SESSION['USER_ID'])){
	die();
   }
}

$order_id=get_safe_value($con,$_GET['id']);

$coupon_details=mysqli_fetch_assoc(mysqli_query($con,"select coupon_value from `order` where id='$order_id'"));
$coupon_value=$coupon_details['coupon_value'];

$date_pdf=mysqli_fetch_assoc(mysqli_query($con,"select * from `order` where id='$order_id'"));

$css=file_get_contents('css/bootstrap.min.css');
$css.=file_get_contents('style.css');

$html='<div class="wishlist-table table-responsive">

<div style="font-family:Poppins; font-size:16px;">   
      <img src="images/logo/5.jpg" style="width:200px;"><br><br>
      <p style="text-align:left;"><b>Name:</b> '.$_SESSION['USER_NAME'].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date:<b> '.$date_pdf['added_on'].' </b></p>
      <p style="text-align:left;"><b>Address:</b> '.$date_pdf['address'].' '.$date_pdf['city'].' '.$date_pdf['pincode'].' </p>
      <p style="text-align:left;"><b>Payment Mode:</b> '.$date_pdf['payment_type'].'</p>
</div>
   <table style="border:1px solid black;">
      <thead style="border:1px solid black;">
         <tr style="border:1px solid black;">
            <th class="product-thumbnail">Product Name</th>
            <th class="product-thumbnail">Product Image</th>
            <th class="product-name">Qty</th>
            <th class="product-price">Price</th>
            <th class="product-price">Total Price</th>
         </tr>
      </thead>
      <tbody>';
      
      if(isset($_SESSION['ADMIN_LOGIN'])){
      	$res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and order_detail.product_id=product.id");
      }else{
      	$uid=$_SESSION['USER_ID'];
      	$res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
      }
		
		$total_price=0;
		if(mysqli_num_rows($res)==0){
			die();
		}
		while($row=mysqli_fetch_assoc($res)){
		$total_price=$total_price+($row['qty']*$row['price']);
		$pp=$row['qty']*$row['price'];
         $html.='<tr style="border:1px solid black;">
            <td class="product-name">'.$row['name'].'</td>
            <td class="product-name"> <img src="'.PRODUCT_IMAGE_SITE_PATH.$row['image'].'"style="width:150px;"></td>
            <td class="product-name">'.$row['qty'].'</td>
            <td class="product-name">'.$row['price'].'</td>
            <td class="product-name">'.$pp.'</td>
         </tr>';
         }
         if($coupon_value!=''){
            $html.='<tr style="border:1px solid black;">
                    <td colspan="3"></td>
                    <td class="product-name">Coupon Value</td>
                    <td class="product-name">'.$coupon_value.'</td>

                    </tr>';
         
         $total_price=$total_price-$coupon_value;
         $html.='<tr style="border:1px solid black;">
            <td colspan="3"></td>
            <td class="product-name">Total Price</td>
            <td class="product-name">'.$total_price.'</td>
         </tr>';
      }
         if($coupon_value==''){
            $html.='<tr style="border:1px solid black;">
            <td colspan="3"></td>
            <td class="product-name">Total Price</td>
            <td class="product-name">'.$total_price.'</td>
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

