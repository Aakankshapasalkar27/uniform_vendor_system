<?php
require('top.inc.php');
$order_id=get_safe_value($con,$_GET['id']);
$coupon_details=mysqli_fetch_assoc(mysqli_query($con,"select coupon_value,coupon_code from `order` where id='$order_id'"));
$coupon_value=$coupon_details['coupon_value'];
$coupon_code=$coupon_details['coupon_code'];
if(isset($_POST['update_order_status'])){
  $update_order_status=$_POST['update_order_status'];
  mysqli_query($con,"update `order` set order_status='$update_order_status' where id='$order_id'");
}
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Order Detail</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                  <table class="table">
                <thead>
                    <tr>
                        <th class="product-thumbnail">Uniform Name</th>
                        <th class="product-name">Uniform Photo</th>
                        <th class="product-price">Quantity</th>
                        <th class="product-price">Amount</th>
                        <th class="product-price">Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $res=mysqli_query($con,"select distinct(order_detail.id),order_detail.*,product.name,product.image from order_detail , product , `order` where order_detail.order_id='$order_id' and order_detail.product_id=product.id");
                        $total_price=0;
                        while($row=mysqli_fetch_assoc($res)){
                          $total_price=$total_price+($row['qty']*$row['price']);
                    ?>
                    <tr>
                        <td class="product-name"><?php echo $row['name'] ?></td>
                        <td class="product-name"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image'] ?>" alt="full-image"></td>
                        <td class="product-name"><?php echo $row['qty'] ?></td>
                        <td class="product-name"><?php echo $row['price'] ?></td>
                        <td class="product-name"><?php echo $row['qty']*$row['price'] ?></td>
                    </tr>
                <?php }
                        if($coupon_value!=''){
                        ?>
                    </tr>
                 
                    <tr>
                        <td colspan="3"></td>
                        <td class="product-name">Total Amount</td>
                        <td class="product-name"><?php echo $total_price-$coupon_value;?></td>
                    </tr>
                <?php } else{ ?>
                <tr>
                        <td colspan="3"></td>
                        <td class="product-name">Total Amount</td>
                        <td class="product-name"><?php echo $total_price?></td>
                    </tr>
                  <?php }?>
                </tbody>

            </table>
            <div id="address_details">
              <strong>Address</strong>
              <!--<?php echo $address?>,<?php echo $city?>,<?php echo $pincode?><br/><br/>-->
              <?php
              $order_address_arr=mysqli_fetch_assoc(mysqli_query($con,"select address,city,pincode,contacts from `order` where id='$order_id'"));
              echo $order_address_arr['address']; echo ",&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
              echo $order_address_arr['city'];  echo ",&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
              echo $order_address_arr['pincode']; echo ",&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
              ?>
              <br>
              <strong>Contact</strong>
              <?php echo $order_address_arr['contacts'];?>
              <br/><br/><strong>Order Status</strong>
              <?php
              $order_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select order_status.name from order_status,`order` where `order`.id='$order_id' and `order`.order_status=order_status.id"));
              echo $order_status_arr['name'];
              ?>

              <div>
                <form method="post">
                  <select class=" form-control" name="update_order_status">
                           <option>Select Status</option>
                           <?php
                           $res=mysqli_query($con,"select * from order_status");
                           while ($row=mysqli_fetch_assoc($res)) {
                              if ($row['id']==$categories_id) {
                                 echo "<option selected value=".$row['id'].">".$row['name']."</option>";
                              }
                              echo "<option value=".$row['id'].">".$row['name']."</option>";
                           }
                           ?>
                        </select> 
                        <input type="submit" class="form-control"/>
                </form>
              </div>
            </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </div>
</div>
<?php
require('footer.inc.php');
?>