<?php require_once "userData.php"; ?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="Validations.js"></script>


</head>

<body>
    <?php
    include 'header.php'
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="signup-user.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Signup Form</h2>
                    <p class="text-center">It's quick and easy.</p>
                    <?php
                    if (count($errors) == 1) {
                    ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach ($errors as $showerror) {
                                echo $showerror;
                            }
                            ?>
                        </div>
                    <?php
                    } elseif (count($errors) > 1) {
                    ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach ($errors as $showerror) {
                            ?>
                                <li><?php echo $showerror; ?></li>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                     <div class="form-group">
                        <input class="form-control" class="text" maxlength="14" type="text" name="adhaar" id="adhaar" placeholder="Adhaar Number" required value="<?php echo $adhaar ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" id="username" placeholder="Full Name"  readonly required >
                        <!-- <h5 id="usercheck"></h5> -->
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" id="email" required value="<?php echo $email ?>">
                        <h5 id="emailcheck"></h5>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="Address" id="Address" placeholder="Address" required readonly> 
                        <!-- <h5 id="flat_check"></h5> -->
                        <!-- <input class="form-control" style="display: inline-block;width:245px" type="text" name="snumber" id="snumber" placeholder="Street" required>
                        <h5 class="street_check"></h5> -->
                    </div>
                    <div class="form-group">
                        <input class="form-control" style="display: inline-block; width:210px;" type="text" name="city" id="city" readonly="readonly" placeholder="City" required>
                        <input class="form-control" style="display: inline-block;width:155px" type="text" name="pincode" id="pincode" placeholder="Pincode" required>
                        <h5 id="pincheck"></h5>
                    </div>
                    <div class="form-group">
                        <input class="form-control"   type="text" name="phone" id="phone"  placeholder="Mobile Number" required readonly>
                        <!-- <h5 id="phonecheck"></h5> -->
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                        <h5 id="passcheck"></h5>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" id="cpassword" placeholder="Confirm password" required>
                        <h5 id="cpasscheck"></h5>
                    </div>

                    <input class="form-control button" type="submit" name="signup" id="submitbtn" value="Signup">
                    
                    <div class="link login-link text-center">Already a member? <a href="login-user.php">Login here</a></div>
            </div>
            </form>
        </div>
    </div>



</body>
<script>
$(document).ready(function(){
    $("#adhaar").focusout(function() {
    let data=fetch('http://127.0.0.1:3000/adhaar_details').then((res)=>res.json())
    .then((data)=>{
    let toCheck= document.getElementById('adhaar').value;
     let index= data.data.findIndex((val)=>val.Adhaar_No==toCheck)
    // console.log(index);
    if(index=='-1'){
        alert("Invalid Adhaar Number")
        $('#adhaar').val('');
        $('#username').val('');
        $('#Address').val('');
        $('#phone').val('');
    }
    else{

        document.getElementById('username').value=data.data[index]["Name"];
        document.getElementById('Address').value=data.data[index]["Address"];
        document.getElementById('phone').value=data.data[index]["Phone_no"];
    }
    
    });
});
$('#adhaar').keyup(function() {
  var foo = $(this).val().split(" ").join(""); 
  if (foo.length > 0) {
    foo = foo.match(new RegExp('.{1,4}', 'g')).join(" ");
  }
  $(this).val(foo);
});
});
</script>
</html>