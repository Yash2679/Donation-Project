<?php
require('top.inc.php');
$ngo_name='';
$ngo_city='';
$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from add_ngo where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$add_ngo=$row['ngo_name'];
		// $add_city=$row['ngo_city'];
	}else{
		header('location:ngo.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories=get_safe_value($con,$_POST['ngo_name']);
	$ngo_city=get_safe_value($con,$_POST['ngo_city']);
	$res=mysqli_query($con,"select * from add_ngo where ngo_name='$categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="NGO already exist";
			}
		}else{
			$msg="NGO already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update add_ngo set ngo_name='$categories', ngo_city='$ngo_city' where id='$id'");
		}else{
			mysqli_query($con,"insert into add_ngo(ngo_name,ngo_city,status) values('$categories','$ngo_city','1')");
		}
		header('location:ngo.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>NGO</strong><small> Form</small></div>
                        <form method="post">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="ngo_name" class=" form-control-label">NGO</label>
									<input type="text" name="ngo_name" placeholder="Enter NGO name" class="form-control" required value="<?php echo $ngo_name?>">
								</div>
								<div class="form-group">
									<label for="ngo_city" class=" form-control-label">NGO City</label>
									<input type="text" name="ngo_city" placeholder="Enter NGO City" class="form-control" required value="<?php echo $ngo_city?>">
								</div>
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>