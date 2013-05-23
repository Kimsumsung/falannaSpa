<?php

if(isset($_POST['submit']))
{
    //define the receiver of the email
    $to = 'email@fahlanna.com';
    $subject = 'Incoming message from <Spa Booking> section'; 
    $message =  "Name : ". $_POST['name'] ."\n".
                "Email : ". $_POST['email'] ."\n".
                "Contact : ". $_POST['contact'] ."\n".
                "Hotel name : ". $_POST['hotelname'] ."\n".
                "Hotel room number : ". $_POST['hotelroomnumber'] ."\n".
                "Hotel address : ". $_POST['hoteladdress'] ."\n".
                "Hotel contact : ". $_POST['hotelcontact'] ."\n\n".
                "Would like to booking :\n".
                "booking for : ". $_POST['people'] ." people\n".
                "date : ". $_POST['date'] ."\n".
                "time : ". $_POST['time'] ."\n".
                "hour : ". $_POST['hour'] ."\n".
                "suggestion : ". $_POST['suggestion'] ."\n";

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
                    <li><a href="galleryMassage.php?">Gallery</a></li>
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
                <ul class="nav nav-tabs">
                    <li class="active"> <a href="bookingMassage.php">Massage</a> </li>
                    <li><a href="bookingSpa.php">Spa</a></li>
                </ul>

                <h3>Massage Shop Night Bazaar(Booking)</h3>
                <!--Start Form-->
                <form class="form-horizontal" method="POST" action="">
                    <div class="control-group">
                        <label class="control-label">Your Name :</label>
                        <div class="controls">
                            <input class="span3" name="name" type="text" placeholder="Name">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email :</label>
                        <div class="controls">
                            <input class="span3" name="email" type="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Confirmed Email :</label>
                        <div class="controls">
                            <input class="span3" name="email" type="emailnaja" placeholder="Email">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Your contact number</label>
                        <div class="controls">
                            <input class="span3" name="contact" type="text" placeholder="Your contact telephone number">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Hotel name :</label>
                        <div class="controls">
                            <input class="span3" name="hotelname" type="text" placeholder="Hotel name">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Hotel room number :</label>
                        <div class="controls">
                            <input class="span3" name="hotelroomnumber" type="text" placeholder="Hotel room number">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Hotel address :</label>
                        <div class="controls">
                            <input class="span3" name="hoteladdress" type="text" placeholder="Hotel address">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Hotel contact :</label>
                        <div class="controls">
                            <input class="span3" name="hotelcontact" type="text" placeholder="Hotel contact">
                        </div>
                    </div>

                    <p>
                        <h3>Details of your booking</h3><br>
                    </p>

                    <div class="control-group">
                        <label class="control-label">I would like to make a booking for </label>
                        <div class="controls">
                            <select class="span1" name="people">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                            <input class="span2" name="date" type="date" placeholder="Date">
                            <input class="span1" name="time" type="time" placeholder="Time">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">please indicate for how many hours, i.e. 2 hour Thai massage</label>
                        <div class="controls">
                            <input class="span3" name="hour" type="number" min="1" placeholder="how many hours">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Any other questions or comments</label>
                        <div class="controls">
                            <textarea class="span3" name="suggestion" rows="6"></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" name="submit" value="1" class="btn btn-primary">Submit</button>
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

        <div class="row hidden-phone" id="view">
            <div class="span12">
                <div class="pull-left">
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