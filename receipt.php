<?php require_once ('action/main_work.php')?>
<?php
if (isset($_GET['success']))
    $userId = $_GET['success'];
$getdetall = $for->getdetall($userId);
$userDetails = $for->getLoggedInUserDetails($userId);
$getTrackId = $for->getTrackId($userId);


//print_r($eachUserDetails); die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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
    
</body>
</html>