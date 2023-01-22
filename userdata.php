<script src="Validations.js"></script>
<?php
error_reporting(0);     
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();
//When User Clicks Signup Button
if (isset($_POST['signup'])) {
    $adhaar = mysqli_real_escape_string($con, $_POST['adhaar']); //used to escapte the string
    $name = mysqli_real_escape_string($con, $_POST['name']); //used to escapte the string
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $address = mysqli_real_escape_string($con, $_POST['Address']);
    // $snumber = mysqli_real_escape_string($con, $_POST['snumber']);
    $city =  $_POST['city'];
    $pincode = mysqli_real_escape_string($con, $_POST['pincode']);
    $phoneNo = $_POST['phone'];
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']); //$con  Specifies the MySQL connection to use
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check); //counts the number if there is a row with same email
    if (mysqli_num_rows($res) > 0) {
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if (count($errors) === 0) {
        $encpass = password_hash($password, PASSWORD_BCRYPT); //to covert password in hash form
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO usertable (adhaar,name, email,email_type, address, city, pincode, Mobile_Number,  password, code, status)
        values('$adhaar','$name', '$email',user,'$address', '$city','$pincode' , '$phoneNo', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);

        if ($data_check) {
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: vyash9831@gmail.com";
            if (mail($email, $subject, $message, $sender)) {
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            } else {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }
}

//When user Click Verification code Submit button
if (isset($_POST['check'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res); //fetches result in array(row)
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($con, $update_otp);
        if ($update_res) {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header('location: home.php');
            exit();
        } else {
            $errors['otp-error'] = "Failed while updating code!";
        }
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//If User click Login Button
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $check_email = "SELECT * From usertable WHERE email='$email'";
    $result = mysqli_query($con, $check_email); //returns the number of rows
    if (mysqli_num_rows($result) > 0) {
        $fetch = mysqli_fetch_assoc($result);
        $fetch_pass = $fetch['password'];
        // $fetch_type=$fetch['email_type'];
        if (password_verify($password, $fetch_pass)) {
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            if ($status == 'verified') {
                if ($fetch['email_type'] == 'admin') {
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['last_login_timestamp'] = time();
                    header('location:user.php');
                } else {
                    if ($fetch['email_type'] == 'user') {
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['last_login_timestamp'] = time();
                    header('location:home.php');
                    }
                }
            } else {
                $info = "Your email - $email is not verified yet";
                $_SESSION['info'] = $info;
                header('location:user-otp.php');
            }
        } else {
            $errors['email'] = "Incorrect email or password!";
        }
    } 
    else {
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
}
//if user click  button in forgot password form
if (isset($_POST['check-email'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM usertable WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if (mysqli_num_rows($run_sql) > 0) {
        $code = rand(999999, 111111);
        $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if ($run_query) {
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "From: vyash9831@gmail.com";
            if (mail($email, $subject, $message, $sender)) {
                $info = "We've sent a passwrod reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: reset-code.php');
                exit();
            } else {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Something went wrong!";
        }
    } else {
        $errors['email'] = "This email address does not exist!";
    }
}
//if user click check reset otp button
if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: new-password.php');
        exit();
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//if user click change password button
if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    } else {
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if ($run_query) {
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: password-changed.php');
        } else {
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}
if (isset($_POST['login-now'])) {
    header('Location: login-user.php');
}
if (isset($_POST['next'])) {
    $email = $_SESSION['email'];
    $clothes = $_POST['qty1'];
    $stationary = $_POST['qty2'];
    $footwear = $_POST['qty32'];
    $comment = $_POST['comments'];
    if ($clothes == 0 && $stationary == 0 && $footwear == 0) {
        echo '<script type="text/javascript">';
        echo " alert('Please Add an item to Continue!')";  //not showing an alert box.
        echo '</script>';
    } else {
        setcookie("clothes", "$clothes", time() + 3600, "/", "", 0);
        setcookie("stationary", "$stationary", time() + 3600, "/", "", 0);
        setcookie("footwear", "$footwear", time() + 3600, "/", "", 0);
        setcookie("comment", "$comment", time() + 3600, "/", "", 0);
        header('Location:page_2.php');
    }
}
if(isset($_POST['submit1'])){
    echo '<script type="text/javascript">';
    echo ' alert("JavaScript Alert Box by PHP")';  //not showing an alert box.
    echo '</script>';
    $cloth=$_COOKIE['clothes'];
    $station=$_COOKIE['stationary'];
    $foot=$_COOKIE['footwear'];
    $comment=$_COOKIE['comment'];
    $email = $_SESSION['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $note = $_POST['AnySuggestions'];
    $particular = $_POST['part_ngo'];
//     $insert_data = "INSERT INTO place_order ( user_email, clothes, stationary, shoes, other, date , time , notes, particular_ngo)
//   values('$email','$clothes','$stationary', '$footwear','$comment' , '$date', '$time', '$note', '$particular')";
   $insert_data = "INSERT INTO place_order ( user_email,clothes,stationary,shoes,other,date,time,notes,particular_ngo,status)
   values( '$email','$cloth','$station','$foot','$comment','$date','$time','$note','$particular',1)";
    $data_check = mysqli_query($con, $insert_data);
if($data_check){
    header('Location:success.php');

}
//    echo '<script type="text/javascript">';
//    echo " alert('$email')";  //not showing an alert box.
//    echo '</script>';
// header('Location:success.php');


}
    // header('Location: page_2.php');
    // if (isset($_POST['submit1'])) {
    //     $date = $_POST['date12'];
    //     $time = $_POST['appt'];
    //     $note = $_POST['AnySuggestions'];
    //     $particular = $_POST['part_ngo'];
    //     $insert_data = "INSERT INTO place_order ( user_email, clothes, stationary, shoes, other, date , time , notes, particular_ngo)
    // values('$email','$clothes','$stationary', '$footwear','$comment' , '$date', '$time', '$note', '$particular')";
    //     $data_check = mysqli_query($con, $insert_data);
    //     if ($data_check) {
    //         header('Location:success.php');
    //         exit();
    //     } 
    //       }
    //     else {
    //         header('Location:fail.php');
    //     }
    // $stmt = $conn->prepare("insert into place_order(clothes,stationary,footwear,sanitary,raw_food_items,additional_item) values(?,?,?,?,?,?)");
    // $stmt->bind_param('iiiiis', $clothes, $stationary, $footwear, $sanitary, $raw, $comment);
    // $stmt->execute();
    // // echo'submit successfully';
    // $stmt->close();
    // $conn->close();
