<?php
require('top.inc.php');

if (isset($_GET['type']) && $_GET['type']!='') {
   $type=get_safe_value($con,$_GET['type']);
   if ($type=='status') {
      $operation=get_safe_value($con,$_GET['operation']);
      $id=get_safe_value($con,$_GET['id']);
      if ($operation=='active') {
         $status='1';
      }else{
         $status='0';
      }
      $update_status_sql="update product set status='$status' where id='$id'";
      mysqli_query($con,$update_status_sql);
   }

   if ($type=='delete') {
      $id=get_safe_value($con,$_GET['id']);
      $delete_sql="delete from product where id='$id'";
      mysqli_query($con,$delete_sql);
   }

}

$sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id asc";
$res=mysqli_query($con,$sql);

?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Uniform</h4>
                           <h4 class="box-link"><a href="manage_product.php">Add Uniforms</a></h4>
                        </div>
                        <button type="button" class="btn btn-outline-primary"><a style="color:black;" href="product_pdf.php">Generate Report</a></button>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       
                                       <th>ID</th>
                                       <th>Category</th>
                                       <th>Name</th>
                                       <th>Photo</th>
                                       <th>MRP</th>
                                       <th>Price</th>
                                       <th>Qty</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($res)) {?>
                                    <tr>
                                       
                                       <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['categories']?></td>
                                       <td><?php echo $row['name']?></td>
                                       <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>
                                       <td><?php echo $row['mrp']?></td>
                                       <td><?php echo $row['price']?></td>
                                       <td><?php echo"Initial Qty";echo $row['qty']?><br/>
                                       <?php
                                       $productSoldQtyByProductId=productSoldQtyByProductId($con,$row['id']);
                                       $pending_qty=$row['qty']-$productSoldQtyByProductId;

                                       ?>
                                       <?php
                                       if($pending_qty!='0'){
echo "<br><p style=color:black; font-size:14px; class=pendingqty>Available Qty : $pending_qty</p>";
                                       }
                                       if($pending_qty=='0'){
echo "<br><p style=color:red; font-size:14px; font-style:bold; class=pendingqty>Available Qty : $pending_qty</p>";
                                       }

                                       ?>
                                       </td>
                                       <td>  
                                          <?php 
                                          // if ($row['status']==1) {
                                          //    echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
                                          // }else{
                                          //    echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
                                          // }
                                          echo "&nbsp;<span class='badge badge-edit'><a href='manage_product.php?&id=".$row['id']."'>Edit</a></span>&nbsp";

                                          echo "&nbsp;<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>&nbsp";
                                    ?>
                                 </td>
                              </tr>
                           <?php } ?>
                        </tbody>
                     </table>
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