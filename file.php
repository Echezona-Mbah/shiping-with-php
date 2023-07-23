<?php
ob_start();
// session_start();
require_once("theDateGuy.php");
 require_once ('action/main_work.php');
require_once("sitedetail.php");

$for = new main_work();


require_once( 'Dompdf/autoload.inc.php');


function htmlForInvoice($package_name,$package_desc,$package_weight,$tracking_no,$date_created,$departure_time,$sender_fullname,$sender_phone,$sender_email,$sender_country,$reciever_fullname,$reciever_phone_no,$reciever_address,$reciever_email, $amount_charged_for_shipment, $tax, $discount, $date_of_arrival, $siteName, $siteEmail){
    $font = "Century Gothic";
    $total = $amount_charged_for_shipment + $discount + $tax;
    return '<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    

</head>
<style>
    .font_size{
        font-size:0.8em;
    }
</style>
<body style="font-family: '.$font.';">

    <table style="width: 100%;">

        <tr align="center">
            <td colspan="2">
                <div style="width: 100%; padding-top: 10px; padding-bottom: 10px; background: #0E0227;">
                    <h1 style="color:white;">'.$siteName.'</h1>
                    <div style="width:80px; margin-left: auto; margin-right: auto;"></div>
                    <h3 style="color:white;">Invoice</h3>
                </div>
            </td>
        </tr>

        <tr align="center">
            <td colspan="2">
                <h3>SHIPMENT CONFIRMATION FOR ORDER No. '.$tracking_no.'</h3>
                <p>You have created an order for shippment with the following details.</p>
            </td>
        </tr>
        <br>
        <br>

    <tr align="left">
        <td>
            <div style="padding: 0px 10px;">
                <p class="font_size" style="margin-top:50px; margin-bottom: 2px;"><strong>Sender`s Full Name: </strong>  '.$sender_fullname.'</p><br>
                <p class="font_size" style="margin-top:50px; margin-bottom: 2px;"><strong>Sender`s Phone Number: </strong>  '.$sender_phone.'</p><br>
                <p class="font_size" style="margin-top:50px; margin-bottom: 2px;"><strong>Sender`s Email: </strong>  '.$sender_email.'</p><br>
                <p class="font_size" style="margin-top:50px; margin-bottom: 2px;"><strong>Sender`s Country: </strong>  '.$sender_country.'</p><br>
            </div>
        </td>
        <td align="left">
        <div style="padding: 0px 10px;">
            <p class="font_size" style="margin-top:50px; margin-bottom: 2px;"><strong>Recievers Full Name: </strong>  '.$reciever_fullname.'</p><br>
            <p class="font_size" style="margin-top:50px; margin-bottom: 2px;"><strong>Reciever`s Phone Number: </strong>  '.$reciever_phone_no.'</p><br>
            <p class="font_size" style="margin-top:50px; margin-bottom: 2px;"><strong>Reciever`s Email: </strong>  '.$reciever_email.'</p><br>
            <p class="font_size" style="margin-top:50px; margin-bottom: 2px;"><strong>Reciever`s Address: </strong>  '.$reciever_address.'</p><br>
        </div>
        </td>
    </tr><br>
        <td colspan="2">
            <table style="width: 100%; background: #bbf1c8;margin-top:200px; ">
                <tr><td colspan="2" ><hr></td></tr>
                <tr style="">

                    <td>
                        <div style="padding-left:10px;">
                            <p class="font_size" style="margin-top:50px; margin-bottom: 3px;"><strong>Name of Package: </strong></p><br>
                            <p class="font_size" style="margin-top:50px; margin-bottom: 3px;"><strong>Description: </strong> </p><br>
                            <p class="font_size" style="margin-top:50px; margin-bottom: 3px;"><strong>Weight: </strong> </p><br>
                            <p class="font_size" style="margin-top:50px; margin-bottom: 3px;"><strong>Tracking ID: </strong> </p><br>
                            <p class="font_size" style="margin-top:50px; margin-bottom: 3px;"><strong>Date Created: </strong> </p><br>
                            <p class="font_size" style="margin-top:50px; margin-bottom: 3px;"><strong>Date of Depature: </strong> </p><br>
                            <p class="font_size" style="margin-top:50px; margin-bottom: 3px;"><strong>Date of Arrival: </strong></p><br>
                        </div>
                    </td>
                    <td>
                    <div style="padding-right:10px;">
                        <p class="font_size" style="margin-top:50px; margin-bottom: 2px;">'.$package_name.'</p><br>
                        <p class="font_size" style="margin-top:50px; margin-bottom: 2px;">'.$package_desc.'</p><br>
                        <p class="font_size" style="margin-top:50px; margin-bottom: 2px;">'.$package_weight.'</p><br>
                        <p class="font_size" style="margin-top:50px; margin-bottom: 2px;">'.$tracking_no.'</p><br>
                        <p class="font_size" style="margin-top:50px; margin-bottom: 2px;">'.$date_created.'</p><br>
                        <p class="font_size" style="margin-top:50px; margin-bottom: 2px;">'.$departure_time.'</p><br>
                        <p class="font_size" style="margin-top:50px; margin-bottom: 2px;">'.$date_of_arrival.'</p><br>
                    </div>
                </td>
            </table>
         </td><br>
            
        </tr>
        
    
    </table>

    <table style="width: 100%; background: #bbf1c8;margin-top:200px; ">
        <tr><td colspan="2" ><hr></td></tr>
        <tr style="">

            <td>
                <div style="padding-left:10px;">
                <p class="font_size" style="margin-top:50px; margin-bottom: 2px;"><strong>Invoice Sub Total: </strong></p><br>
                <p class="font_size" style="margin-top:50px; margin-bottom: 2px;"><strong>Discount: </strong></p><br>
                <p class="font_size" style="margin-top:50px; margin-bottom: 2px;"><strong>Tax: </strong></p><br>
                <p class="font_size" style="margin-top:50px; margin-bottom: 2px;"><strong>Invoice Total: </strong></p><br>
                </div>
            </td>
            <td>
            <div style="padding-right:10px;">
            <p class="font_size" style="margin-top:50px; margin-bottom: 2px;">$'.number_format($amount_charged_for_shipment, 2).'</p><br>
            <p class="font_size" style="margin-top:50px; margin-bottom: 2px;">$'.number_format($discount, 2).'</p><br>
            <p class="font_size" style="margin-top:50px; margin-bottom: 2px;">$'.number_format($tax, 2).'</p><br>
            
            <p class="font_size" style="margin-top:50px; margin-bottom: 2px;"><strong>'.number_format($total, 2).'</strong></p><br>
            </div>
        </td>

        
    </table>


    <table style="width: 100%; background: #bbf1c8;margin-top:200px; ">
    <tr>
        <td >
            <div style="padding-left:10px;">
                <p class="font_size" style="margin-top:50px; margin-bottom: 5px;"><strong>Customer`s Signature: </strong></p><br>
            </div>
        </td>
        <td >
            <div style="padding-right:10px;">
                <p class="font_size" style="margin-top:50px; margin-bottom:5px;">__________________________________</p><br>
            </div>
        </td>
    </tr><br><br>
  <tr>

<td >
        <div style="padding-left:10px; margin-top:70px;">
            <p class="font_size" style="margin-top:50px; margin-bottom: 2px;"><strong>Trias Courier Representative Signature: </strong></p><br>
        </div>
    </td>
    <td >
    <div style="padding-right:10px; margin-top:70px;">
        <div class="font_size" style="width: 50px; margin-top:50px; margin-bottom: 2px; border-bottom: 1px solid black; padding-bottom:10px;"><img src="" alt="Signature" style="width: 10%;" /></div>
    </div>
</td>

<tr>
<td colspan="2"><br>
    <p class="font_size" style="padding: 0px 10px; margin-top:100px; margin-bottom: 2px;"><strong>Thank you for choosing Trias Express Courier</strong></p>
    <div style="width: 100%; padding-top: 10px; padding-bottom: 10px; background: #0E0227;margin-top:100px;">
        <p class="font_size" align="center" style="color:white;">'.$siteEmail.'</p>
    </div>
</td>
</tr>
  
</tr>

</table>

    


    



    

</body>
</html>';

}


use Dompdf\Dompdf;
use Dompdf\Options;

//

$dompdf = new Dompdf();
// $html = html($setting['name_of_school']);


$tracking_no = trim($_GET['tracking_no']);

$query = "SELECT * FROM main_table WHERE tracking_no = '$tracking_no'";
$details = $for ->runMysqliQuery($query);

if($details['error_code'] == 1){
    return $details['error'];
}
$result = $details['data'];
//print_r($result); die();
if(mysqli_num_rows($result) == 0){
    return 'in correct tracking number';

}if($result){
    for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
        $package_name = $row['package_name'];
        //print_r($package_name); die();
        $package_desc = $row['package_desc'];
        $package_weight = $row['package_weight'];
        $tracking_no = $row['tracking_no'];
        $date_created = $row['date_created'];
        $departure_time = $row['departure_time'];
        $sender_fullname = $row['sender_fullname'];
        $sender_phone = $row['sender_phone'];
        $sender_email = $row['sender_email'];
        $sender_country = $row['sender_country'];
        $reciever_fullname = $row['reciever_fullname'];
        $reciever_phone_no = $row['reciever_phone_no'];
        $reciever_address = $row['reciever_address'];
        $reciever_email = $row['reciever_email'];
        $amount_charged_for_shipment = $row['amount_charged_for_shipment'];
        $tax = $row['tax'];
        $discount = $row['discount'];
        $date_of_arrival = $row['date_of_arrival'];
    }

    // return $result;



}


$dompdf->loadHtml(htmlForInvoice($package_name,$package_desc,$package_weight,$tracking_no,$date_created,$departure_time,$sender_fullname,$sender_phone,$sender_email,$sender_country,$reciever_fullname,$reciever_phone_no,$reciever_address,$reciever_email, $amount_charged_for_shipment, $tax, $discount, $date_of_arrival, 'Polka Express Courier', $email_1));
// print_r($dompdf); die();

$dompdf->setPaper('A4', 'portrait');

$dompdf->set_option('isHtml5ParserEnabled', true);

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('file.pdf');

?>

