<?php
require('top.inc.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
	$type = get_safe_value($con, $_GET['type']);
	if ($type == 'status') {
		$operation = get_safe_value($con, $_GET['operation']);
		$id = get_safe_value($con, $_GET['id']);
		if ($operation == 'deactive') {
			$status = '0';
			$sqli = "SELECT * FROM place_order WHERE id = '$id'";
			$run_Sql = mysqli_query($con, $sqli);
			if ($run_Sql) {
				$fetch_info = mysqli_fetch_assoc($run_Sql);
			}
			$time = $fetch_info['time'];
			$date = $fetch_info['date'];
			$visitor_email = $fetch_info['user_email'];
			$sqli2 = "SELECT * FROM usertable WHERE email = '$visitor_email'";
			$run_Sql2 = mysqli_query($con, $sqli2);
			if ($run_Sql2) {
				$fetch_info2 = mysqli_fetch_assoc($run_Sql2);
			}
			$name = $fetch_info2['name'];
			$subject = "Email Verification Code";
			$message = "Hi $name \n" .
				"These are your entered details:\n  Timings:$time\n  Date:$date\n Thank you for donating through our website.\n";
			$sender = "From: vyash9831@gmail.com";
			mail($visitor_email, $subject, $message, $sender);
			// $email_from = 'vyash9831@gmail.com'; //<== update the email address
			// $email_subject = " for Pickup";
			// $email_body = "Hi $name \n" .
			// 	"These are your entered details:\n  Timings:$time\n  Date:$date\n Thank you for donating through our website\n" .

			// $to = $visitor_email; //<== update the email address
			// $headers = "From: $email_from \r\n";
			// // $headers .= "Reply-To: $visitor_email \r\n";
			// //Send the email!
			// mail($to, $email_subject, $email_body, $headers);

			$update_status_sql = "update place_order set status='$status' where id='$id'";
			mysqli_query($con, $update_status_sql);
		}
	}
	// if (isset($_GET['type']) && $_GET['type'] != '') {
	// 	$type = get_safe_value($con, $_GET['type']);
	// 	if ($type == 'delete') {
	// 		$id = get_safe_value($con, $_GET['id']);
	// 		$delete_sql = "delete from place_order where id='$id'";
	// 		mysqli_query($con, $delete_sql);
	// 	}
	// }
}

$sql = "select * from place_order ";
$res = mysqli_query($con, $sql);

?>
<script type="text/javascript">
	function fun() {
		alert("Mail Already Sent!!");
	}
	function confirm(){
		
	}
	function delete_alert() {
		var res=confirm("Are you Sure you want to Delete") 
		if(res){
			<?php 
			 if (isset($_GET['type']) && $_GET['type'] != '') {
		 	$type = get_safe_value($con, $_GET['type']);
			if ($type == 'delete') {
				$id = get_safe_value($con, $_GET['id']);
				$delete_sql = "delete from place_order where id='$id'";
				mysqli_query($con, $delete_sql);
			}
		}?>
		}
		else{
			return false;
		}
	}
</script>
<div class="content pb-0">
	<div class="orders">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<h4 class="box-title">Placed Orders</h4>
					</div>
					<div class="card-body--">
						<div class="table-stats order-table ov-h">
							<table class="table ">
								<thead>
									<tr>
										<th class="serial">#</th>
										<th>User-Email</th>
										<th>Clothes</th>
										<th>Stationary</th>
										<th>Footwear</th>
										<th>Other</th>
										<th>Date</th>
										<th>Time</th>
										<th>Special-Note</th>
										<th>NGO Name</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									while ($row = mysqli_fetch_assoc($res)) { ?>
										<tr>
											<td class="serial"><?php echo $i ?></td>
											<!-- <td><?php echo $row['id']
														?></td> -->
											<td><?php echo $row['user_email'] ?></td>
											<td><?php echo $row['clothes'] ?></td>
											<td><?php echo $row['stationary'] ?></td>
											<td><?php echo $row['shoes'] ?></td>
											<td><?php echo $row['other'] ?></td>
											<td><?php echo $row['date'] ?></td>
											<td><?php echo $row['time'] ?></td>
											<td><?php echo $row['notes'] ?></td>
											<td><?php echo $row['particular_ngo'] ?></td>
											<?php $i = $i + 1 ?>
											<td>
												<?php
												if ($row['status'] == 1) {
													echo "<span onclick=confirm() class='badge badge-complete'><a href='?type=status&operation=deactive&id=" . $row['id'] . "'>Send Mail</a></span>&nbsp;";
												} else {
													echo "<span onclick = fun() class='badge badge-pending'><a href='?type=status&operation=active&id=" . $row['id'] . "'>Mail Sent</a></span>&nbsp;";
												}

												// echo "<span class='badge badge-edit'><a href='manage_ngo.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
												echo "<span  class='badge badge-delete'><a onclick='delete_alert()' href='?type=delete&id=" . $row['id'] . "'>Delete</a></span>";
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