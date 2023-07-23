<?php require_once ('action/main_work.php')?>
<?php $main_tables = $for->main_table()?>
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


</head>

<body>
    <?php require_once("header.php"); ?>
    <section style="margin-top: 30px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 table-responsive">
                    <table class="table table-bordered table-condensed " id="example1">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Tracking Number</th>
                                <th>Tracking Percentage(%)</th>
                                <th>Package Name</th>
                                <th>Sender Full Name</th>
                                <th>Sender Phone Number</th>
                                <th>Sender Email</th>
                                <th>Sender Country</th>
                                <th>Reciever Full Name</th>
                                <th>Reciever Address</th>
                                <th>Receiver Phone Number</th>
                                <th>Depature Time</th>
                                <th>Amount Charged ($)</th>
                                <th>Discount ($)</th>
                                <th>Tax ($)</th>
                                <th>Total Amount Payable ($)</th>
                                <th>Descrition of Bill</th>
                                <th>Payment option</th>
                                <th>Download Receipt</th>
                                <th>Edit</th>
                                <th>New Updates</th>
                                <th>View Details</th>

                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (is_array($main_tables)){ $no = 1;?>
                               <?php foreach ($main_tables as $k=> $main_table) { ;?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $main_table->tracking_no ;?></td>
                                <td><?php echo $main_table->package_weight ;?></td>
                                <td><?php echo $main_table->package_name ;?></td>
                                <td><?php echo $main_table->sender_fullname ;?></td>
                                <td><?php echo $main_table->sender_phone ;?></td>
                                <td><?php echo $main_table->sender_email ;?></td>
                                <td><?php echo $main_table->sender_country ;?></td>
                                <td><?php echo $main_table->reciever_fullname ;?></td>
                                <td><?php echo $main_table->reciever_address ;?></td>
                                <td><?php echo $main_table->reciever_phone_no ;?></td>
                                <td><?php echo $main_table->departure_time ;?></td>

                                <td><?php echo number_format($main_table->amount_charged_for_shipment,2) ?></td>

                                <?php $discountPercentage = $main_table->discount/100 ?>
                                <?php @$discountAmount = $main_table->amount_charged_for_shipment * $discountPercentage; ?>
                                <td><?php echo number_format($discountAmount,2) ?></td>

                                <?php @$taxPercentage = @$main_table->tax/100 ?>
                                <?php @$taxAmount = $main_table->amount_charged_for_shipment * $taxPercentage; ?>
                                <td><?php echo number_format($taxAmount,2) ?></td>

                                <?php @$totalToPay = $main_table->amount_charged_for_shipment - $discountAmount + $taxAmount ?>
                                <td><?php echo number_format($totalToPay,2) ?></td>

                                <td><?php echo $main_table->decription_of_bill ?></td>
                                <td><?php if($main_table->custormer_will_pay === 'yes'){ echo 'Receiver Will Pay'; } else { echo 'Sender will pay'; } ?>
                                </td>
                           
                                <!-- <td>

                                    <span
                                        class="btn btn-">
                                    </span>
                                    <button type="button" class="btn btn-success" onclick="confirmPayment(this)"
                                        order-id="<?php echo $main_table->status ; ?>">Confirm Payment</button>
                                </td> -->

                                <td>
                                    <div><a class="btn btn-info btn-sm"
                                            href="file.php?tracking_no=<?php echo $main_table->tracking_no ;?>">Download
                                            Receipt</a></div>
                                </td>
                                <td><a class="btn btn-block btn-info"
                                        href="edit_order.php?id=<?php echo $main_table->main_id;?>">Edit Order</a></td>
                                <td><a class="btn btn-block btn-primary"
                                        href="update_order.php?id=<?php echo $main_table->tracking_no;?>">Add New Update</a></td>
                                <td><a class="btn btn-block btn-primary"
                                        href="detail.php?id=<?php echo $main_table->tracking_no; ?>">Details</a>
                                </td>
                                <td><a class="btn btn-block btn-primary"
                                href="promptinter.php?id=<?php echo $main_table->main_id?>&action=deleteled">Delete
                                        Order</a></td>
                                        <?php $no++; } ?>
                            </tr>

                            <?php }else{ ?>
                            <tr>
                                <td colspan="10"><p class="text-center alert-danger alert"><?php echo $main_tables; ?></p></td>
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
});
</script>


</html>