<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fah Lanna Spa</title>

    <link href="src/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="src/css/default.css" rel="stylesheet">

    <script src="src/js/jquery-1.9.0.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/jquery.backstretch.min.js"></script>
    <style type="text/css">
       #copyright{
            color: #f4be50;
        }
        #view{
            color: #f4be50;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="span2">
                <a href="index.php"><img src="src/img/logo2.png" /></a>
            </div>

            <div class="span8">
                <ul class="nav nav-pills">
                    <li><a href="home.php?">Home</a></li>
                    <li><a href="about.php?">About</a></li>
                    <li><a href="spa.php?">Spa Menu</a></li>
                    <li><a href="massage.php?">Massage Menu</a></li> 
                    <li><a href="product.php?">Products</a></li>
                    <li><a href="galleryMassage.php?"> Gallery</a></li>
                    <li><a href="testimonial.php?">Testimonials</a></li>
                    <li><a href="bookingMassage.php?">Booking</a></li>
                    <li><a href="contact.php?">Contact Us</a></li>
                </ul>
            </div>

            <div class="span2 hidden-phone">
                <img src="src/img/rightlogo.png" width="500" />
            </div>
        </div>

        <div class="row well well-small">
            <div class="span12">
                <!-- content -->
                <img src="src/images/h_product.png" class="span11" />
                <section>
                    <div class="feature span11">
                        <p class="lead">
                            We use natural products as much as possible and select our suppliers very carefully. We put great emphasis on using local products that contain Thai herbs and flowers and the use of 100% essential oils.<br><br> 

                            Please visit our souvenir corner at the spa if you would like to take any of our products for some pampering at home or as a present for your friends and family. Our range of products include some of our best loved Lanna style features, such as the Thai massage pants, the Lanna style pillow covers that we get made especially or some local pottery that is created in the North of Thailand, mainly Chiang Mai and Lampang. <br><br> 

                            We also have a wide variety of body products, such as massage oils, shampoo, conditioner, body lotion, exfoliating body scrub etc. <br><br> 
                        </p>
                    </div>
                </section>
                <!-- content -->
            </div>
        </div>


        <!-- footer -->
        <div class="row hidden-phone">
            <div class="span10">
                <br />
                <div id="menu">
                    <a href="home.php">Home</a>
                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href="about.php">About</a>
                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href="spa.php">Spa Menu</a>
                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href="massage.php">Massage Menu</a>
                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;                    
                    <a href="product.php">Products</a>
                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href="galleryMassage.php">Photo Gallery</a>
                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href="testimonial.php">Testimonials</a>
                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href="bookingMassage.php">Booking</a>
                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href="contact.php">Contact Us</a>
                </div>
            </div>

            <div class="span2">
                <img src="src/img/tripadvisor.png" width="500" />
            </div>
        </div>

        <div class="row hidden-phone">
            <div class="span12">
                <div class="pull-left" id="view">
                    <a href="https://www.facebook.com/pages/Fah-Lanna-Spa/265551626813646" target="_balnk"><img src="src/img/icon1.png" /></a>
                    <a href="http://www.tripadvisor.com/Attraction_Review-g293917-d1604987-Reviews-Fah_Lanna_Spa-Chiang_Mai.html" target="_balnk"><img src="src/img/icon2.png" /></a>
                    <a href="#" target="_balnk"><img src="src/img/icon3.png" /></a>
                    16/1/2555 View:1504
                </div>

                <div class="pull-right" id="copyright">
                   Copyright 2013 © Fah Lanna Spa By CM Weddesign
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
        $.backstretch("src/images/bg1.jpg");
    });
    </script>
</body>
</html>