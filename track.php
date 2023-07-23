<?php require_once ('action/main_work.php')?>
<?php
if (isset($_GET['success']))
    $userId = $_GET['success'];
$getdetall = $for->getdetall($userId);
$userDetails = $for->getLoggedInUserDetails($userId);
$getTrackId = $for->getTrackId($userId);
$getTrackIdUpdate = $for->getTrackIdUpdate($userId);


//print_r($eachUserDetails); die();
?>
<!DOCTYPE html>
<html>

<!-- Mirrored from www.zedekkcargodelivery.com /track.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jun 2019 06:24:28 GMT -->

<!-- Mirrored from zedekkcargodelivery.com /track.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2019 10:59:53 GMT -->

<!-- Mirrored from zedekkcargodelivery.com/profile/tracking.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Jul 2023 18:18:49 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <title>Global Express Delivery </title>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/bootstrap.css"/><!-- bootstrap grid -->
        <link rel="stylesheet" href="css/style.css"/><!-- template styles -->
        <link rel="stylesheet" href="css/color-default.css"/><!-- template main color -->
        <link rel="stylesheet" href="css/retina.css"/><!-- retina ready styles -->
        <link rel="stylesheet" href="css/responsive.css"/><!-- responsive styles -->
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <!-- Google Web fonts -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,800,700,600' rel='stylesheet' type='text/css'>

        <!-- Font icons -->
        <link href="../icon-fonts/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../style-switcher/styleSwitcher.css"/><!-- styleswitcher -->
        <style>
    .font_size {
        font-size: 0.8em;
    }
    </style>

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


<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

/* tr:nth-child(even) {
  background-color: #dddddd;
} */
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
                                            <a href="index-2.php">
                                            <img src="img/logooo.png" alt="logo" width="200" height="200"/>                                            </a>
                                        </div><!-- .logo end -->
                                    </div><!-- .navbar-header start -->

                                    <!-- MAIN NAVIGATION -->
                                    <div class="collapse navbar-collapse">
                                        <ul class="nav navbar-nav">
                                            <li >
                                                <a href="index-2.php" >Home</a>
                                            </li><!-- .dropdown end -->

                                            <li >
                                                <a href="about.php" >About</a>
                                            </li><!-- .dropdown end -->

                                             <li class="dropdown" >
                                                <a href="#" data-toggle="dropdown" class="dropdown-toggle" >Services</a>
                                                 <ul class="dropdown-menu">
                                                            <li><a href="services_overview.php">Services Overview</a></li>
                                                            <li><a href="overland.php">Overland Transportation</a></li>
                                                            <li><a href="airfreight.php">Air freight</a></li>
                                                            <li><a href="oceanfreight.php">Ocean freight</a></li>
                                                            <li><a href="warehouse.php">Ware Housing</a></li>
                                                  </ul><!-- .dropdown-menu end -->
                                            </li><!-- .dropdown end -->

                                            <li class="current-menu-item" >
                                                <a href="profile/tracking.php" >Track Shipment</a>
                                            </li><!-- .dropdown end -->

                                            <li>
                                                <a href="media.php"  >Media</a>
                                            </li>

                                            <li><a href="locations.php">Locations</a></li>

                                            <li>
                                                <a href="contact.php" >Contact</a>
                                            </li><!-- .dropdown end -->
                                        </ul><!-- .nav.navbar-nav end -->

                                        <!-- RESPONSIVE MENU -->
                                        <div id="dl-menu" class="dl-menuwrapper">
                                            <button class="dl-trigger">Open Menu</button>

                                            <ul class="dl-menu">
                                                <li >
                                                <a href="index-2.php" >Home</a>
                                            </li><!-- .dropdown end -->

                                            <li class="current-menu-item">
                                                <a href="about.php" >About</a>
                                            </li><!-- .dropdown end -->

                                            <li class="dropdown" >
                                                <a href="../index.php#" data-toggle="dropdown" class="dropdown-toggle" >Services</a>
                                                 <ul class="dropdown-menu">

                                                  </ul><!-- .dropdown-menu end -->
                                            </li><!-- .dropdown end -->

                                            <li >
                                                <a href="profile/tracking.php" >Track Shipment</a>
                                            </li><!-- .dropdown end -->

                                            <li>
                                                <a href="media.php"  >Media</a>
                                            </li>

                                            <li><a href="locations.php">Locations</a></li>

                                            <li>
                                                <a href="contact.php" >Contact</a>
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21465.201706927644!2d-64.74355611341728!3d47.739740117799286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4c9f294caa40f417%3A0xccc216ce85154f6!2sShippagan%2C%20NB%2C%20Canada!5e0!3m2!1sen!2sng!4v1689245344333!5m2!1sen!2sng" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div><!-- .page-title-style01.page-title-negative-top end -->

        


        <div class="page-content">
            <h2 style="padding-left: 50px;">Tracking Result</h2>
            <div class="container">
            <table style="width: 100%; margin-bottom:20px; font-family: arial, sans-serif;"  class="table ">
                <thead style="width: 100%; margin-bottom:40px;margin-top:40px;background-color: #dddddd;  padding: 8px;" class="thead-dark">
                    <tr>
                    <!-- <th scope="col">S/N</th> -->
                    <th scope="col">Current Location</th>
                    <th scope="col">Time for Arrival</th>
                    <th scope="col">Time for Depature</th>
                    <th scope="col">Current Status</th>
                    <th scope="col">Additional Comments</th>
                    </tr>
                </thead>
                <tbody>
                                    <?php if(is_object($getTrackId) > 0){ ?>
                                        <?php $no = 1; ?>
                                        <?php while($getTrackIds = mysqli_fetch_assoc($getTrackId)){?>
                                        <tr>
                                           
                                            <td><?php echo $getTrackIds['sender_country']; ?></td>
                                            <td><?php echo $getTrackIds['date_of_arrival']; ?></td>
                                            <td><?php echo $getTrackIds['departure_time']; ?></td>
                                            <td><span class="btn btn-info">.......</span></td>
                                            <td><?php echo 'Package in good condition'; ?></td>

                                            <?php $no++; }?>
                                        </tr>
                                        <?php }else{ ?>
                                            <tr>
                                                <td colspan="10"><p class="text-center alert-warning"><?php echo($getTrackIds);?></p></td>
                                            </tr>
                                    <?php } ?>
                </tbody>
                <tbody>
                                    <?php if(is_object($getTrackIdUpdate) > 0){ ?>
                                        <?php $no = 1; ?>
                                        <?php while($getTrackIdUpdates = mysqli_fetch_assoc($getTrackIdUpdate)){?>
                                        <tr>
                                         
                                            <td><?php echo $getTrackIdUpdates['current_location']; ?></td>
                                            <td><?php echo $getTrackIdUpdates['arrival_time']; ?></td>
                                            <td><?php echo $getTrackIdUpdates['depature_time']; ?></td>
                                            <td><span class="btn btn-info"><?php echo $getTrackIdUpdates['current_status']; ?></span></td>
                                            <td><?php echo $getTrackIdUpdates['comments']; ?></td>

                                            <?php $no++; }?>
                                        </tr>
                                        <?php }else{ ?>
                                            <tr>
                                                <td colspan="10"><p class="text-center alert-warning"><?php echo($getTrackIdUpdates);?></p></td>
                                            </tr>
                                    <?php } ?>
                </tbody>
            </table>
        
            </div><!-- .container end -->
        </div><!-- .page-content end -->
        <br>

        <div class="row" style="width: 100%">
                    <div class="col-sm-12">
                        <h3 class="text-black">Package Details</h3>
                    </div>

                    <div class="col-sm-12 table-responsive">
                        <table class="table table-condensed table-bordered table-striped">

                            <tbody class="text-black">
                                
                              
                                <tr>
                                    <th>Name of Package</th>
                                    <td><?php  $details = $for->runMysqliQuery( "SELECT * FROM main_table WHERE tracking_no = '$userId'");
                                            if($details['error_code'] == 1){
                                                return $details['error'];
                                            }
                                            $result = $details['data'];
                                            if(mysqli_num_rows($result) == 0) {
                                                return 0;
                                            }else {

                                                while ($row = mysqli_fetch_array($result)) {
                                                    $output = $row[2];
                                                }
                                            }
                                            ?><?php echo $output;?></td>
                                </tr>
                                <tr>
                                    <th>Description of Package</th>
                                    <td><?php  $details = $for->runMysqliQuery( "SELECT * FROM main_table WHERE tracking_no = '$userId'");
                                            if($details['error_code'] == 1){
                                                return $details['error'];
                                            }
                                            $result = $details['data'];
                                            if(mysqli_num_rows($result) == 0) {
                                                return 0;
                                            }else {

                                                while ($row = mysqli_fetch_array($result)) {
                                                    $output = $row[14];
                                                }
                                            }
                                            ?><?php echo $output;?></td>
                                </tr>
                                <tr>
                                    <th>Tracking ID</th>
                                    <td><?php  $details = $for->runMysqliQuery( "SELECT * FROM main_table WHERE tracking_no = '$userId'");
                                            if($details['error_code'] == 1){
                                                return $details['error'];
                                            }
                                            $result = $details['data'];
                                            if(mysqli_num_rows($result) == 0) {
                                                return 0;
                                            }else {

                                                while ($row = mysqli_fetch_array($result)) {
                                                    $output = $row[10];
                                                }
                                            }
                                            ?><?php echo $output;?></td>
                                </tr>
                                <tr>
                                    <th>Time of Departure</th>
                                    <td><?php  $details = $for->runMysqliQuery( "SELECT * FROM main_table WHERE tracking_no = '$userId'");
                                            if($details['error_code'] == 1){
                                                return $details['error'];
                                            }
                                            $result = $details['data'];
                                            if(mysqli_num_rows($result) == 0) {
                                                return 0;
                                            }else {

                                                while ($row = mysqli_fetch_array($result)) {
                                                    $output = $row[12];
                                                }
                                            }
                                            ?><?php echo $output;?></td>
                                </tr>
                             
                                <tr>
                                    <th>Weight</th>
                                    <td><?php  $details = $for->runMysqliQuery( "SELECT * FROM main_table WHERE tracking_no = '$userId'");
                                            if($details['error_code'] == 1){
                                                return $details['error'];
                                            }
                                            $result = $details['data'];
                                            if(mysqli_num_rows($result) == 0) {
                                                return 0;
                                            }else {

                                                while ($row = mysqli_fetch_array($result)) {
                                                    $output = $row[3];
                                                }
                                            }
                                            ?><?php echo $output;?></td>
                                </tr>

                   
                                </tr>
                        </table>
                        </td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2" class="text-center">
                                <div style="width: 200px; margin-left: auto; margin-right: auto;">
                                    <!-- <h6 align="center"><img alt="Coding Sips"
                                            src="barcode.php?codetype=Code39&size=40&text=<?php echo @$value->tracking_no; ?>&print=true" />
                                    </h6> -->
                                    <a class="btn btn-success" href="file.php?tracking_no=<?php  $details = $for->runMysqliQuery( "SELECT * FROM main_table WHERE tracking_no = '$userId'");
                                            if($details['error_code'] == 1){
                                                return $details['error'];
                                            }
                                            $result = $details['data'];
                                            if(mysqli_num_rows($result) == 0) {
                                                return 0;
                                            }else {

                                                while ($row = mysqli_fetch_array($result)) {
                                                    $output = $row[10];
                                                }
                                            }
                                            ?><?php echo $output;?>">Download Details</a>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                        </table>
                    </div>

                </div>

                <div class="row" style="width: 100%">
                    <div class="col-sm-12">
                        <h3 class="text-black">Senders Details</h3>
                    </div>

                    <div class="col-sm-12 table-responsive">
                        <table class="table table-condensed table-bordered table-striped">

                            <tbody class="text-black">
                          
                                    <th>Full Name</th>
                                    <td><?php  $details = $for->runMysqliQuery( "SELECT * FROM main_table WHERE tracking_no = '$userId'");
                                            if($details['error_code'] == 1){
                                                return $details['error'];
                                            }
                                            $result = $details['data'];
                                            if(mysqli_num_rows($result) == 0) {
                                                return 0;
                                            }else {

                                                while ($row = mysqli_fetch_array($result)) {
                                                    $output = $row[1];
                                                }
                                            }
                                            ?><?php echo $output;?></td>
                                </tr>
                                <tr>
                                    <th>Email Address</th>
                                    <td><?php  $details = $for->runMysqliQuery( "SELECT * FROM main_table WHERE tracking_no = '$userId'");
                                            if($details['error_code'] == 1){
                                                return $details['error'];
                                            }
                                            $result = $details['data'];
                                            if(mysqli_num_rows($result) == 0) {
                                                return 0;
                                            }else {

                                                while ($row = mysqli_fetch_array($result)) {
                                                    $output = $row[5];
                                                }
                                            }
                                            ?><?php echo $output;?></td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td><?php  $details = $for->runMysqliQuery( "SELECT * FROM main_table WHERE tracking_no = '$userId'");
                                            if($details['error_code'] == 1){
                                                return $details['error'];
                                            }
                                            $result = $details['data'];
                                            if(mysqli_num_rows($result) == 0) {
                                                return 0;
                                            }else {

                                                while ($row = mysqli_fetch_array($result)) {
                                                    $output = $row[6];
                                                }
                                            }
                                            ?><?php echo $output;?></td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td><?php  $details = $for->runMysqliQuery( "SELECT * FROM main_table WHERE tracking_no = '$userId'");
                                            if($details['error_code'] == 1){
                                                return $details['error'];
                                            }
                                            $result = $details['data'];
                                            if(mysqli_num_rows($result) == 0) {
                                                return 0;
                                            }else {

                                                while ($row = mysqli_fetch_array($result)) {
                                                    $output = $row[4];
                                                }
                                            }
                                            ?><?php echo $output;?></td>
                                </tr>
                                
                          
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="row" style="width: 100%">
                    <div class="col-sm-12">
                        <h3 class="text-black">Reciever Details</h3>
                    </div>

                    <div class="col-sm-12 table-responsive">
                        <table class="table table-condensed table-bordered table-striped">

                            <tbody >
                              
                                <tr>
                                    <th>Full Name</th>
                                    <td><?php  $details = $for->runMysqliQuery( "SELECT * FROM main_table WHERE tracking_no = '$userId'");
                                            if($details['error_code'] == 1){
                                                return $details['error'];
                                            }
                                            $result = $details['data'];
                                            if(mysqli_num_rows($result) == 0) {
                                                return 0;
                                            }else {

                                                while ($row = mysqli_fetch_array($result)) {
                                                    $output = $row[7];
                                                }
                                            }
                                            ?><?php echo $output;?></td>
                                </tr>
                                <tr>
                                    <th>Email Address</th>
                                    <td><?php  $details = $for->runMysqliQuery( "SELECT * FROM main_table WHERE tracking_no = '$userId'");
                                            if($details['error_code'] == 1){
                                                return $details['error'];
                                            }
                                            $result = $details['data'];
                                            if(mysqli_num_rows($result) == 0) {
                                                return 0;
                                            }else {

                                                while ($row = mysqli_fetch_array($result)) {
                                                    $output = $row[8];
                                                }
                                            }
                                            ?><?php echo $output;?></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><?php  $details = $for->runMysqliQuery( "SELECT * FROM main_table WHERE tracking_no = '$userId'");
                                            if($details['error_code'] == 1){
                                                return $details['error'];
                                            }
                                            $result = $details['data'];
                                            if(mysqli_num_rows($result) == 0) {
                                                return 0;
                                            }else {

                                                while ($row = mysqli_fetch_array($result)) {
                                                    $output = $row[9];
                                                }
                                            }
                                            ?><?php echo $output;?></td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td><?php  $details = $for->runMysqliQuery( "SELECT * FROM main_table WHERE tracking_no = '$userId'");
                                            if($details['error_code'] == 1){
                                                return $details['error'];
                                            }
                                            $result = $details['data'];
                                            if(mysqli_num_rows($result) == 0) {
                                                return 0;
                                            }else {

                                                while ($row = mysqli_fetch_array($result)) {
                                                    $output = $row[13];
                                                }
                                            }
                                            ?><?php echo $output;?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
<!-- <p><a href="create_order.php">Download TEXT file</a></p>
<p><a href="horizon.zip">Download ZIP file</a></p>
<p><a href="lecture.pdf">Download PDF file</a></p>
<p><a href="rose.jpg">Download JPG file</a></p> -->

                <?php  
// $file_url = 'http://www.javatpoint.com/f.txt';  
// header('Content-Type: application/octet-stream');  
// header("Content-Transfer-Encoding: utf-8");   
// header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");   
// readfile($file_url);  
// ?> 

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
                                                <a href="index-2.php" >Home</a>
                                            </li><!-- .dropdown end -->

                                            <li class="current-menu-item">
                                                <a href="about.php" >About</a>
                                            </li><!-- .dropdown end -->

                                            <li >
                                                <a href="services.php" >Services</a>
                                            </li><!-- .dropdown end -->

                                            <li >
                                                <a href="profile/tracking.php" >Track Shipment</a>
                                            </li><!-- .dropdown end -->

                                            <li>
                                                <a href="media.php"  >Media</a>
                                            </li>

                                            <li><a href="locations.php">Locations</a></li>

                                            <li>
                                                <a href="contact.php" >Contact</a>
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
                                Global Express Delivery ,<br />        
                                </address>

                                <span class="text-big">
                                     
                                </span>
                                <br />

                                 <br />info@gexpdelivery.com  
                                <br />
                                <ul class="footer-social-icons">
                                    <li><a href="https://www.facebook.com/@gexpdelivery.com /" class="fa fa-facebook"></a></li>
                                    <li><a href="https://twitter.com/@gexpdelivery.com" class="fa fa-twitter"></a></li>
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

        <script src="js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
        <script src="js/bootstrap.min.js"></script><!-- .bootstrap script -->
        <script src="js/jquery.srcipts.min.js"></script><!-- modernizr, retina, stellar for parallax -->
        <script src="js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
        <script src="style-switcher/styleSwitcher.js"></script><!-- styleswitcher script -->
        <script src="js/include.js"></script><!-- custom js functions -->

        <script>
            /* <![CDATA[ */
            jQuery(document).ready(function ($) {
                'use strict';
                // COMMENT FORM AJAX SUBMIT START
                $('#commentform .comment-reply').on('click', function (event) {
                    event.preventDefault();
                    var name = $('#comment-name').val();
                    var email = $('#comment-email').val();
                    var message = $('#comment-message').val();
                    var form_data = new Array({'Name': name, 'Email': email, 'Message': message});
                    $.ajax({
                        type: 'POST',
                        url: "contact.php",
                        data: ({'action': 'comment', 'form_data': form_data})
                    }).done(function (data) {
                        alert(data);
                    });
                }); // COMMENT FORM AJAX SUBMIT END
            });
            /* ]]> */
        </script>
  </body>

<!-- Mirrored from www.zedekkcargodelivery.com /track.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jun 2019 06:24:28 GMT -->

<!-- Mirrored from zedekkcargodelivery.com /track.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2019 10:59:53 GMT -->

<!-- Mirrored from zedekkcargodelivery.com/profile/tracking.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Jul 2023 18:18:49 GMT -->
</html>

