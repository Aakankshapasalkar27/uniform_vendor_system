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
      $update_status_sql="update servicing_meets set status='$status' where id='$id'";
      mysqli_query($con,$update_status_sql);
   }

   if ($type=='delete') {
      $id=get_safe_value($con,$_GET['id']);
      $delete_sql="delete from servicing_meets where id='$id'";
      mysqli_query($con,$delete_sql);
   }

}

$sql="select * from servicing_meets order by id asc";
$res=mysqli_query($con,$sql);

?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Servicing Meets</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Email-ID</th>
                                       <th>Contact</th>
                                       <th>Type</th>
                                       <th>Booked On</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($res)) {?>
                                    <tr>
                                       <td class="serial"><?php echo $i?></td>
                                       <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['name']?></td>
                                       <td><?php echo $row['email']?></td>
                                       <td><?php echo $row['mobile']?></td>
                                       <td><?php echo $row['type']?></td>
                                       <td><?php echo $row['added_on']?></td>



                                       <td>
                                          <?php 
                                          if ($row['status']==1) {
                                             echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Done</a></span>&nbsp&nbsp&nbsp&nbsp;";
                                          }else{
                                             echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Pending</a></span>&nbsp&nbsp&nbsp&nbsp;";
                                          }
                                         // echo "&nbsp;<span class='badge badge-edit'><a href='manage_categories.php?&id=".$row['id']."'>Edit</a></span>&nbsp";

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
