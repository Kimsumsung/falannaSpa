<?php 
include_once 'backend/src/php/manage_gallery.php';

$gallery = new GalleryManagement();

$gallerylist = $gallery->getImageByCategory("2");
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fah Lanna Spa</title>

    <link href="src/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="src/css/bootstrap-lightbox.min.css" rel="stylesheet">
    <link href="src/css/default.css" rel="stylesheet">

    <script src="src/js/jquery-1.9.0.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/js/jquery.backstretch.min.js"></script>
    <script src="src/js/bootstrap-lightbox.min.js"></script>
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
                <ul class="nav nav-tabs">
                    <li> <a href="galleryMassage.php">Massage</a> </li>
                    <li class="active"><a href="gallerySpa.php">Spa</a></li>
                </ul>
                <!-- content -->
                <?php
                if($gallerylist!=null)
                {
                    $i = 1;
                    while($array = mysql_fetch_array($gallerylist))
                    {
                        if(($i-1)%3 == 0)
                        {
                            echo "<div class=\"row\">";
                            echo "<ul class=\"thumbnails\">";
                        }

                        echo "<li class=\"span4\">";
                        echo "<a data-toggle=\"lightbox\" href=\"#show".$array['imageid']."\" class=\"thumbnail\">";
                        echo "<img src=\"backend/src/img/gallery/". $array['imageid'] .".". $array['filetype'] ."\" alt=\"\">";
                        echo "</a>";
                        echo "</li>";

                        if(($i)%3 == 0)
                        {
                            echo "</div>";
                            echo "</ul>";
                        }
                        $i++;
                    }
                }
                ?>
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

    <!-- Modal -->
    <?php
    mysql_data_seek($gallerylist,0);
    if($gallerylist!=null)
    {
        $i = 1;
        while($array = mysql_fetch_array($gallerylist))
        {
            echo "<div id=\"show".$array['imageid']."\" class=\"lightbox hide fade\"  tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">";
            echo "<div class='lightbox-header'>";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"lightbox\" aria-hidden=\"true\">&times;</button>";
            echo "</div>";
            echo "<div class='lightbox-content'>";
            echo "<img src=\"backend/src/img/gallery/". $array['imageid'] .".". $array['filetype'] ."\" >";
            if($array['caption']!="")
            {
                echo "<div class=\"lightbox-caption\"><p>". $array['caption'] ."</p></div>";
            }
            echo "</div>";
            echo "</div>";
        }
    }
    ?>

    <script type="text/javascript">
    $(document).ready(function(){
        $.backstretch("src/images/bg1.jpg");
    });
    </script>
</body>
</html>