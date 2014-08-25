<?php require_once "assets/libs/contactform.php"; ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,900,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/icons/short-cut-icon.png" />
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Add your site or application content here -->
    <div id="MessageSucessWrap">
        <div id="message-sucess-info"></div>
    </div>
    <div id="quick-access-menu" class="nav">
        <a class="res-housing-link" href="#header">
            <img class="quick-access-menu-icon" src="assets/icons/housin-icon.svg">
        </a>
        <a class="res-main-links" href="#about">
            <img width="30px" height="30px" class="quick-access-menu-icon" src="assets/icons/about-icon.svg">
        </a>
        <a class="res-main-links" href="#services">
            <img class="quick-access-menu-icon" src="assets/icons/services-icon.svg">
        </a>
        <a class="res-main-links" href="#contact">
            <img class="quick-access-menu-icon" src="assets/icons/contact-icon.svg">
        </a>
    </div>
    <!-- end quick menu access-->

    <div id="site-content">
        <section id="getStarted" class="contentWrapWidth hideOverflow relative">
            <div id="getStartedContent" class="innerDIVpostioningAndSIze">
                <div id="exitGetStarted">
                    <a href="#">
                        <img class="get-started-exit" src="assets/icons/exit-icon.svg">
                    </a>
                </div>
                <?php /* get started content */include "getstarted.html"; ?>
            </div>
            <!-- end get started content-->
        </section>
        <!-- -end get started section -->

        <header id="header" class="contentWrapWidth">
            <div id="header" class="containerPadding">
                <div id="site-logo">
                    <?php include "assets/icons/site-logo.html"; ?>
                </div>
                <!-- site logo div-->

                <nav id="nav-wrap" class="nav">
                    <a href="#about">About</a>
                    <a href="#services">Services</a>
                    <a href="#contact">Contact</a>
                    <a href="#housing">Housing</a>
                </nav>
                <!-- end nav -->
                <div class="clearFix"></div>

                <!-- mobile menu only -->
                <a id="responsiveMenuButton" href="#menu"></a>

                <nav id="nav-wrap-responsive" class="nav">
                    <div id="menu-items-group">
                        <a id="menu-close" href="#menu-close"> Close </a>
                        <a class="res-main-links" href="#about">About</a>
                        <a class="res-main-links" href="#services">Services</a>
                        <a class="res-main-links" href="#contact">Contact</a>
                        <a class="res-housing-link" href="#">Housing</a>
                    </div>
                </nav>
                <!-- end nav -->

                <div id="welcome-wrap">
                    <h1 id="welcome-header"> Welcome to Life Skill Supporting Accommodation</h1>
                </div>

                <a id="letsgetStarted" href="#getStarted"> Lets get Started </a>
            </div>
            <!-- end header container div-->
        </header>
        <!-- end header-->

        <section id="about" class="contentWrapWidth">
            <div id="about-content" class="innerDIVpostioningAndSIze">
                <?php /* get about content */include "about.html"; ?>
            </div>
        </section>
        <!-- end section about-->

        <section id="services" class="contentWrapWidth">
            <div id="service-content" class="innerDIVpostioningAndSIze">
                <?php /* get services content */include "services.html"; ?>
            </div>
        </section>
        <!-- end section services -->

        <section id="contact" class="contentWrapWidth">
            <div id="content-wrap" class="innerDIVpostioningAndSIze left">
                <h1 class="left"> Lets get in touch </h1>
                <p class="italics">* must be filled in</p>

                <div>
                    <?php sendMail(); ?>
                </div>
                <div id="contact-form-wrap">
                    <form id="form-contents" action="#contact" method="POST" autocomplete="off">
                        <div class="form-field-wrap">
                            <p class="input-label">*Full Name</p>
                            <input class="input-fields" placeholder="eg. John Doe" id="fullname" name="fullname" type="text" value="<?php isEntered(@$_POST['fullname']);?>" />
                            <div class="error-message">
                                <?php if(isset($_POST[ 'fullname'])){ echo validateName($_POST[ 'fullname']);} ?>
                            </div>

                        </div>

                        <div class="form-field-wrap">
                            <p class="input-label">*Phone Number</p>
                            <input class="input-fields" placeholder="eg. 07123456734" id="phonenumber" name="phonenumber" type="text" value="<?php isEntered(@$_POST['phonenumber']);?>" />
                            <div class="error-message">
                                <?php if(isset($_POST[ 'phonenumber'])){ echo validateNumber($_POST[ 'phonenumber']);} ?>
                            </div>
                        </div>

                        <div class="form-field-wrap">
                            <p class="input-label">*Email</p>
                            <input class="input-fields" placeholder="eg. yourmail@gmail.com" id="email" name="email" type="email" value="<?php isEntered(@$_POST['email']);?>" />
                            <div class="error-message">
                                <?php if(isset($_POST[ 'email'])){ echo validateEmail($_POST[ 'email']);} ?>
                            </div>
                        </div>

                        <div class="form-field-wrap">
                            <p class="input-label">Local Authority</p>
                            <input class="input-fields" placeholder="Enter if applicable" id="localauthority" name="localauthority" type="text" />
                        </div>

                        <div class="message-wrap">
                            <p class="input-label"></p>
                            <textarea class="message-feild" placeholder="Enter what you would like to discuss" name="message">
                                <?php isEntered(@$_POST[ 'message']);?>
                            </textarea>
                            <div class="error-message">
                                <?php if(isset($_POST[ 'message'])){ echo validateMessage($_POST[ 'message']);} ?>
                            </div>
                        </div>

                        <input id="submit-message" type="submit" value="Send Message" name="submit" />
                        <input type="hidden">
                    </form>
                </div>
                <!-- end contact form-->
                <div id="contact-info">
                    <h2> Contact info: </h2>
                    <div class="contact-personel">
                        <p>Lorna Thomas</p>
                        <p>Phone: 07971 161579</p>
                        <a href="mailto:lornathomas@talktalk.net?Subject=Query">Email: lornathomas@talktalk.net</a>
                    </div>

                    <div class="contact-personel">
                        <p>Elton Watson</p>
                        <p>Phone: 07939 006730</p>
                        <a href="mailto:eltoncwatson@hotmail.co.uk?Subject=Query">Email: eltoncwatson@hotmail.co.uk</a>
                    </div>
                </div>
                <!-- end contact info-->
            </div>
            <!-- end contact wrapper -->
        </section>
        <!-- end section contact -->

        <footer class="contentWrapWidth">
            <div class="innerDIVpostioningAndSIze">
                <h2> Life Skill Supporting Accommodation</h2>
                <div id="social-wrap">
                    <div class="social-icon" id="twitter"></div>
                    <div class="social-icon" id="facebook"></div>
                </div>
                <nav class="nav">
                    <a href="#about">About</a>
                    <a href="#services">Services</a>
                    <a href="#contact">Contact</a>
                    <a href="#housing">Housing</a>
                </nav>
                <!-- end nav -->
                <!-- <div>Icons were provided by <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a></div> -->
                <p class="copyright">&copy; 2014 LifeSkillSupportingAccommodation</p>
            </div>
        </footer>
        <!-- end section footer -->

    </div>
    <!-- end site content-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')
    </script>
    <script src="js/plugins.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function (b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function () {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = '//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X');
        ga('send', 'pageview');
    </script>
</body>

</html>