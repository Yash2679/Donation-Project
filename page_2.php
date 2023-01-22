<?php require_once "userData.php"; ?>

<html>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
    }
}
$date = isset($_GET['date']) ? $_GET['date'] : date('d-m-Y');
$next_date = date('D,d M', strtotime($date . ' +1 day'));
$dayafternext_date = date('D,d M', strtotime($date . ' +2 day'));
$dayafter2next_date = date('D,d M', strtotime($date . ' +3 day'));

$sql = "select * from add_timings order by timings asc";
$res = mysqli_query($con, $sql);

?>

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="stylesheet" type="text/css" href="page2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

</head>


<body>


    <div class="background">
        <div class="header">
            <a href="Main.php" class="logo" id="header-logo">
                <img src="" height="70px">
            </a>
            <div class=log>
                <span style=" align-items: center;  "><a href="userdetails.php"><i class="fa fa-user fa-3x" aria-hidden="true"></i></a></span>
                <span> <button type="button" class="btn btn-primary"><a href="logout-user.php">Logout</a></button><span>
            </div>
        </div>
    </div>
    <div id=container>
        <form action="page_2.php" method="POST" autocomplete="">
            <div id="donation-step-container">
                <div class="step-content">
                    <div class="tab-content">
                        <div class="step-heading-container" style="margin-bottom: 50px;">
                            <div class="pickup-heading">
                                <h3>SCHEDULE A PICKUP</h3>
                                <p>Please select a convenient slot as per your availability</p>
                            </div>
                            <div style="overflow: hidden;padding: 16px 0;">
                                <div class="pickup-slot-column col-xs-12 col-sm-6 left-column">

                                    <div id="pickup-slot-selector-section">
                                        <h3 class="for-pick-only">1. CHOOSE A PICKUP SLOT</h3>
                                        <!-- <h3 class="for-pikkol-only" style="display: none;">1. CHOOSE A PREFERRED SLOT</h3> -->
                                        <!-- <p class="for-pikkol-only" style="display: none;font-style: italic; line-height: 16px; font-size: 13px; margin-bottom: 30px;">Due to shortage of manpower during covid19, we would request flexibility in slot. Nevertheless, we would try our best to confirm your preferred slot.</p> -->
                                        <div id="pickup-slot-selector">
                                            <div class="pickup-slot-group">
                                                <div class="inline-pickup-slots">
                                                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

                                                    <h5>Select Date:</h5>
                                                    <input type="text" class="form-control datepicker" name="date" placeholder="Select Date" />
                                                </div>
                                            </div>
                                            <div class="pickup-slot-group">
                                                <div class="inline-pickup-slots">

                                                    <h5>Select Time:</h5>
                                                    <!-- <label for="appt">Select a time:</label> 
                                                     <input type="time" id="appt" name="appt" class="form-control" placeholder="Select Time">  -->
                                                    <!-- <?php
                                                            $i = 1;
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                            ?>
                                                            <span id="time<?php echo $i ?>"><?php echo $row['timings'] ?></span>
                                                            
                                                    <?php
                                                                $i = $i + 1;
                                                            }
                                                    ?> -->
                                                    <div class="form-group">
                                                        <select name="time" class="browser-default custom-select form-control">
                                                            <option selected>Open this select menu</option>
                                                            <?php
                                                            $res = mysqli_query($con, "select id,timings from add_timings ");

                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                
                                                                    echo "<option>" . $row['timings'] . "</option>";
                                                                
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $(".inline-pickup-slots span:first").addClass("selected");
                                            $(".inline-pickup-slots span.first").attr('name', 'time');
                                            $(".inline-pickup-slots span").on("click", function() {
                                                $(".inline-pickup-slots span.selected").removeClass("selected");
                                                $(this).addClass("selected");
                                                $(".inline-pickup-slots span[name='time']").removeAttr('name');
                                                $(this).attr('name', 'time');
                                            });
                                            //     $(".inline-pickup-slots span").on("click", function() {
                                            //     });

                                        });
                                    </script>
                                    <!-- <script type="text/javascript">
                                        $(document).ready(function() {
                                            $(".inline-pickup-slots span:first").addClass("selected");
                                            $(".inline-pickup-slots span").on("click", function() {
                                                $(".inline-pickup-slots span.selected").removeClass("selected");
                                                $(this).addClass("selected");
                                            });
                                        });
                                    </script> -->
                                    <hr>

                                    <h3>2. NOTES FOR PICKUP PERSON <span style="font-size: 12px;">(Optional)</span></h3>
                                    <p style="font-size: 12px;">* We'll do our best to pass along your instructions to our Pickup Partner. Compliance isn't guaranteed.</p>
                                    <div class="form-field-wrap AnySuggestions">
                                        <textarea name="AnySuggestions" id="pickup_note" class="suggest" aria-required="false" aria-invalid="false" placeholder="Ex- Please don't ring the bell"></textarea>
                                    </div>

                                </div>

                                <div class="col-xs-12 col-sm-5 col-sm-offset-1 right-column" style="padding: 0;">
                                    <div class="pickup-form">
                                        <h5>DONOR DETAILS</h5>
                                        <div role="form" dir="ltr">
                                            <div class="screen-reader-response"></div>

                                            <div class="form-group">
                                                Name:<input class="form-control" disabled="disabled" value="<?php echo $fetch_info['name'] ?>">
                                            </div>
                                            <!-- <div class="form-group">
                                                Email-ID:<input class="form-control" disabled="disabled" value="<?php echo $fetch_info['email'] ?>">
                                            </div> -->
                                            <div class="form-group" style="float: left;">
                                                Flat/Door:<br>
                                                <input class="form-control" style="display: inline-block; width:auto;" disabled="disabled" value="<?php echo $fetch_info['flatno'] ?>">
                                                <br> City:<br>
                                                <input class="form-control" style="display: inline-block; width:auto;" disabled="disabled" value="<?php echo $fetch_info['city'] ?>">
                                            </div>
                                            <div class="form-group" style="float: right;">
                                                Flat/Door:<br>
                                                <input class="form-control" style="display: inline-block;width:auto;" disabled="disabled" value="<?php echo $fetch_info['streetname'] ?>">
                                                <br>Pincode:<br>
                                                <input class="form-control" style="display: inline-block;width:auto;" disabled="disabled" value="<?php echo $fetch_info['pincode'] ?>">
                                            </div>
                                            <div class="form-group">
                                                Mobile Number: <br>
                                                <input class="form-control" disabled="disabled" value="<?php echo $fetch_info['Mobile_Number'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkout-panel apply-coupon-section">
                                        <h3>Select a Particular NGO where you wish to Donate</h3>
                                        <div id="coupon-input-holder" style="margin: 6px 0 12px 0;overflow: hidden;padding: 0 12px;">
                                            <div class="form-group">
                                                <select name="part_ngo" class="browser-default custom-select form-control">
                                                    <option selected>Open this select menu</option>
                                                    <?php
                                                    $res = mysqli_query($con, "select id,ngo_name,ngo_city from add_ngo order by ngo_name asc");
                                                    $city = $fetch_info['city'];
                                                    while ($row = mysqli_fetch_assoc($res)) {
                                                        if ($row['ngo_city'] == $city) {
                                                            echo "<option>" . $row['ngo_name'] . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkout-button-holder">


                                        <button type="submit" name="submit1" class="btn btn-primary" style="float: right;" id="submit1"></button>
                                        <!-- <button type="button" id="backToItemSelection"><a href="home.php">BACK</a></button> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>
<script type="text/javascript">
    $('.datepicker').datepicker({
        daysOfWeekDisabled: [0, 6]
    });
</script>

</html>