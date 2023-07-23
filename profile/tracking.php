<?php session_start()?>
<!DOCTYPE html>
<html>

<!-- Mirrored from www.zedekkcargodelivery.com /track.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jun 2019 06:24:28 GMT -->

<!-- Mirrored from zedekkcargodelivery.com /track.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2019 10:59:53 GMT -->

<!-- Mirrored from zedekkcargodelivery.com/profile/tracking.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Jul 2023 18:18:49 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <title> Global Express Delivery</title>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="../css/bootstrap.css"/><!-- bootstrap grid -->
        <link rel="stylesheet" href="../css/style.css"/><!-- template styles -->
        <link rel="stylesheet" href="../css/color-default.css"/><!-- template main color -->
        <link rel="stylesheet" href="../css/retina.css"/><!-- retina ready styles -->
        <link rel="stylesheet" href="../css/responsive.css"/><!-- responsive styles -->
        <script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <!-- Google Web fonts -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,800,700,600' rel='stylesheet' type='text/css'>

        <!-- Font icons -->
        <link href="../icon-fonts/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../style-switcher/styleSwitcher.css"/><!-- styleswitcher -->

        <script>
            $(document).ready(function(){

                if ($('.track_reg_no').length >0){
                     $("html,body").animate({ scrollTop: $('.table_report').offset().top }, "slow");
                }


    });
        </script>
        <style type='text/css'>
      .tbl_report{
    border: 1px solid black;
}
            </style>
    </head>

    <body>
         <span class="track_reg_no hide"></span>

        <div class="header-wrapper header-transparent">
            <!-- .header.header-style01 start -->
            <header id="header"  class="header-style01">
                <!-- .container start -->
                <div class="container">
                    <!-- .main-nav start -->
                    <div class="main-nav">
                        <!-- .row start -->
                        <div class="row">
                            <div class="col-md-12">
                                <nav class="navbar navbar-default nav-left" role="navigation">

                                <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


                                    <!-- .navbar-header start -->
                                    <div class="navbar-header">
                                        <div class="logo">
                                            <a href="../index-2.php">
                                            <img src="../img/logooo.png" alt="logo" width="200" height="200"/>
                                            </a>
                                        </div><!-- .logo end -->
                                    </div><!-- .navbar-header start -->

                                    <!-- MAIN NAVIGATION -->
                                    <div class="collapse navbar-collapse">
                                        <ul class="nav navbar-nav">
                                            <li >
                                                <a href="../index-2.php" >Home</a>
                                            </li><!-- .dropdown end -->

                                            <li >
                                                <a href="../about.php" >About</a>
                                            </li><!-- .dropdown end -->

                                             <li class="dropdown" >
                                                <a href="#" data-toggle="dropdown" class="dropdown-toggle" >Services</a>
                                                 <ul class="dropdown-menu">
                                                            <li><a href="../services_overview.php">Services Overview</a></li>
                                                            <li><a href="../overland.php">Overland Transportation</a></li>
                                                            <li><a href="../airfreight.php">Air freight</a></li>
                                                            <li><a href="../oceanfreight.php">Ocean freight</a></li>
                                                            <li><a href="../warehouse.php">Ware Housing</a></li>
                                                  </ul><!-- .dropdown-menu end -->
                                            </li><!-- .dropdown end -->

                                            <li class="current-menu-item" >
                                                <a href="../profile/tracking.php" >Track Shipment</a>
                                            </li><!-- .dropdown end -->

                                            <li>
                                                <a href="../media.php"  >Media</a>
                                            </li>

                                            <li><a href="../locations.php">Locations</a></li>

                                            <li>
                                                <a href="../contact.php" >Contact</a>
                                            </li><!-- .dropdown end -->
                                        </ul><!-- .nav.navbar-nav end -->

                                        <!-- RESPONSIVE MENU -->
                                        <div id="dl-menu" class="dl-menuwrapper">
                                            <button class="dl-trigger">Open Menu</button>

                                            <ul class="dl-menu">
                                                <li >
                                                <a href="../index-2.php" >Home</a>
                                            </li><!-- .dropdown end -->

                                            <li class="current-menu-item">
                                                <a href="../about.php" >About</a>
                                            </li><!-- .dropdown end -->

                                            <li class="dropdown" >
                                                <a href="../index.php#" data-toggle="dropdown" class="dropdown-toggle" >Services</a>
                                                 <ul class="dropdown-menu">

                                                  </ul><!-- .dropdown-menu end -->
                                            </li><!-- .dropdown end -->

                                            <li >
                                                <a href="../track.php" >Track Shipment</a>
                                            </li><!-- .dropdown end -->

                                            <li>
                                                <a href="../media.php"  >Media</a>
                                            </li>

                                            <li><a href="../locations.php">Locations</a></li>

                                            <li>
                                                <a href="../contact.php" >Contact</a>
                                            </li><!-- .dropdown end -->                                            </ul><!-- .dl-menu end -->
                                        </div><!-- #dl-menu end -->

                                        <!-- #search start -->
                                        <div id="search">
                                            <form action="#" method="get">
                                                <input class="search-submit" type="submit" />
                                                <input id="m_search" name="s" type="text" placeholder="Type and hit enter..." />
                                            </form>
                                        </div><!-- #search end -->
                                    </div><!-- MAIN NAVIGATION END -->
                                </nav><!-- .navbar.navbar-default end -->
                            </div><!-- .col-md-12 end -->
                        </div><!-- .row end -->
                    </div><!-- .main-nav end -->
                </div><!-- .container end -->
            </header><!-- .header.header-style01 -->
        </div><!-- .header-wrapper.header-transparent end -->



         <!-- .page-title start -->
        <div class="page-title-style01 page-title-negative-top pt-bkg08">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Track Shipment</h1>

                        <div class="breadcrumb-container">
                            <ul class="breadcrumb clearfix">
                                <li>You are here:</li>
                                <li>
                                    <a href="../index.php">Track Shipment</a>
                                </li>

                            </ul><!-- .breadcrumb end -->
                        </div><!-- .breadcrumb-container end -->
                    </div><!-- .col-md-12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div><!-- .page-title-style01.page-title-negative-top end -->


        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="custom-heading">
                            <h3>Track your shipment</h3>
                        </div><!-- .custom-heading.left end -->

                        <p>

                        </p>

                        <br />

                        <!-- .contact form start -->
                        <?php if(isset($_SESSION['formError'])){?>
                            <?php foreach($_SESSION['formError'] as $k => $eachErrorArray){?>
                                <?php foreach($eachErrorArray as $k => $eachError){?>
                                    <p class="alert alert-danger"><?php echo $eachError ?></p>
                                <?php } ?>
                            <?php } ?>
                            <?php unset($_SESSION['formError']); ?>
                        <?php } ?>
                        <?php if(isset($_GET['success'])){?>
                            <p class="alert alert-success"><?php echo trim($_GET['success']); ?></p>
                        <?php } ?>



                        <form action="../action/main_work.php?option=track" method="post">

                         
                                <label>
                                    <span class="required">*</span> Enter your 10 digits Tracking Number
                                </label>

                                <input type="text" name="track" class="wpcf7-text" id="accno" value="<?php if(isset($_SESSION['track'])){ echo $_SESSION['track']; } ?>">

                            <input name="pass"
                            id="pass" size="20" maxlength="30"
                            class="textbox" value="123456" type="hidden">
                         

                            <input type="submit" class="wpcf7-submit" id="btn_track" />
                        </form><!-- .wpcf7 end -->
                    </div><!-- .col-md-12 end -->
                    <div class="col-md-12">
                                            </div>
                </div><!-- .row end -->
                <hr class="dl-horizontal">


                <div class="row report ">
                                            </div>
                    <hr class="dl-horizontal">

                    <div class="row">
                                           </div>

                    <hr class="dl-horizontal">

                    <div class="row">

                    </div>

                     <hr class="dl-horizontal">
                    <div class="row">

                    </div><!--/row-->

                    <div class="row">
                        <div>

                        </div>
                        <div class="col-md-12">
                            Thank you for shipping with Global Express Delivery   , for more information mail us <i class="fa fa-envelope"></i> <a href='mailto:info@gexpdelivery.com '>info@zedekkcargodelivery.com </a>.
                        </div>
                    </div>
            </div><!-- .container end -->
        </div><!-- .page-content end -->

       <div id="footer-wrapper" class="footer-dark">
            <footer id="footer">
                <div class="container">
                    <div class="row">
                        <ul class="col-md-3 col-sm-6 footer-widget-container clearfix">
                            <!-- .widget.widget_text -->
                            <li class="widget widget_newsletterwidget">
                                <div class="title">
                                    <h3>newsletter subscribe</h3>
                                </div>

                                <p>
                                    Subscribe to our newsletter and we will
                                    inform you about newest projects and promotions.
                                </p>

                                <br />

                                <form class="newsletter">
                                    <input class="email" type="email" placeholder="Your email...">
                                    <input type="submit" class="submit" value="">
                                </form>
                            </li><!-- .widget.widget_newsletterwidget end -->
                        </ul><!-- .col-md-3.footer-widget-container end -->

                        <ul class="col-md-3 col-sm-6 footer-widget-container">
                            <!-- .widget-pages start -->
                            <li class="widget widget_pages">
                                <div class="title">
                                    <h3>quick links</h3>
                                </div>

                                <ul>
                                   <li >
                                                <a href="../index-2.php" >Home</a>
                                            </li><!-- .dropdown end -->

                                            <li class="current-menu-item">
                                                <a href="../about.php" >About</a>
                                            </li><!-- .dropdown end -->

                                            <li >
                                                <a href="#" >Services</a>
                                            </li><!-- .dropdown end -->

                                            <li >
                                                <a href="../profile/tracking.php" >Track Shipment</a>
                                            </li><!-- .dropdown end -->

                                            <li>
                                                <a href="../media.php"  >Media</a>
                                            </li>

                                            <li><a href="../locations.php">Locations</a></li>

                                            <li>
                                                <a href="../contact.php" >Contact</a>
                                            </li><!-- .dropdown end -->
                                </ul>
                            </li><!-- .widget-pages end -->
                        </ul><!-- .col-md-3.footer-widget-container end -->



                        <ul class="col-md-3 col-sm-6 footer-widget-container">
                            <li class="widget widget-text">
                                <div class="title">
                                    <h3>contact us</h3>
                                </div>

                                <address>
                                Global Express Delivery,<br />        
                                </address>

                                <span class="text-big">
                                     
                                </span>
                                <br />

                                 <br />info@zedekkcargodelivery.com  
                                <br />
                                <ul class="footer-social-icons">
                                    <li><a href="https://www.facebook.com/@zedekkcargodelivery.com /" class="fa fa-facebook"></a></li>
                                    <li><a href="https://twitter.com/@zedekkcargodelivery.com" class="fa fa-twitter"></a></li>
                                    <li><a href="https://plus.google.com/u/4/118039859328024557277?hl=en" class="fa fa-google-plus"></a></li>
                                </ul><!-- .footer-social-icons end -->
                            </li><!-- .widget.widget-text end -->
                        </ul><!-- .col-md-3.footer-widget-container end -->
                    </div><!-- .row end -->
                </div><!-- .container end -->
            </footer><!-- #footer end -->

            <div class="copyright-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Global Express Delivery 2020 All RIGHTS RESERVED.</p>
                        </div><!-- .col-md-6 end -->

                    </div><!-- .row end -->
                </div><!-- .container end -->
            </div><!-- .copyright-container end -->

            <a href="#" class="scroll-up">Scroll</a>
        </div><!-- #footer-wrapper end -->

        <script src="../js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
        <script src="../js/bootstrap.min.js"></script><!-- .bootstrap script -->
        <script src="../js/jquery.srcipts.min.js"></script><!-- modernizr, retina, stellar for parallax -->
        <script src="../js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
        <script src="../style-switcher/styleSwitcher.js"></script><!-- styleswitcher script -->
        <script src="../js/include.js"></script><!-- custom js functions -->

        </body>

<!-- Mirrored from www.zedekkcargodelivery.com /track.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jun 2019 06:24:28 GMT -->

<!-- Mirrored from zedekkcargodelivery.com /track.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2019 10:59:53 GMT -->

<!-- Mirrored from zedekkcargodelivery.com/profile/tracking.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Jul 2023 18:18:49 GMT -->
</html>

