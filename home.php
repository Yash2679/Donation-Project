<?php require_once "userData.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if ($run_Sql) {
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if ($status == "verified") {
            if ($code != 0) {
                header('Location: reset-code.php');
            }
        } else {
            header('Location: user-otp.php');
        }
    }
} else {
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="home.css">
    <title>PICK YOUR ITEMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="itemsstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <!-- <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button> -->
    <!-- <h1>Welcome <?php echo $fetch_info['name'] ?></h1> -->
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
    <!-- <div class="welcome">
        <h1>Welcome <?php echo $fetch_info['name'] ?></h1>
    </div> -->
    <!-- <div id="donation-step-container">
        <div class="step-content">
            <div class="step-heading-container" style="margin-bottom: 50px;">
                <div class="pickup-heading">
                    <h3>SCHEDULE A PICKUP</h3>
                    <p>Please select a convenient slot as per your availability</p>
                </div> -->
    <!-- <div class="details">
                <h5>USER DETAILS</h5>
            </div> -->
    <!-- <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4 form login-form">
                        <form action="login-user.php" method="POST" autocomplete="">
                            <div class="form-group">
                                Name:<input class="form-control" disabled="disabled" value="<?php echo $fetch_info['name'] ?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->
    <!-- </div>
        </div> -->
    <!-- <div class="">

        <div class="inside">
            <ul class="list">
                <span class="green"><b>1. SIGN UP/SIGN IN PAGE </b></span>
                <span class="green"><b>2. DONOR DETAILS</b></span>
                <span class="bold"><b>3. DONATION ITEMS</b></span>
                <span class="grey"><b>4. CHOOSE SERVICE</b></span>
                <span class="grey">5. PLACE ORDER</span>
            </ul>
        </div>
    </div> -->
    <?php
    $sql = "select * from add_items order by items asc";
    $res = mysqli_query($con, $sql);

    ?>
    <div class="select-items">
        <div class="welcome">
            <h1>Welcome <?php echo $fetch_info['name'] ?></h1>
        </div>
        <div class="tableitems">
            <h1 style="color:orange;">PICK YOUR DONATION ITEMS</h1>
            <form method="post">
                <!-- <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($res)) { ?>
                    <div class="box">
                        <div class="name"><b><?php echo $row['items'] ?> &nbsp;</b></div>

                        <div class="dec button">-</div>
                        <input type="text" name="qty<?php echo $i ?>" id="<?php $i ?>" value="0" class="input-filed">
                        <div class="inc button">+</div>
                    </div>
                   
                <?php  $i=$i+1; } ?> -->
                  <div class="box">
                    <label for="name"><b>CLOTHES&nbsp; </b></label>
                    <!-- <div class="dec button">-</div> -->
                    <input type="number" name="qty1"  value="0" id="2" min="0" placeholder="0" class="input-filed">
                    <!-- <div class="inc button">+</div> -->
                </div>
                 <div class="box">
                    <label for="name"><b>STATIONARY&nbsp; </b></label>
                    <input type="number" name="qty2"  value="0" id="2" min="0" placeholder="0" class="input-filed">

                </div>
                <div class="box">
                    <label for="name"><b>FOOTWEARS</b>&nbsp;</label>
                    <input type="number" name="qty32" value="0" id="2" min="0" placeholder="0" class="input-filed">

                </div>
                <!-- <div class="box">
                    <label for="name"><b>SANITARY ITEMS</b></label>
                    <div class="dec button">-</div>
                    <input type="text" name="qty4" id="4" value="0" class="input-filed">
                    <div class="inc button">+</div>
                </div>
                <div class="box">
                    <label for="name"><b>RAW FOOD ITEMS</b></label>
                    <div class="dec button">-</div>
                    <input type="text" name="qty5" id="5" value="0" class="input-filed">
                    <div class="inc button">+</div>
                </div>  -->
                <div class="box">
                    <b>Any other item you want to donate please mention here</b>
                </div>
                <div class="box">
                    <textarea value="Info" rows="6" cols="35" style="font-size:25px;" name="comments" class="text"></textarea>
                </div>
                <div class="next">
                    <!-- <input type="submit" value="Next" name="submit" class="button1" link="page2.php" /> -->
                    <input class="btn btn-info" name="next" id="next" type=submit value="Next" role="button"></input>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var incrementButton = document.getElementsByClassName('inc');
        var decrementButton = document.getElementsByClassName('dec');
        //console.log(incrementButton);
        //console.log(decrementButton);
        //increment value
        for (var i = 0; i < incrementButton.length; i++) {
            var button = incrementButton[i];
            button.addEventListener('click', function(event) {

                var buttonClicked = event.target;
                //console.log(buttonClicked);
                var input = buttonClicked.parentElement.children[2];
                //console.log(input);
                var inputValue = input.value;
                //console.log(inputValue);
                var newValue = parseInt(inputValue) + 1;
                input.value = newValue;

            })
        }
        //decrement
        for (var i = 0; i < decrementButton.length; i++) {
            var button = decrementButton[i];
            button.addEventListener('click', function(event) {

                var buttonClicked = event.target;
                //console.log(buttonClicked);
                var input = buttonClicked.parentElement.children[2];
                //console.log(input);
                var inputValue = input.value;
                console.log(inputValue);
                var newValue = parseInt(inputValue) - 1;
                input.value = newValue;
                if (newValue >= 0) {
                    input.value = newValue;
                } else {
                    input.value = 0;
                }

            })
        }
        $(document).ready(function() {
            $('#next').click(function() {
                if ($('#myMessage').val() == '') {
                    alert('Input can not be left blank');
                }
            });
        })
    </script>

    <?php
    if (isset($_SESSION["email"])) {
        if ((time() - $_SESSION['last_login_timestamp']) > 1800) // 900 = 15 * 60  
        {
            echo '<script>alert("Time-out")</script>';
            header("location:logout-user.php");
        } else {
            $_SESSION['last_login_timestamp'] = time();
            // echo "<h1 align='center'>".$_SESSION["name"]."</h1>";  
            // echo '<h1 align="center">.$_SESSION['last_login_timestamp'].'</h1>';  
            // echo "<p align='center'><a href='logout-user.php'>Logout</a></p>";  
        }
    } else {
        header('location:login.php');
    }
    ?>
</body>

</html>