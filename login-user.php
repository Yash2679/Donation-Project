<?php require_once "userData.php"; ?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <script>
        $(document).ready(function() {
            $('input').on('focusin', function() {
                $(this).parent().find('label').addClass('active');
            });

            $('input').on('focusout', function() {
                if (!this.value) {
                    $(this).parent().find('label').removeClass('active');
                }
            });
        });
    </script>
    <?php
    include 'header.php'
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="login-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <?php
                    if (count($errors) > 0) {
                    ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach ($errors as $showerror) {
                                echo $showerror;
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <div>
                            <label for="email">E-mail</label>
                            <input  id="email" class="form-control" type="email" name="email" required value="<?php echo $email ?>">
                        </div>
                    <div>
                        <label for="pass">Password</label>
                        <input id="pass" class="form-control" type="password" name="password"  required>
                    </div>
                        <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                        <div class="form-group">
                            <input class="form-control button" type="submit" name="login" value="Login">
                        </div>
                        <div class="link login-link text-center">Not yet a member? <a href="signup-user.php">Signup now</a></div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>