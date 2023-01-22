
<?php
session_start();
session_unset();
session_destroy();
 header('location: login-user.php');
 
// $t=time();
// if(isset($_SESSION["email"])){

//     if (isset($_SESSION['logged']) && ($t - $_SESSION['logged'] > 60)) {
//         session_destroy();
//         session_unset();
        
//     }
// }else {
//         header('location: login-user.php');
//         // $_SESSION['logged'] = time();
// }            
?>