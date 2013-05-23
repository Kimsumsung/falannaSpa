<?php 
include_once 'backend/src/php/manage_massage.php';

$massage = new MassageManagement();

$massagelist = $massage->getLastestNews();
?>

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
                <img src="src/images/h_massagemenu.jpg" class="span11" />
                <section>
                    <div class="feature span11">
                        <h3>Massage Shop - Night bazaar</h3>
                        <p class="lead">
                            Opening times:  10 am - 11 pm  Last appointment 10 pm<br>
                            To make a booking inquiry, <U><a href="bookingMassage.php" target="_blank">Booking here</a></U>
                        </p>

                        <?php
                            if($massagelist!=null)
                            {
                                echo "<p class=\"lead\">Promotion</p>";
                                while($array = mysql_fetch_array($massagelist))
                                {
                                    echo "<strong>". $array['topic'] ." : </strong>";
                                    echo " ". $array['description'] ."<br /><br />";
                                }
                            }
                        ?>
                      
                        <p class="lead">Massage menu</p>
                        <strong>Traditional Thai Massage:</strong><br>
                        Traditional Thai method, globally respected for its effectiveness to ease muscle and joint tension. 200 Baht / hour<br><br>

                        <strong>Thai Balm Massage:</strong><br> 
                        Thai massage with the heating or cooling balm provides long lasting relief to our aching and overstressed muscles. 300 Baht / hour<br><br>

                        <strong>Essential Oil Thai Massage:</strong><br>
                        Enjoy the traditional Thai massage with Thai essential oils providing healing and relaxation. 350 Baht / hour<br><br>

                        <strong>Reflexology Foot Massage:</strong><br>
                        For tired feet after a long day's walk to reduce stress and improve circulation. 200 Baht / hour<br><br>

                        <strong>Head, Back and Shoulder Massage:</strong><br>
                        The quickest way of relieving both stress and inner-body tension is to have a head, back and shoulder massage. 300 Baht / hour<br><br>

                        <strong>Hot Oil Massage:</strong><br>
                        A soothing massage that energizes and relaxes the nerves, muscles and the senses at the same time. 500 Baht / hour<br><br>

                        <strong>Cream Massage:</strong><br>
                        Enjoy a relaxing massage with moisturizing body cream. 500 Baht / hour<br><br>

                        <strong>Aloe Vera Massage</strong><br>
                        This Aloe Vera wrap hydrates the skin after a day of sunbathing. We especially recommend it for sunburns. 500 Baht / hour<br><br>

                        <strong>Thai Herbal Massage</strong><br>
                        Traiditional Thai massage with Lok Pra Kob, a steamed herbal pouch pressed over the body. 500 Baht / hour<br><br>
                        
                        <strong>Aromatherapy</strong><br>
                        Freshens up your skin by deep cleansing and Lymphatic drainage massage with Thai essential oils. 500 Baht / hour<br><br>
                        
                        <strong>Body Scrub</strong><br>
                        This scrub removes dead skin cells and replenishes your skin leaving it soft and smooth. 500 Baht / hour<br><br>

                        <strong>Body Mask</strong><br>
                        A mask infused with herb- and plant extracts applied to your body to detoxify the skin, leaving it feel fresher, softer and smoother. 500 Baht / hour<br><br>
                        
                        <strong>Facial Treatment</strong><br>
                        This massage cleans and revitalizes your skin leaving it fresh and glowing. 350 Baht / hour<br><br>
                        
                        <strong>Foot Scrub</strong><br>
                        This scrub will remove dead and hard skin leaving your feet soft and smooth. 350 Baht<br><br>
                        
                        <strong>Waxing</strong><br>
                        Full leg wax, under-arm wax, back wax, arm wax, bikini wax etc. 200 – 1,000 Baht<br><br> 


                        <p class="lead"> Packages</p>
                        
                        
                        <strong>Siam Massage</strong><br>
                        Traditional Thai Massage followed by Reflexology Foot massage 400 Baht / 2 hours<br><br>
                        
                        <strong>Siam Herbal</strong><br>
                        Traditional Thai Massage followed by Thai Herbal Massage 650 Baht / 2 hours<br><br>

                        <strong>Fah Lanna Relaxation</strong><br>
                        Reflexology Foot Massage followed by Aroma Oil Massage 650 Baht / 2hours<br><br>
                        
                        <strong>Fah Lanna Sunshine</strong><br>
                        After Sun Aloe Vera Gel Massage followed by Thai Essential Oil Massage 750 Baht / 2hours<br><br>
                        
                        <strong>Relaxing Foot treatment</strong><br>
                        A Foot Scrub followed by a Reflexology Foot massage. 550 Baht / 2 hours<br><br>
                        
                        <strong>Fah Lanna Oriental</strong><br>
                        Body Scrub, Aroma Therapy, Facial Massage 1,200 Baht / 2hours 30 mins<br><br>
                        
                        <strong>Fah Lanna Body Treatments</strong><br>
                        Body Scrub & Aroma Oil Massage 900 Baht / 2hours<br><br>
                        
                        <strong>Fah Lanna Paradise</strong><br>
                        Foot massage, Thai Massage, Body Scrub, Aromatherapy and Facial treatment 1,700 Baht / 3-4 hours<br><br>
                        
                        <strong>Fah Lanna Miracle</strong><br>
                        Body Scrub, Hot Oil Massage, Body Mask, Cream Massage and Facial Treatment 2,100 Baht / 3-4 hours<br><br>
                        
                        <strong>Fah Lanna Royal</strong><br>
                        Body Scrub, Body Mask, Aromatherapy or Cream Massage 1,400 Baht / 2 hours<br><br>

                        Download file: <U><a href="menu.pdf" target="_blank">Download the pdf </a></U>of our spa menu: link to file
                        
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

    localStorage.clear();
    </script>
</body>
</html>