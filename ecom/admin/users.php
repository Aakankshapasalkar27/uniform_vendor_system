<?php
require('top.inc.php');

if (isset($_GET['type']) && $_GET['type']!='') {
	$type=get_safe_value($con,$_GET['type']);
	if ($type=='delete') {
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from users where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from users order by id asc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Users</h4>
                        </div>
      <button type="button" class="btn btn-outline-primary"><a style="color:black;" href="user_pdf.php">Generate Report</a></button>

                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Email-ID</th>
                                       <th>Contact</th>
                                       <th>Date</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($res)) {?>
                                    <tr>
                                       <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['name']?></td>
                                       <td><?php echo $row['email']?></td>
                                       <td><?php echo $row['mobile']?></td>
                                       <td><?php echo $row['added_on']?></td>



                                       <td>
                                          <?php 
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