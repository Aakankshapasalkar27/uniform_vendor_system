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

      <p style="text-align:center; font-family:Poppins; font-size:18px;"><b>Product Master Report<b></p>
      <br>
</div>
   <table style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%;">
      <thead style="border: 1px solid #dddddd;text-align:left;padding: 8px;">
         <tr style="nth-child(even) {background-color: #dddddd;}">
<th style="border:1px solid black;" class="product-thumbnail">ID</th>
<th style="border:1px solid black;" class="product-thumbnail" class="product-thumbnail">Category</th>
<th style="border:1px solid black;" class="product-thumbnail" class="product-name">Product</th>
<th style="border:1px solid black;" class="product-thumbnail" class="product-name">Mrp</th>
<th style="border:1px solid black;" class="product-thumbnail" class="product-name">Price</th>
         </tr>
      </thead>
      <tbody>';
      
      if(isset($_SESSION['ADMIN_LOGIN'])){
         $sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id asc";
         $res=mysqli_query($con,$sql);
      }
		if(mysqli_num_rows($res)==0){
			die();
		}
		while($row=mysqli_fetch_assoc($res)){
         $html.='<tr style="border:1px solid black;">
<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name">'.$row['id'].'</td>

<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name">'.$row['categories'].'</td>

<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name">'.$row['name'].'</td>

<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name">'.$row['mrp'].'</td>

<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name">'.$row['price'].'</td>
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

