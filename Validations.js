$(document).ready(function() {
    $('#usercheck').hide();
    $('#passcheck').hide();
    $('#cpasscheck').hide();
    $('#flat_check').hide();

    var user_error = true;
    var pass_err = true;
    var conpass_err = true;
    var email_err = true;
    var city_err = true;
    // ======================Validation For Name======================
    $('#username').keyup(function() {
        if (username_check()) {
            $("#username").css("border", "2px solid green")
                // alert(user_error);
        } else {
            $("#username").css("border", "2px solid red")
        }
    });

    function username_check() {
        var user_val = $('#username').val();
        // alert(user_val);
        if (user_val.length == '') {
            $('#usercheck').show();
            $('#usercheck').html("**Please fill the username");
            $('#usercheck').focus();
            $('#usercheck').css("color", "red");
            user_error = false;
            return false;
        } else {
            $('#usercheck').hide();
        }
        var correct_way = /^[A-Z a-z]+$/;
        if (user_val.match(correct_way)) {
            return true;
        } else {
            $('#usercheck').show();
            $('#usercheck').html("**Name can only contain Alphabets");
            $('#usercheck').focus();
            $('#usercheck').css("color", "red");
            user_error = false;
            return false;
        }

    }

    // ======================Validation For Name Ending ======================


    // ======================Validation For Password======================

    $('#password').keyup(function() {
        if (password_check()) {
            pass_err = true;
            $("#password").css("border", "2px solid green")
                // alert(pass_error);

        } else {
            pass_err = false;
            $("#password").css("border", "2px solid red")
                // alert(pass_error);

        }
    });

    function password_check() {
        var passwordstr = $('#password').val();
        if (passwordstr.length == '') {
            $('#passcheck').show();
            $('#passcheck').html("**Password Cannot be empty");
            $('#passcheck').focus();
            $('#passcheck').css("color", "red");
            pass_err = false;
            return false;
        } else {
            $('#passcheck').hide();
        }
        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
        if ($('#password').val().length < 6) {
            $('#passcheck').show();
            $('#passcheck').html("Weak (should be atleast 6 characters.)");
            $('#passcheck').removeClass();
            $('#passcheck').addClass('weak-password');
            $('#passcheck').focus();
            $('#passcheck').css("color", "red");
            pass_err = false;
            return false;

        } else {
            if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
                $('#passcheck').show();
                $('#passcheck').removeClass();
                $('#passcheck').addClass('strong-password');
                $('#passcheck').html("Strong");
                $('#passcheck').focus();
                $('#passcheck').css("color", "green");
                pass_err = true;
                return true;
            } else {
                $('#passcheck').show();
                $('#passcheck').removeClass();
                $('#passcheck').addClass('medium-password');
                $('#passcheck').html("Medium (should include alphabets, numbers and special characters.)");
                $('#passcheck').focus();
                $('#passcheck').css("color", "red");
                pass_err = false;
                return false;

            }
        }
    }
    // ======================Validation For Password End======================



    // ======================Validation For Confirm Password======================

    $('#cpassword').keyup(function() {
        if (con_password()) {
            $("#cpassword").css("border", "2px solid green")
                // alert(conpass_err)
        } else {
            $("#cpassword").css("border", "2px solid red")
        }
    });

    function con_password() {
        var conpass = $('#cpassword').val();
        var passwordstring = $('#password').val();
        if (passwordstring != conpass) {
            $('#cpasscheck').show();
            $('#cpasscheck').html("**Password are not Matching");
            $('#cpasscheck').focus();
            $('#cpasscheck').css("color", "red");
            conpass_err = false;
            return false;
        } else {
            $('#cpasscheck').hide();
            conpass_err = true;
            return true;
        }
    }

    // ======================Validation For Confirm Password End======================


    // ======================Validation For E-mail======================

    $("#email").keyup(function() {
        if (validateEmail()) {
            $("#email").css("border", "2px solid green");
            //$('#emailcheck').html("**Validated");

            alert(email_err);
        } else {
            $("#email").css("border", "2px solid red");

        }
    });

    function validateEmail() {
        var email = $("#email").val();
        var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
        if (email.length == '') {
            $('#emailcheck').show();
            $('#emailcheck').html("**Email Cannot be empty");
            $('#emailcheck').focus();
            $('#emailcheck').css("color", "red");
            email_err = false;
        } else
        if (reg.test(email)) {
            $('#emailcheck').hide();
            email_err = true;
            return true;
        } else {
            $('#emailcheck').show();
            $('#emailcheck').focus();
            $('#emailcheck').css("color", "red");
            $('#emailcheck').html("**Please type valid E-mail");
            email_err = false;
            return false;
        }

    }
    $('#pincode').focusout(function() {
        if (get_state()) {
            $("#city").css("border", "2px solid green");
            // alert(city_err);
        } else {
            // $("#city").css("border", "2px solid red");

            // alert(city_err);

        }
    });

    function get_state() {
        $(document).ready(function() {
            var pin = jQuery('#pincode').val();
            // alert(pincode);
            if (pin.length == 6) {
                //alert(pincode);
                $.ajax({
                    url: "getpincode.php",
                    data: { pincode: pin, page: "Pin" },
                    type: "post",
                    dataType: "json",
                    success: function(data) {
                        if (data.success) {
                            $('#city').val(data.success);
                            // alert(data.success);
                            city_err = true;
                        } else {
                            alert(data.error);
                        }
                    }
                })
            } else {
                alert("Invalid Pin Code");
                $('#city').val('');
                $('#pincode').val('');
                city_err = false;
                return false;
            }

        });

    }

    $("#pincode").keyup(function() {
        if (validatepincode()) {
            $("#pincode").css("border", "2px solid green");
            //$('#emailcheck').html("**Validated");
            // alert(pin_error);
        } else {
            $("#pincode").css("border", "2px solid red");
            // alert(pin_error);

        }
    });

    function validatepincode() {
        var pin = $('#pincode').val();
        var onlydigits = /^[0-9]+$/;
        if (pin.match(onlydigits)) {
            $('#pincheck').hide();
            pin_error = true;
            return true;
        } else {
            $('#pincheck').show();
            $('#pincheck').html("**Only Digits are allowed");
            $('#pincheck').focus();
            $('#pincheck').css("color", "red");
            pin_error = false;
            return false;
        }
    }
    $("#fnumber").keyup(function() {
        if (validateflat()) {
            $("#fnumber").css("border", "2px solid green");
            //$('#emailcheck').html("**Validated");

        } else {
            $("#fnumber").css("border", "2px solid red");

        }
    });

    function validateflat() {
        var flat_val = $('#fnumber').val();
        // alert(user_val);
        if (flat_val.length == '') {
            // $('#flat_check').show();
            //$('#flat_check').html("**Please fill the flat ");
            // $('#flat_check').focus();
            // $('#flat_check').css("color", "red");
            //user_error = false;
            return false;
        } else {
            $('#flat_check').hide();
            return true;
        }
    }
    $("#snumber").keyup(function() {
        if (validatestreet()) {
            $("#snumber").css("border", "2px solid green");
            //$('#emailcheck').html("**Validated");

        } else {
            $("#snumber").css("border", "2px solid red");

        }
    });

    function validatestreet() {
        var street_val = $('#snumber').val();
        // alert(user_val);
        if (street_val.length == '') {
            // $('#flat_check').show();
            //$('#flat_check').html("**Please fill the flat ");
            // $('#flat_check').focus();
            // $('#flat_check').css("color", "red");
            //user_error = false;
            return false;
        } else {
            $('#street_check').hide();
            return true;
        }
    }

    $('#phone').keyup(function() {
        if (phone_check()) {
            $("#phone").css("border", "2px solid green");
            // alert(ph_error);
        } else {
            $("#phone").css("border", "2px solid red");
            // alert(ph_error);

        }
    });

    function phone_check() {
        var phone_val = $('#phone').val();
        // alert(phone_val.charAt(0));
        var correct_way = /[A-Za-z]+$/;
        // if (phone_val.length == '') {
        //     $('#phonecheck').show();
        //     $('#phonecheck').html("**Please Enter your phone number");
        //     $('#phonecheck').focus();
        //     $('#phonecheck').css("color", "red");
        //     ph_error = false;
        //     return false;
        // } 
        if (phone_val.match(correct_way)) {
            $('#phonecheck').show();
            $('#phonecheck').html("**Only Digits are allowed");
            $('#phonecheck').focus();
            $('#phonecheck').css("color", "red");
            // ph_error = false;
            return false;
        } else {
            if (phone_val.length < 10) {
                $('#phonecheck').show();
                $('#phonecheck').html("**less than 10");
                $('#phonecheck').focus();
                $('#phonecheck').css("color", "red");
                ph_error = false;
                return false;
            } else {

                $('#phonecheck').hide();
                ph_error = true;
                return true;
            }
        }
    }


    // ======================Validation For E-mail End======================

    $('#password').focusout(function() {
        // user_error = true;
        // pass_err = true;
        // conpass_err = true;
        // email_err = true

        // username_check();
        // validateEmail();
        // phone_check();

        // if ((user_error == true) && (email_err == true) && (ph_error == true)) {
        //     alert("Good!!")

        //     return false;
        // } else {
        alert("Something is Wrong!!")
            //     return false;
            // }

    });
});