<?php 
include_once 'backend/src/php/manage_spa.php';

$spa = new SpaManagement();

$spalist = $spa->getLastestNews();
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
                <img src="src/images/h_spamenu.png" class="span11" />
                <section>
                    <div class="feature span11">
                        <h3>The Spa – Old City</h3>
                        <p class="lead">
                            Opening times:  10 am - 10 pm Last appointment 9 pm<br><br>

                            To make a booking inquiry, <U><a href="bookingSpa.php" target="_blank">Booking here</a></U> 
                            To make use of our <em>free pick up and drop off service</em> (available within Chiang Mai city area), please give us the name of your hotel, the hotel’s phone number or their web address and your room number if you have already checked in. If you have a Thai mobile phone number, please add that also. 
                        </p>

                        <?php
                            if($spalist!=null)
                            {
                                echo "<p class=\"lead\">Promotion</p>";
                                while($array = mysql_fetch_array($spalist))
                                {
                                    echo "<strong>". $array['topic'] ." : </strong>";
                                    echo " ". $array['description'] ."<br /><br />";
                                }
                            }
                        ?>

                        <p class="lead">Fah Lanna Spa Menu</p>
                        <strong>Traditional Thai Massage</strong><br>
                        Traditional Thai method dating back over 2,500 years. Thai massage involves stretching and deep massage using pressure along the meridian lines of the body. It globally respected for its effectiveness to ease muscle and joint tension. 400 Baht per hour<br><br>

                        <strong>Thai Balm Massage</strong><br> 
                        Traditional Thai massage using a herbal balm applied to the main muscle groups for its heating effect. It has the same benefits as the Traditional Thai massage and provides longer lasting relief to your aching and sore muscles. 700 Baht / hour<br><br>

                        <strong>Aromatherapy Oil Massage</strong><br>
                        A gentler and more soothing massage using Thai essential oils applied to the body to cleanse and freshen your skin. The use of essential oils promotes healing, a feeling of well-being and relaxation. 1,100 Baht / hour<br><br>

                        <strong>Reflexology Foot Massage</strong><br>
                        This natural healing therapy promotes the body’s own healing process by stimulating corresponding body-zones on your feet. It is highly effective in promoting health and relaxation. Foot reflexology promotes equilibrium and well being with long lasting impact. Excellent for tired feet after a long day's walk to reduce stress and improve circulation. 600 Baht / hour<br><br>

                        <strong>Head, Back and Shoulder Massage</strong><br>
                        Using techniques of the traditional Thai massage with a focus on the head, back and the shoulders. Although working on the whole body, the focus on the back and the shoulder is one of the quickest way of relieving both stress and inner-body tension.  700 Baht / hour<br><br>

                        <strong>Hot Oil Massage</strong><br>
                        A soothing and relaxing massage with heated oil that reduces tension of the muscles and helps to tone and condition them. It also energizes and relaxes your nerves and your senses all at once; leaving you feeling tranquil. 1,100 Baht / hour<br><br>

                        <strong>Moisturising Cream Massage</strong><br>
                        A soothing and relaxing body massage using moisturizing body cream leaving your skin nourished and soft. Skin is able to absorb cream better than oil and leaves the body less greasy.  1,100 Baht / hour<br><br>

                        <strong>Aloe Vera Massage</strong><br>
                        Aloe Vera contains many healing and cooling properties and is a very useful natural element to treat our skin. Aloe Vera also contains a rich source of amino acids, vitamins A, C, F, B, and Vitamin B12. This Aloe Vera wrap hydrates the skin after a day of sunbathing. We especially recommend it for sunburns. 1,100 Baht / hour<br><br>

                        <strong>Thai Herbal Massage</strong><br>
                        Thai Herbal Heat therapy uses a steamed herbal pouch (Lok Pra Kop) that is pressed over the body. A selection of herbs wrapped in a natural cotton cloth is steamed and then applied to the body to invigorate the effect on the body and mind, while simultaneously soothing sore and over-worked muscles and giving your energy levels a boost. 1,200 Baht / hour<br><br>

                        <strong>Tok Sen Massage</strong><br>
                        Tok Sen is a northern Thai (Lanna) style massage only found in Chiang Mai. Its therapeutical emphasis on the meridian lines is based on ancient Lanna wisdom and aims to clear blocked energy using a special wooden instrument to ease muscle tension using mechanical and sound vibration, working deeply through tissue and muscles.  Tok Sen therapy relieves muscle aches and pains, relieves energy blockages, and helps poor circulation and nerve problems. 1,300 Baht / hour<br><br>

                        <strong>Fah Lanna Skin Polish Body Scrub</strong><br>
                        This natural body scrub exfoliates by removing dead skin cells, oils and toxins that the skin does not allow to pass through. It stimulates the skin and improves circulation, which is believed to have a positive effect on the body’s immune system.  Your skin will feel replenished, soft and smooth. 1,200 Baht / hour<br><br>

                        <strong>Body Mask</strong><br>
                        A mask infused with herb- and plant extracts applied to your body to detoxify the skin, leaving it feel fresher, softer and smoother. 1,200 Baht / hour<br><br>

                        <strong>Facial Treatment</strong><br>
                        This five step facial treatment consists of cleansing the skin, a gentle natural scrub, a facial massage, a natural Thai herbal mask, and a natural herbal moisturizing treatment.  It cleans and revitalizes your skin leaving it fresh and glowing. 1,000 Baht / hour
                        Exfoliating Foot Scrub
                        A scrub that removes dead and hard skin leaving your feet soft and smooth. 800 Baht
                        Manicure & Pedicure 800 Baht<br><br>

                        <strong>Expert Waxing</strong>
                        Lip / Chin / Brow wax 400 Baht / 10 minutes
                        Underarm waxing 600 Baht / 20 minutes
                        Bikini waxing 1,000 Baht / 30 minutes
                        Brazillian waxing 1,500 Baht / 60 minutes
                        Back waxing 1,000 Baht / 30 minutes
                        Half leg / arm waxing 900 Baht / 30 minutes
                        Full leg 1,500 Baht  / 45 minutes<br><br>

                        <p class="lead">Fah Lanna Hair Spa</p><br>
                        <strong>Smooth as Silk Hair Cream Bath</strong><br>
                        Hair Shampoo followed by Head-, Neck and Shoulder Massage with the application of Fah Lanna Hair Cream Bath, followed by Shampoo & Blow Dry 900 Baht / 1 hour 30 minutes<br><br>

                        <p class="lead">Fah Lanna Signature Treatments</p><br>
                        <strong>Aromatic Herbal Steam</strong><br>
                        The Aromatic Herbal Stream opens skin pores and decongests the lungs as you relax and rejuvenate in our Lanna Steam Room. The Aromatic Herbal Steam will 
                        help remove toxins for your body, promote weight loss, relieve respiratory ailments such as asthma, bronchitis, sinusitis etc, relieve muscle tension and stiff 
                        joints, reduce stress, and improve blood circulation. It’s also believed to boost the immune system and reduce cellulite. 600 Baht / 30 minutes<br><br>

                        <strong>Fah Lanna Karma (Reiki Healing)</strong><br><br>
                        The word Reiki is made of two Japanese words - Rei which means "God's Wisdom or the Higher Power" and Ki which is "life force energy". Reiki is a Japanese 
                        technique for stress reduction and relaxation that also promotes healing. It is administered by "laying on hands" and is based on the idea that an unseen 
                        "life force energy" flows through us and is what causes us to be alive.<br><br>

                        One of the greatest Reiki healing health benefits is stress reduction and relaxation, which triggers the body’s natural healing abilities, and improves and maintains health. Reiki healing is a natural therapy that gently balances life energies and brings health and well being to the recipient. 
                        1,900 Baht / 60 minutes (By appointment only. Please call to book in advance.)<br><br>
                        
                        <p class="lead">Packages</p>
                        <strong>Siam Massage:</strong><br>
                        Reflexology Foot massage followed by Traditional Thai Massage 900 Baht / 2 hours<br><br>
                        
                        <strong>Fah Lanna Foot treatment:</strong><br>
                        A Foot Scrub followed by a Reflexology Foot massage. 1,200 Baht / 2 hours<br><br>
                        
                        <strong>Siam Herbal:</strong><br>
                        Traditional Thai Massage followed by Thai Herbal Massage 1,400 Baht / 2 hours<br><br>
                        
                        <strong>Fah Lanna Relaxation:</strong><br>
                        Reflexology Foot Massage followed by Aroma Oil Massage 1,500 Baht / 2hours<br><br>
                        
                        <strong>Fah Lanna Healing:</strong><br>
                        Aromatic Herbal Steam followed by a Thai massage and Aromatherapy Oil Massage. 1,900 Baht / 2 hours<br><br>
                        
                        <strong>Fah Lanna Traveller’s Retreat:</strong>
                        Reflexology foot massage, Traditional Thai Massage and Aromatherapy Oil Massage 1,900 Baht / 3 hours<br><br>
                        
                        <strong>Fah Lanna Northern Style:</strong><br>
                        Reflexology Foot Massage, Traditional Thai Massage and Tok Sen Massage 2,100 Baht / 3 hours<br><br>
                        
                        <strong>Fah Lanna Natural Glow:</strong><br>
                        Fah Lanna Skin Polish Body Scrub followed by Aromatherapy Oil massage 2,100 Baht / 2 hours<br><br>
                        
                        <strong>Fah Lanna Oriental:</strong><br>
                        Fah Lanna Skin Polish Body Scrub, Aromatherapy Oil Massage, Facial Treatment 2,900 Baht / 3 hours<br><br>
                        
                        <strong>Fah Lanna Tropical:</strong><br>
                        Fah Lanna Skin Polish Body Scrub, Body Mask, Aloe Vera Massage 3,300 Baht / 3 hours 5,200 Baht / 4 hours<br><br>
                        
                        <strong>Fah Lanna Radiance:</strong><br>
                        Aromatic Herbal Steam, Fah Lanna Skin Polish Body Scrub, Aromatherapy Oil Massage, Facial Treatment 
                        3,600 Baht / 3 hours 30 minutes<br><br>
                        
                        <strong>Fah Lanna Pure Bliss:</strong><br>
                        Aromatic Herbal Steam, Fah Lanna Skin Polish Body Scrub, Herbal Bath, Aromatherapy Oil Massage, Facial Treatment 
                        4,100 Baht / 4 hours<br><br>

                        <strong>Fah Lanna Nirvana:</strong><br>
                        Aromatic Herbal Steam, Fah Lanna Skin Polish Body Scrub, Body Mask, Herbal Bath, Aromatherapy Oil Massage, 
                        Facial Treatment 5,200 Baht / 4 hours<br><br>
                        
                        <p class="lead" >Download file:</p> <strong><U><a href="menu.pdf" target="_blank">Download the pdf </a></U>of our spa menu: link to file</strong>

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