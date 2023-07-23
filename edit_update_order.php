
<?php require_once ('action/main_work.php')?>>
<?php if(isset($_GET['id']))?>
<?php $userId = $_GET['id']; ?>
<?php $userDetails = $for->getIdupdate($userId); ?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Backend</title>
    <link type="text/css" href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link type="text/css" href="datetimepicker-master/jquery.datetimepicker.css" rel="stylesheet">

    <!--handles the datatable-->
    <link rel="stylesheet" href="dataTableComp/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="dataTableComp/dist/css/AdminLTE.min.css">


</head>

<body>
    <?php require_once("header.php"); ?>
    <section style="margin-top: 30px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">

                    <div class="row">

                        <h4 class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                            Add New Updates
                        </h4>

                        <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2"
                            style="margin-top: 10px;">
                         

                        </div>
                    </div>

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
                    <form action="action/main_work.php?option=edit_update_order" method="post">
                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <input name="current_location" value="<?php echo $userDetails->current_location?>" type="text" class="form-control my_form"
                                        placeholder="Current Location">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <input name="time_of_arrival"value="<?php echo $userDetails->arrival_time?>"  id="datetimepicker1" type="text"
                                        class="form-control my_form" placeholder="Time of Arrival">
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="come" value="<?php echo $userId; ?>" />

                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <input name="time_of_departure" value="<?php echo $userDetails->depature_time?>" id="datetimepicker2" type="text"
                                        class="form-control my_form" placeholder="Time of Departure">
                                </div>
                            </div>


                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <textarea class="form-control" name="comments" placeholder="Comments"
                                        rows="3"><?php echo $userDetails->comments?></textarea>

                                </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="amount_charged_for_shipment">Amount Charged for Shipment</label>
                                    <input value="0" name="update_amount_charged_for_shipment"
                                        id="amount_charged_for_shipment" type="text" value=" <?php echo $userDetails->update_amount_charged_for_shipment?>" class="form-control my_form"
                                        placeholder="Amount Charged for Shipment: EG => 1000">
                                </div>
                                <div class="form-group">
                                    <label for="check_billing">
                                        <input type="checkbox" value=" <?php echo $userDetails->custormer_will_pay?>" value="yes" id="custormer_will_pay"
                                            name="custormer_will_pay" />
                                        Receiver will pay for goods shippments, thick the check box for bill to be paid
                                        by the receiver
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="decription_of_bill">Description of Bill</label>
                                    <textarea name="decription_of_bill" type="text" id="decription_of_bill"
                                        class="form-control" placeholder="Description"><?php echo $userDetails->decription_of_bill?> </textarea>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="discount">Discount (%)</label>
                                    <input value="0" value="<?php echo $userDetails->update_discount?> " name="update_discount" type="text" id="discount"
                                        class="form-control my_form" placeholder="Discount : EG => 0">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="tax">Tax (%)</label>
                                    <input value="0" value="<?php echo $userDetails->update_tax?>" name="update_tax" type="text" class="form-control my_form"
                                        placeholder="Discount : EG => 0">
                                </div>
                            </div>
                        </div>
                    <div class="row">
                            <div class="col-sm-12 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <label for="discount">Current Status</label>
                                    <select name="current_status" class="form-control my_form">
                                    <?php if(isset($_SESSION['current_status'])){ ?>
                                        <option selected value="<?php echo$userDetails->current_status ?>">
                                            <?php //echo $_SESSION['coin']; ?></option>
                                        <?php } ?>
                                        <option value="">Select Status</option>
                                        <option <?php if($userDetails->current_status === 'On Hold'){ echo  'selected';} ?>
                                            value="On Hold">On Hold</option>
                                        <option <?php if($userDetails->current_status === 'Transit'){ echo  'selected';} ?>
                                            value="Transit">Transit</option>
                                        <option <?php if($userDetails->current_status === 'Arrived'){ echo  'selected';} ?>
                                            value="Arrived">Arrived</option>
                                        <option <?php if($userDetails->current_status === 'Clearance'){ echo  'selected';} ?>
                                            value="Clearance">Clearance</option>
                                        <option <?php if($userDetails->current_status === 'Departed'){ echo  'selected';} ?>
                                            value="Departed">Departed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6 col-xs-12 text-center" style="margin-top: 20px;">
                                <div class="form-group">
                                    <button type="submit" name="submit_update"
                                        class="btn btn-block btn-info btn-lg">Submit</button>
                                </div>
                            </div>
                    </form>

                </div>

            </div>

        </div>
        </div>
    </section>
</body>
<script type="text/javascript" src="bootstrap/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<!--datatable javascript-->
<script src="dataTableComp/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="dataTableComp/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
$(function() {
    $("#example1").DataTable();
});
</script>

<script src="jquery.datetimepicker.full.js"></script>
<script type="text/javascript">
$('#datetimepicker1').datetimepicker({
    format: 'Y-m-d H:i:s',
    step: 05
});
$('#datetimepicker_new').datetimepicker({
    format: 'Y-m-d H:i:s',
    step: 05
});

//var $btn = $('#bt1');
$('#open').click(function() {
    $('#datetimepicker2').datetimepicker('show');
});

$('#datetimepicker2').datetimepicker({
    format: 'Y-m-d H:i:s',
    step: 05
});
$('#datetimepicker6').datetimepicker({
    //widgetParent: $btn,
    //yearOffset:0,
    //lang:'ch',
    timepicker: false,
    format: 'Y-m-d',
    //formatDate:'Y/m/d',
    //minDate:'-1970/01/02', // yesterday is minimum date
    //maxDate:'+9070/01/02' // and tommorow is maximum date calendar
});
$('#datetimepicker5').datetimepicker({
    //widgetParent: $btn,
    //yearOffset:0,
    //lang:'ch',
    timepicker: false,
    format: 'Y-m-d',
    //formatDate:'Y/m/d',
    //minDate:'-1970/01/01', // yesterday is minimum date
    //maxDate:'+9070/01/02' // and tommorow is maximum date calendar
});

$('#datetimepicker3').datetimepicker({
    datepicker: false,
    format: 'H:i:s',
    step: 5
});
$('#datetimepicker4').datetimepicker({
    //yearOffset:0,
    //lang:'ch',
    timepicker: false,
    format: 'Y-m-d',
    //formatDate:'Y/m/d',
    //minDate:'-1970/01/02', // yesterday is minimum date
    //maxDate:'+9070/01/02' // and tommorow is maximum date calendar
});
$('#datetimepicker_dark').datetimepicker({
    theme: 'dark'
})
</script>

</html>