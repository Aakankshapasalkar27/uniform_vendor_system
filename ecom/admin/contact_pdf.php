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
      <img src="images/5.jpg" style="width:200px; padding-left:240px;"><br><br>
      <p style="text-align:center; font-family:Poppins; font-size:18px;"><b>Enquiries Report<b></p>
      <br>
</div>
   <table style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%;">
      <thead style="border: 1px solid #dddddd;text-align:left;padding: 8px;">
         <tr style="nth-child(even) {background-color: #dddddd;}">
<th style="border:1px solid black;" class="product-thumbnail">ID</th>
<th style="border:1px solid black;" class="product-thumbnail" class="product-thumbnail">Name</th>
<th style="border:1px solid black;" class="product-thumbnail" class="product-name">Email-Id</th>
<th style="border:1px solid black;" class="product-thumbnail" class="product-name">Contact</th>
<th style="border:1px solid black;" class="product-thumbnail" class="product-name">Query</th>
<th style="border:1px solid black;" class="product-thumbnail" class="product-name">Date - Time</th>
         </tr>
      </thead>
      <tbody>';
      
      if(isset($_SESSION['ADMIN_LOGIN'])){
      	$res=mysqli_query($con,"select * from contact_us");
      }
		if(mysqli_num_rows($res)==0){
			die();
		}
		while($row=mysqli_fetch_assoc($res)){
         $html.='<tr style="border:1px solid black;">
<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name">'.$row['id'].'</td>

<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name">'.$row['name'].'</td>

<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name">'.$row['email'].'</td>

<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name">'.$row['mobile'].'</td>

<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name">'.$row['comment'].'</td>

<td style="border: 1px solid #dddddd; text-align: center;padding: 8px;" class="product-name">'.$row['added_on'].'</td>
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

