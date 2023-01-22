
<html>

<head>
<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>

    <style>
        .contact {
            padding: 20px;
        }


        .row {
            margin-right: -15px;
            margin-left: -15px;
        }


        footer {
            background-color: #222;
            padding-top: 60px;
            border-top: 4px solid #555;
            color: #ccc;
        }

        .footer-widget {
            padding-left: 100px;
            margin-bottom: 45px;
        }

        .footer-widget h4 {
            color: #eee;
            text-transform: uppercase;
            padding-bottom: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 700;
            position: relative;
        }

        .footer-widget h4 .head-line {
            position: absolute;
            bottom: 0;
            left: 0;
            display: block;
            width: 50px;
            height: 3px;
            background-color: #333;
            margin: 0;
        }

        .social-widget ul.social-icons li {
            display: inline-block;
            margin-right: 4px;
            margin-bottom: 4px;
        }

        footer a {
            color: white;
        }

        .social-widget ul.social-icons li a i {
            font-size: 25px;
            width: 36px;
            height: 36px;
            color: #fff;
            line-height: 36px;
            text-align: center;
            display: block;
        }

        .col-md-5 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        ul.icons-list li i {
            color: orange;
        }

        .form-group {
            margin-bottom: 15px;
            width: 304px;
        }

        .form-control {
            padding: auto;
            border-color: rgb(230, 16, 16);
            margin: 10px 0;
            height: 40px;
            font-size: 15px;
        }

        .flickr-widget {
            padding-right: 170px;
        }
    </style>

</head>

<body>
    <section id="contact">
        <footer>
            <div id="container">
                <div class="row footer-widgets">
                    <!-- Start Subscribe & Social Links Widget -->
                    <div class="col-md-3 col-xs-12">
                        <div class="footer-widget mail-subscribe-widget">
                            <h4>Be a part of our exciting journey<span class="head-line"></span></h4>
                            <h5 style="color:#ddd">Subscribe to our latest news and updates.</h5>
                            <form class="subscribe" method="post" action="http://clothesboxfoundation.org/php/send.php">
                                <input type="text" name="email" placeholder="mail@example.com" required="required">
                                <button type="submit" id="submit" class="con btn-system btn-large" name="submit" style="padding: 4px 13px;background-color:green;">Send</button>
                            </form>
                        </div>
                        <div class="footer-widget social-widget">
                            <h4>Follow Us<span class="head-line"></span></h4>
                            <ul class="social-icons">
                                <li>
                                    <a class="facebook" href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="twitter" href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
                                </li>

                                <li>
                                    <a class="instgram" href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a class="git" href=" " target="_blank"><i class="fa fa-github"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 col-xs-12">
                        <div class="footer-widget mail-subscribe-widget">
                            <h4>Reach Us<span class="head-line"></span></h4>
                            <!-- Info - Icons List -->
                            <ul class="icons-list">
                                <li><i class="fa fa-envelope-o"></i> <strong>For any queries: </strong><span style="color:white;">info@clothesdonation.org</span> </li>
                                <li><i class="fa fa-whatsapp" style="font-size:23px"></i> : <span style="color:white;">+91 9846585467</span> <br> </li>
                            </ul>
                            <!-- Divider -->
                            <div class="hr1" style="margin-bottom:15px;"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="footer-widget flickr-widget" style="float: right;">
                            <h4>Contact Us<span class="head-line"></span></h4>
                            <form role="form" class="contact-form" id="contact-form" method="post" action="form-to-email.php">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="name" id="username" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email" id="email" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="subject" id="subject" placeholder="Subject" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="Message" name="message" required="required"></textarea>
                                </div>
                                <button type="submit" id="submit" class="con btn-system btn-large" name="submit" style="padding: 6px 16px;background-color:green;">Send</button>
                            </form>
                            <!-- <script language="JavaScript">
                                // Code for validating the form
                                // Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
                                // for details
                                var frmvalidator = new Validator("myemailform");
                                frmvalidator.addValidation("name", "req", "Please provide your name");
                                frmvalidator.addValidation("email", "req", "Please provide your email");
                                frmvalidator.addValidation("email", "email", "Please enter a valid email address");
                            </script> -->
                            <!-- End Contact Form -->
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>
</body>

</html>