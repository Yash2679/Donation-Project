<?php
require('top.inc.php');
$ngo_timings = '';
// $ngo_date='';
$msg = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "select * from add_timings where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $add_timings = $row['timings'];
        // $add_city=$row['ngo_city'];
    } else {
        header('location:change_timings.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $categories = get_safe_value($con, $_POST['ngo_timings']);
    // $time = get_safe_value($con, $_POST['ngo_date']);
    $res = mysqli_query($con, "select * from add_timings where timings='$categories'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = "NGO already exist";
            }
        } else {
            $msg = "NGO already exist";
        }
    }

    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            mysqli_query($con, "update add_timings set timings='$categories' where id='$id'");
        } else {
            mysqli_query($con, "insert into add_timings(timings,status) values('$categories','1')");
        }
        header('location:change_timings.php');
        die();
    }
}
$date = isset($_GET['date']) ? $_GET['date'] : date('d-m-Y');
$next_date = date('D,d M', strtotime($date .' +1 day'));
$dayafternext_date = date('D,d M', strtotime($date .' +2 day'));
$dayafter2next_date = date('D,d M', strtotime($date .' +3 day'));

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
                                <label for="timings" class=" form-control-label">Time</label>
                                <input type="text" name="ngo_timings" placeholder="Enter Timings" class="form-control" required value="<?php echo $ngo_timings ?>">
                            </div>
                            <!-- <div class="form-group"> -->
                                <!-- <label for="timing_type" class=" form-control-label">Day</label> -->
                                <!-- <input type="text" name="ngo_date" placeholder="Enter Timings" class="form-control" required value="<?php echo $ngo_date ?>"> -->
                                <!-- <label for="timing_type" class=" form-control-label" >Choose a Day:</label>

                                <select name="ngo_date" id="ngo_date"class="form-control" required>
                                    <option value="">Click here to select an Option:</option>
                                    <option value="current"><?php echo "$next_date"?></option>
                                    <option  value="tomorrow"><?php echo "$dayafternext_date"?></option>
                                    <option  value="dayaftertomorrow"><?php echo "$dayafter2next_date"?></option>
                                </select>
                            </div> -->
                            <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                            <div class="field_error"><?php echo $msg ?></div>
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