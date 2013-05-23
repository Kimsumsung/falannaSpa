<?php 
include_once 'backend/src/php/manage_news.php';

$news = new NewsManagement();

$newslist = $news->getLastestNews();
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fah Lanna Spa</title>

    <link href="src/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="src/css/default.css" rel="stylesheet">
    <link href="src/css/index.css" rel="stylesheet">

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
    <div id="wrap">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="row">
                        <div class="span3">
                            <img src="src/img/logo2.png" />
                        </div>
                    </div>

                    <?php
                    if($newslist!=null)
                    {
                        echo "<div id=\"newsbox\" class=\"row\">";
                        echo "<div class=\"span2 well well-small\">";
                        echo "<legend>News</legend>";

                        $i = 0;
                        while($array = mysql_fetch_array($newslist))
                        {
                            echo "<p>";
                            echo "<strong>". $array['topic'] ."</strong> ";
                            echo "<small>". $array['description'] ."</small>";
                            echo "</p>";

                            $i++;
                            if($i==4)
                                break;
                        }

                        echo "</div>";
                        echo "</div>";
                    }
                    ?>

                    <div class="row hidden-desktop hidden-tablet">
                        <ul class="nav nav-tabs nav-stacked">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="menuspa.php">The Spa-Old City</a></li>
                            <li><a href="product.php">Products</a></li>
                            <li><a href="galleryMassage.php">Photo Gallery</a></li>
                            <li><a href="testimonial.php">Testimonials</a></li>
                            <li><a href="bookingMassage.php">Booking</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <div class="span2 offset7 hidden-phone">
                    <img src="src/img/rightlogo.png" />
                </div>
            </div>
        </div>
    </div>

    <div id="footer">
      <div class="container">
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
</div>

<script type="text/javascript">
$(document).ready(function(){
    $.backstretch([
        "src/images/bg1.jpg"
        , "src/images/bg2.jpg"
        , "src/images/bg3.jpg"
        , "src/images/bg4.jpg"
        , "src/images/bg5.jpg"
        , "src/images/bg6.jpg"
        ], {duration: 3000, fade: 2000});
});
</script>
</body>
</html>