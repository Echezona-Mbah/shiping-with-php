<?php session_start()?>
<?php 
$month='';$day='';$year='';$sex='';$country='';
$datam = array('January','February','March','April','May','June','July','August','September','October','November','December');
$data = array('Afghanistan','Albania','Algeria','Andorra','Angola','Antigua and Barbuda','Argentina','Armenia','Australia','Austria','Azerbaijan','Bahamas','Bahrain','Bangladesh','Barbados','Belarus','Belgium','Belize','Benin','Bhutan','Bolivia','Bosnia and Herzegovina','Botswana','Brazil','Brunei Darussalam','Bulgaria','Burkina Faso','Burundi','Cabo Verde','Cambodia','Cameroon','Canada','Central African Republic','Chad','Chile','China','Colombia','Comoros','Congo','Costa Rica','C?te dIvoire','Croatia','Cuba','Cyprus','Czech Republic','Democratic Peoples Republic of Korea North Korea','Democratic Republic of the Cong','Denmark','Djibouti','Dominica','Dominican Republic','Ecuador','Egypt','El Salvador','Equatorial Guinea','Eritrea','Estonia','Ethiopia','Fiji','Finland','France','Gabon','Gambia','Georgia','Germany','Ghana','Greece','Grenada','Guatemala','Guinea','Guinea-Bissau','Guyana','Haiti','Honduras','Hungary','Iceland','India','Indonesia','Iran','Iraq','Ireland','Israel','Italy','Jamaica','Japan','Jordan','Kazakhstan','Kenya','Kiribati','Kuwait','Kyrgyzstan','Lao Peoples Democratic Republic Laos','Latvia','Lebanon','Lesotho','Liberia','Libya','Liechtenstein','Lithuania','Luxembourg','Macedonia','Madagascar','Malawi','Malaysia','Maldives','Mali','Malta','Marshall Islands','Mauritania','Mauritius','Mexico','Micronesia Federated States','Monaco','Mongolia','Montenegro','Morocco','Mozambique','Myanmar','Namibia','Nauru','Nepal','Netherlands','New Zealand','Nicaragua','Niger','Nigeria','Norway','Oman','Pakistan','Palau','Panama','Papua New Guinea','Paraguay','Peru','Philippines','Poland','Portugal','Qatar','Republic of Korea South Korea','Republic of Moldova','Romania','Russian Federation','Rwanda','Saint Kitts and Nevis','Saint Lucia','Saint Vincent and the Grenadines','Samoa','San Marino','Sao Tome and Principe','Saudi Arabia','Senegal','Serbia','Seychelles','Sierra Leone','Singapore','Slovakia','Slovenia','Solomon Islands','Somalia','South Africa','South Sudan','Spain','Sri Lanka','Sudan','Suriname','Swaziland','Sweden','Switzerland','Syrian Arab Republic','Tajikistan','Thailand','Timor-Leste','Togo','Tonga','Trinidad and Tobago','Tunisia','Turkey','Turkmenistan','Tuvalu','Uganda','Ukraine','United Arab Emirates','United Kingdom of Great Britain and Northern Ireland','United Republic of Tanzania','United States of America','Uruguay','Uzbekistan','Vanuatu','Venezuela','Vietnam','Yemen','Zambia','Zimbabwe');
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Backend</title>
    <link type="text/css" href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!--handles the datatable-->
    <link rel="stylesheet" href="dataTableComp/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="dataTableComp/dist/css/AdminLTE.min.css">
    <link type="text/css" href="datetimepicker-master/jquery.datetimepicker.css" rel="stylesheet">



</head>

<body>
    <?php require_once("header.php"); ?>
    <section style="margin-top: 30px;">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
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
                    
                    <form action="action/main_work.php?option=create" method="post">
                        <div class="row">

                          <div class="col-md-12 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="track_point">Tracking Completion Percentage (100%)</label>
                                    <input
                                        value="<?php if(isset($_SESSION['track_point'])){ echo $_SESSION['track_point']; }else{ echo 0; } ?>"
                                        name="track_point" type="number" class="form-control my_form"
                                        placeholder="Tracking Point : EG => 0 - 100">
                                </div>
                            </div>  


                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="sender_fullname">Full Name of Sender</label>
                                    <input id="sender_fullname"
                                        value="<?php if(isset($_SESSION['sender_fullname'])){ echo $_SESSION['sender_fullname']; } ?>"
                                        name="sender_fullname" type="text" class="form-control my_form"
                                        placeholder="Sender`s Full Name">
                                </div>
                            </div>

                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="sender_phone">Phone of Sender</label>
                                    <input
                                        value="<?php if(isset($_SESSION['sender_phone'])){ echo $_SESSION['sender_phone']; } ?>"
                                        name="sender_phone" id="sender_phone" type="text" class="form-control my_form"
                                        placeholder="Sender`s Phone Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="sender_email">Email of Sender</label>
                                    <input id="sender_email"
                                        value="<?php if(isset($_SESSION['sender_email'])){ echo $_SESSION['sender_email']; } ?>"
                                        name="sender_email" type="text" class="form-control my_form"
                                        placeholder="Sender`s Email Address">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="sender_country">Country</label>
                                    <select id="sender_country" name="sender_country" class="form-control">
                                        <option>Select Your Country</option>
                                        <?php if(isset($_SESSION['sender_country'])){ ?>
                                        <option selected="selected">
                                            <?php echo $_SESSION['sender_country'] ; ?>
                                        </option>
                                        <?php } ?>
                                        <?php foreach($data as $key => $value){?>
                                        <option><?php echo $value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="datetimepicker_new">Depature Time</label>
                                    <input
                                        value="<?php if(isset($_SESSION['departure_time'])){ echo $_SESSION['departure_time']; } ?>"
                                        name="departure_time" type="text" id="datetimepicker_new"
                                        class="form-control my_form" placeholder="Depature Time">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="datetimepicker_neww">Date of Arrival</label>
                                    <input
                                        value="<?php if(isset($_SESSION['date_of_arrival'])){ echo $_SESSION['date_of_arrival']; } ?>"
                                        name="date_of_arrival" type="text" id="datetimepicker_neww"
                                        class="form-control my_form" placeholder="Depature Time">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="package_name">Name of Package</label>
                                    <input
                                        value="<?php if(isset($_SESSION['package_name'])){ echo $_SESSION['package_name']; } ?>"
                                        name="package_name" type="text" id="package_name" class="form-control my_form"
                                        placeholder="Name of Package">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="package_weight">Weight of Package (kg)</label>
                                    <input id="package_weight"
                                        value="<?php if(isset($_SESSION['package_weight'])){ echo $_SESSION['package_weight']; } ?>"
                                        name="package_weight" type="text" class="form-control my_form"
                                        placeholder="Weight of Package" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="amount_charged_for_shipment">Amount Charged for Shipment</label>
                                    <input
                                        value="<?php if(isset($_SESSION['amount_charged_for_shipment'])){ echo $_SESSION['package_weight']; } ?>"
                                        name="amount_charged_for_shipment" id="amount_charged_for_shipment" type="text"
                                        class="form-control my_form"
                                        placeholder="Amount Charged for Shipment: EG => 1000">
                                </div>
                                <div class="form-group">
                                    <label for="custormer_will_pay">
                                        <input type="checkbox" value="yes" id="custormer_will_pay"
                                            name="custormer_will_pay" />
                                        Receiver will pay for goods shippments, thick the check box for bill to be paid
                                        by the receiver
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="discount">Discount (%)</label>
                                    <input
                                        value="<?php if(isset($_SESSION['discount'])){ echo $_SESSION['discount']; }else{ echo 0; } ?>"
                                        name="discount" type="text" id="discount" class="form-control my_form"
                                        placeholder="Discount : EG => 0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="decription_of_bill">Description of Bill</label>
                                    <textarea name="decription_of_bill" type="text" id="decription_of_bill"
                                        class="form-control"
                                        placeholder="Description"><?php if(isset($_SESSION['decription_of_bill'])){ echo $_SESSION['decription_of_bill']; } ?></textarea>

                                </div>
                            </div>

                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="tax">Tax (%)</label>
                                    <input
                                        value="<?php if(isset($_SESSION['tax'])){ echo $_SESSION['tax']; }else{ echo 0; } ?>"
                                        name="tax" type="text" class="form-control my_form"
                                        placeholder="Discount : EG => 0">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="package_desc">Description of Package</label>
                                    <textarea id="package_desc" placeholder="Description of Package"
                                        class="form-control" name="package_desc"
                                        rows="3"><?php if(isset($_SESSION['package_desc'])){ echo $_SESSION['package_desc']; } ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="reciever_fullname">Name of Reciever</label>
                                    <input id="reciever_fullname"
                                        value="<?php if(isset($_SESSION['reciever_fullname'])){ echo $_SESSION['reciever_fullname']; } ?>"
                                        name="reciever_fullname" type="text" class="form-control my_form"
                                        placeholder="Name of Reciever">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="reciever_email">Email of Reciever</label>
                                    <input id="reciever_email"
                                        value="<?php if(isset($_SESSION['reciever_email'])){ echo $_SESSION['reciever_email']; } ?>"
                                        name="reciever_email" type="text" class="form-control my_form"
                                        placeholder="Email of Reciever">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="reciever_address">Address of Reciever</label>
                                    <input id="reciever_address"
                                        value="<?php if(isset($_SESSION['reciever_address'])){ echo $_SESSION['reciever_address']; } ?>"
                                        name="reciever_address" type="text" class="form-control my_form"
                                        placeholder="Address of Reciever">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="reciever_phone_no">Phone Number of Receiver</label>
                                    <input
                                        value="<?php if(isset($_SESSION['reciever_phone_no'])){ echo $_SESSION['reciever_phone_no']; } ?>"
                                        name="reciever_phone_no" type="text" id="reciever_phone_no"
                                        class="form-control my_form" placeholder="Phone Number of Reciever">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <button type="submit" name="submit_orderer"
                                        class="btn btn-block btn-info btn-lg">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </section>
    <!-- tracking_id update_id amount decription -->
</body>
<script type="text/javascript" src="bootstrap/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<!--datatable javascript-->
<script src="dataTableComp/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="dataTableComp/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
</script>
<script src="jquery.datetimepicker.full.js"></script>
<script type="text/javascript">
</script>

</html>