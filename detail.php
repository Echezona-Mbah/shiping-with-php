
<?php require_once ('action/main_work.php')?>
<?php 
if (isset($_GET['id']))
$userId = $_GET['id'];
$getTrackId = $for->getTrackId($userId);
$getTrackIdetail = $for->getTrackIdetail($userId);
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Backend</title>
    <link type="text/css" href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!--handles the datatable-->
    <link rel="stylesheet" href="dataTableComp/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="dataTableComp/dist/css/AdminLTE.min.css">


</head>

<body>
    <?php require_once("header.php"); ?>
    <?php

// $id = $_SESSION['thOrderId'];
// $order_id = $_SESSION['thOrderMainId'];

?>
    <section style="margin-top: 30px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 table-responsive">
                    <table class="table table-bordered table-condensed " id="example1">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Tracking Number</th>
                                <th>Package Name</th>
                                <th>Sender Full Name</th>
                                <th>Sender Phone Number</th>
                                <th>Sender Email</th>
                                <th>Sender Country</th>
                                <th>Reciever Full Name</th>
                                <th>Reciever Full Email</th>
                                <th>Reciever Address</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_object($getTrackId) > 0){ ?>
                                        <?php $no = 1; ?>
                                        <?php while($getTrackIds = mysqli_fetch_assoc($getTrackId)){?>
                            <tr>
                                <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $getTrackIds['tracking_no'] ;?></td>
                                <td><?php echo $getTrackIds['package_name'] ;?></td>
                                <td><?php echo $getTrackIds['sender_fullname'] ;?></td>
                                <td><?php echo $getTrackIds['sender_phone'] ;?></td>
                                <td><?php echo $getTrackIds['sender_email'] ;?></td>
                                <td><?php echo $getTrackIds['sender_country'] ;?></td>
                                <td><?php echo $getTrackIds['reciever_fullname'] ;?></td>
                                <td><?php echo $getTrackIds['reciever_email'] ;?></td>
                                <td><?php echo $getTrackIds['reciever_address'] ;?></td>
                                 <?php $no++; } ?>

                            </tr>

                            <?php }else{ ?>
                            <tr>
                                <td colspan="10"><p class="text-center alert-danger alert"><?php echo $getTrackIds; ?></p></td>
                            </tr>
                            <?php } ?>
                    
                        </tbody>
                    </table>

                    <table class="table table-bordered table-condensed " id="example2">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Tracking Id</th>
                                <th>Current Location</th>
                                <th>Arrival Time</th>
                                <th>Departure Time</th>
                                <th>Comments</th>
                                <th>Order Status</th>

                                <th>Amount Charged ($)</th>
                                <th>Discount ($)</th>
                                <th>Tax ($)</th>
                                <th>Total Amount Payable ($)</th>
                                <th>Descrition of Bill</th>
                                <th>Payment Status</th>

                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>

                        </thead>
                        <tbody>
                        <?php if(is_object($getTrackIdetail) > 0){ ?>
                                        <?php $no = 1; ?>
                                        <?php while($getTrackIdetails = mysqli_fetch_assoc($getTrackIdetail)){?>

                            <tr>
                            <td><?php echo $no;?></td>
                                <td><?php echo $getTrackIdetails['order_id'] ;?></td>
                                <td><?php echo $getTrackIdetails['current_location'] ;?></td>
                                <td><?php echo $getTrackIdetails['arrival_time'] ;?></td>
                                <td><?php echo $getTrackIdetails['depature_time'] ;?></td>
                                <td><?php echo $getTrackIdetails['comments'] ;?></td>
                                <td><?php echo $getTrackIdetails['current_status'] ;?></td>

                                <td><?php echo number_format($getTrackIdetails['amount_charged'] ,2); ?></td>

                                <?php $discountPercentage = $getTrackIdetails['discount']/100 ?>
                                <?php @$discountAmount = $getTrackIdetails->amount_charged * $discountPercentage; ?>
                                <td><?php echo number_format($discountAmount,2) ?></td>

                                <?php $taxPercentage = $getTrackIdetails['tax']/100 ?>
                                <?php @$taxAmount = $getTrackIdetails->amount_charged * $taxPercentage; ?>
                                <td><?php echo number_format($taxAmount,2) ?></td>
                                
                                <?php @$totalToPay = $getTrackIdetails['amount_charged'] - $discountAmount + $taxAmount ?>
                                <td><?php echo number_format($totalToPay,2) ?></td>
                                
                                <td><?php echo $getTrackIdetails['decription_of_bill'] ?></td>

                                <td><?php if($getTrackIdetails['custormer_will_pay'] === 'yes'){ echo 'Receiver Will Pay'; } else { echo 'Sender will pay'; } ?>
                                </td>
                                <!-- <td>

                                    <span
                                        class="btn btn-"></span>
                                    <button type="button" class="btn btn-success" onclick="confirmPayment(this)"
                                        order-id="">Confirm Payment</button>
                                </td> -->

                                <td><a class="btn btn-block btn-info"
                                        href="edit_update_order.php?id=<?php echo $getTrackIdetails['id'] ?>">Edit</a></td>
                                <td><a class="btn btn-block btn-primary"
                                href="prompts.php?id=<?php echo $getTrackIdetails['id'] ?>&action=delete">Delete
                                        Order</a></td>

                                        <?php $no++; } ?>

                            </tr>

                            <?php }else{ ?>
                            <tr>
                                <td colspan="10"><p class="text-center alert-danger alert"><?php echo $getTrackIdetails; ?></p></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

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
    $("#example2").DataTable();
});

function confirmPayment(a) {
    let retVal = confirm('Do you really want to continue?');
    if (retVal === true) {
        let orderId = $(a).attr('order-id');
        $.get('theActions.php?update_payment_order_id=' + orderId + '&update_payment_status=confirmed', function(data,
            status) {
            let theReturned = JSON.parse(data)
            if (theReturned.status === true) {
                alert(theReturned.message);
                setTimeout(function() {
                    location.reload();
                }, 4000)
            } else {
                alert(theReturned.message);
            }
        })
    }

}
</script>

</html>