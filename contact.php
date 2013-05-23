<?php

if(isset($_POST['submit']))
{
    //define the receiver of the email
    $to = 'email@fahlanna.com';
    $subject = 'Incoming message from <CONTACT> section'; 
    $message = $_POST['subject'] ."\n\n". $_POST['detail']; 
    $headers = "From: ". $_POST['email'];

    $mail_sent = @mail( $to, $subject, $message, $headers );
}

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
                <img src="src/images/h_contact.png" class="span11" />

                <section>
                    <div class="feature span11">
                        <h3>Fah Lanna Spa</h3>
                        <p class="lead">
                            57/1 Wiang Kaew Road near corner of Jabhan Road, Tambon Sriphoon, Amper Mueng, Chiang Mai 52000 <br />
                            Phone : 053 416 191 <br />
                            Email : email@fahlanna.com
                        </p>
                    </div>
                </section>

                <iframe class="span11"  height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=201539082020307217767.0004d42b4240f2ed5fbbf&amp;hl=th&amp;ie=UTF8&amp;t=m&amp;iwloc=0004d42b591d3f2b17e23&amp;ll=18.793441,98.986956&amp;spn=0.006186,0.009645&amp;output=embed"></iframe><br /><small>ดู <a href="https://maps.google.com/maps/ms?msa=0&amp;msid=201539082020307217767.0004d42b4240f2ed5fbbf&amp;hl=th&amp;ie=UTF8&amp;t=m&amp;iwloc=0004d42b591d3f2b17e23&amp;ll=18.793441,98.986956&amp;spn=0.006186,0.009645&amp;source=embed" style="color:#0000FF;text-align:left"></a> </small></iframe>
                
                <section>
                    <div class="feature span11">
                        <h3>Fah Lanna Massage</h3>
                        <p class="lead">
                            186/3 Loy Kroh Road near corner of Charoen Prathet Road, Chiang Mai 50100 <br />
                            Phone : 082 0303 029 , 082 0303 029 <br />
                            Email : email@fahlanna.com
                        </p>
                    </div>
                </section>

                <iframe  class="span11" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.th/maps?f=q&amp;source=s_q&amp;hl=th&amp;geocode=&amp;q=Fah+Lanna+Massage,+Loy+Kroh+Road,+Chiang+Mai,+%E0%B8%88.%E0%B9%80%E0%B8%8A%E0%B8%B5%E0%B8%A2%E0%B8%87%E0%B9%83%E0%B8%AB%E0%B8%A1%E0%B9%88&amp;aq=0&amp;oq=fah&amp;sll=18.68544,101.154728&amp;sspn=0.127164,0.153294&amp;ie=UTF8&amp;hq=Fah+Lanna+Massage,+Loy+Kroh+Road,+Chiang+Mai,&amp;hnear=%E0%B8%88.%E0%B9%80%E0%B8%8A%E0%B8%B5%E0%B8%A2%E0%B8%87%E0%B9%83%E0%B8%AB%E0%B8%A1%E0%B9%88&amp;ll=18.783954,99.002566&amp;spn=0.027522,0.753516&amp;t=m&amp;output=embed"></iframe>
                
                <section>
                    <div class="feature span11">
                        <h3>Contact us</h3>
                    </div>
                </section>
                <form class="form-horizontal" method="post" action="">
                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input type="email" name="email" placeholder="your email">
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label">Confirm Email</label>
                        <div class="controls">
                            <input type="email" name="email" placeholder="Confirm your email">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Subject</label>
                        <div class="controls">
                            <input type="text" name="subject" placeholder="subject">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Detail</label>
                        <div class="controls">
                            <textarea rows="3" name="detail" placeholder="detail"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" name="submit" class="btn" value="1">Submit</button>
                        </div>
                    </div>
                </form>
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