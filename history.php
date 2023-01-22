<?php
require('top.inc.php');



$sql = "select * from place_order";
$res = mysqli_query($con, $sql);

?>
<script>
	function a() {

		if (window.confirm("Are you Sure you want to Delete")) {
			<?php
			if (isset($_GET['type']) && $_GET['type'] != '') {
				$type = get_safe_value($con, $_GET['type']);
				if ($type == 'delete') {
					$id = get_safe_value($con, $_GET['id']);
					$delete_sql = "delete from add_ngo where id='$id'";
					mysqli_query($con, $delete_sql);
				}
			}
			?>
		}
	}
</script>
<div class="content pb-0">
	<div class="orders">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<h4 class="box-title">NGO </h4>
						<h4 class="box-link"><a href="manage_ngo.php">Add NGO's</a> </h4>
					</div>
					<div class="card-body--">
						<div class="table-stats order-table ov-h">
							<table class="table ">
								<thead>
									<tr>
										<th class="serial">#</th>
										<!-- <th>ID</th> -->
										<th>User-Email</th>
										<th>Times Donated</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									while ($row = mysqli_fetch_assoc($res)) {
                                        
                                        if($row['status']==0){
                                        ?>
										<tr>
											<td class="serial"><?php echo $i ?></td>
											<td><?php    echo $row['user_email'];
                                             ?></td>
											<td><?php echo $row['date'] ?></td>
											<?php $i = $i + 1 ?>
											<td>
												<?php
												echo "<span class='badge badge-edit'><a href='manage_ngo.php?id=" . $row['id'] . "'>Edit</a></span>&nbsp;";
												echo "<span onclick='a()' class='badge badge-delete'><a href='?type=delete&id=" . $row['id'] . "'>Delete</a></span>";
												?>
											</td>

										</tr>
									<?php }} ?>
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