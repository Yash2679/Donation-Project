<?php require_once "userData.php"; ?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Mainstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="navbar">
        <a class="logo" href="#"> SMILE VISION</a>
        <ul class="nav">
            <div class="d_d">
                <button class="drop_btn">GET INVOLVED
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="d_d-content">
                    <a href="#">VOLUNTEER</a>
                    <a href="#">NGO-PARTENER</a>
                    <a href="#">BRAND PARTNERS</a>
                </div>
            </div>
            <div class="d_d">
                <button class="drop_btn">ABOUT US
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="d_d-content">
                    <a href="#">SHARE POINTS</a>
                    <a href="#">OUR HISTORY</a>
                    <a href="#">HOW WE WORK</a>
                    <a href="#">WHAT WE OFFER</a>
                </div>
            </div>
            <li class="abc"><a href="#">Contact</a></li>
        </ul>
    </div>
    <!-- <section class="banner-area" id="home">
    </section> -->

    <div class="centreimage">
        <img src="img.jpg">
        <div class="centre">
            <h1 class="happy">Spread Love Everywhere</h1>
            <h3>Think of Giving not as a duty but as a Privilege</h3>
            <a href="login-user.php" id="modal_btn">Register Here<span style="margin-left: 8px;"></span></span></a>
        </div>
    </div>
    <section id="page-section">
        <div id="how-we-work " class="segment " style="padding: 30px 0px; ">
            <div class="segment-content ">
                <p class="how-we-work " style="text-align: center; ">HOW WE WORK</p>
                <div class="fourcol ">
                    <p><img loading="lazy " src="https://sadsindia.org/wp-content/uploads/2018/07/icon1-300x250.png " width="300" height="250 " ></p>
                    <h4 style="text-align: center; ">Schedule a Pickup</h4>
                    <p>Enter the pickup location, and schedule a pickup.</p>
                </div>
                <div class="fourcol ">
                    <p><img loading="lazy "   src="https://sadsindia.org/wp-content/uploads/2018/07/iconvannew-1-300x200.png " alt=" " width="300 " height="200 "></p>
                    <h4 style="text-align: center; ">Donate at your Doorstep</h4>
                    <p style="padding: 0px; ">We will come to your doorstep to pick up the donations in the chosen slot and deliver them to the NGO where they can be given a new life.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- <article class="pagesection2">
        <div id="donate-anything" class="segment2 " style="padding: 30px 0px; ">
            <div class="segment-content ">
                <p class="anything" style="text-align: center;">DONATE ALMOST ANYTHING</p>
                <div class="sads-donate row-1">
                    <div class="col-xs-4 donation-type-block">
                        <img loading="lazy" src="https://sadsindia.org/wp-content/themes/fusion/images/donate-item-icon/SADS-Icons-04-180x180.png" alt="" width="180" height="180">
                        <p></p>
                        <h6 style="text-align: center;">Shoes</h6>
                    </div>
                </div>
            </div>
        </div>
    </article> -->


</body>
<?php
include "footer.php";
?>

</html>