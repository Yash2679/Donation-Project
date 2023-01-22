<?php require_once "userData.php"; ?>

<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        //         $status = $fetch_info['status'];
        //         $code = $fetch_info['code'];
        //         if ($status == "verified") {
        //             if ($code != 0) {
        //                 header('Location: reset-code.php');
        //             }
        //         } else {
        //             header('Location: user-otp.php');
        //         }
        //     }
        // } else {
        //     header('Location: login-user.php');
    }
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="background">
        <div class="header">
            <a href="Main.php" class="logo" id="header-logo">
                <img src="" height="70px">
            </a>
            <div class="help" style="text-align: right">
                <a href="tel:70278496433">Need Help? <i class="fa fa-phone"></i></a>
            </div>
        </div>
    </div>
    <div id="donation-step-container">
        <div class="step-content">
            <div class="step-heading-container" >
                <div class="pickup-heading">
                    <h3>Your Account Details</h3>
                </div>
                <div class="col-md-4 offset-md-4  form right-column" >
                    <div class="pickup-form">
                        <form action="userdetails.php" method="POST" autocomplete="">
                            <div class="form-group">
                                Name:<input class="form-control" disabled="disabled" value="<?php echo $fetch_info['name'] ?>">
                            </div>
                            <div class="form-group">
                                Email-ID:<input class="form-control" disabled="disabled" value="<?php echo $fetch_info['email'] ?>">
                            </div>
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
                                Mobile_Number: <br>
                                <input class="form-control" disabled="disabled" value="<?php echo $fetch_info['Mobile_Number'] ?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>