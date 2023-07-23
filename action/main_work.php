<?php
/* eslint-disable */
ob_start();
session_start();
require_once ('DatabaseQueries.php');
require_once ('validationManager.php');
require_once ('FileHandler.php');

class main_work{

    use DatabaseQueries, validationManager, FileHandler;

    function __construct()
    {
        $this->connectToDb();
        $this->callFunctions();

    }
 function callFunctions(){
        if (isset($_GET["option"])) {
            switch ($_GET["option"]){
                case 'create':
                    $this-> registerform();
                    break;
                case 'updateuserss':
                    $this-> updateuserss();
                    break;
                case 'track':
                    $this-> track();
                    break;
                case 'edit_order':
                    $this-> editOrder();
                    break;
                case 'edit_update_order':
                    $this-> edit_update_order();
                    break;
                case 'login':
                    $this-> login();
                    break;
                case 'support':
                    $this-> support();
                    break;
                case 'createUpdate':
                    $this-> createUpdate();
                    break;
                case 'withdraw':
                    $this->withdraw();
                    break;
                case 'withdrawamount':
                    $this->withdrawAmount();
                    break;
                case 'upgrate':
                    //call the function that will process the form
                    $this->reinvest();
                    break;
                case 'registers':
                    $this-> adminregister();
                    break;
                case 'delete':
                    //call the function that will process the form
                    $this->manageAccount();
                    break;
                case 'block':
                    //call the function that will process the form
                    $this->manageAccounts();
                    break;
                case 'unblock':
                    //call the function that will process the form
                    $this->manageAccountss();
                    break;
                case 'deletel':
                    //call the function that will process the form
                    $this->managewithdraw();
                    break;
                case 'pending':
                    //call the function that will process the form
                    $this->managewithdra();
                    break;
                case 'confirmed':
                    //call the function that will process the form
                    $this->managewithdr();
                    break;
                case 'deleteled':
                    //call the function that will process the form
                    $this->manageusers();
                    break;
                case 'pendingi':
                    //call the function that will process the form
                    $this->manageuser();
                    break;
                case 'confirmedi':
                    //call the function that will process the form
                    $this->manageuse();
                    break;
                case 'delete2':
                    //call the function that will process the form
                    $this->managereff();
                    break;
                case 'pendiing':
                    //call the function that will process the form
                    $this->manageref();
                    break;
                case 'confiirmed':
                    //call the function that will process the form
                    $this->managere();
                    break;
                case 'wallet':
                    //call the function that will process the form
                    $this->addwallet();
                    break;
                case 'wallet_update':
                    //call the function that will process the form
                    $this->updatewallet();
                    break;
                case 'enter_email':
                    $this-> enteremail();
                    break;
                case 'password_reset':
                    $this-> enternewpassword();
                    break;
                case 'admin':
                    //call the function that will process the form
                    $this->updateadmin();
                    break;
                case 'add':
                    //call the function that will process the form
                    $this->add();
                    break;
                case 'remove':
                    //call the function that will process the form
                    $this->remove();
                    break;
                case 'withdrawBonus':
                    $this->withdrawBonus();
                    break;
                case 'delete4':
                    //call the function that will process the form
                    $this->manbonus();
                    break;
                case 'pendiiing':
                    //call the function that will process the form
                    $this->manabonus();
                    break;
                case 'confiiirmed':
                    //call the function that will process the form
                    $this->managbonus();
                    break;
                case 'logout':
                    //call the function that will process the form
                    $this->logout();
                    break;
                case 'deletellll':
                    //call the function that will process the form
                    $this->managesupport();
                    break;

            }
        }
    }



    function registerform(){
       $track_point = $_SESSION['track_point'] = mysqli_real_escape_string($this->dbConnection, $_POST['track_point']);
       $sender_fullname = $_SESSION['sender_fullname'] = mysqli_real_escape_string($this->dbConnection, $_POST['sender_fullname']);
       $package_name = $_SESSION['package_name'] = mysqli_real_escape_string($this->dbConnection, $_POST['package_name']);
       $package_desc = $_SESSION['package_desc'] = mysqli_real_escape_string($this->dbConnection, $_POST['package_desc']);
       $package_weight = $_SESSION['package_weight'] = mysqli_real_escape_string($this->dbConnection, $_POST['package_weight']);
       $sender_phone = $_SESSION['sender_phone'] = mysqli_real_escape_string($this->dbConnection, $_POST['sender_phone']);
       $sender_email = $_SESSION['sender_email'] = mysqli_real_escape_string($this->dbConnection, $_POST['sender_email']);
       $sender_country = $_SESSION['sender_country'] = mysqli_real_escape_string($this->dbConnection, $_POST['sender_country']);
       $reciever_fullname = $_SESSION['reciever_fullname'] = mysqli_real_escape_string($this->dbConnection, $_POST['reciever_fullname']);
       $reciever_email = $_SESSION['reciever_email'] = mysqli_real_escape_string($this->dbConnection, $_POST['reciever_email']);
       $reciever_address = $_SESSION['reciever_address'] = mysqli_real_escape_string($this->dbConnection, $_POST['reciever_address']);
       $amount_charged_for_shipment = $_SESSION['amount_charged_for_shipment'] = mysqli_real_escape_string($this->dbConnection, $_POST['amount_charged_for_shipment']);
       $discount = $_SESSION['discount'] = mysqli_real_escape_string($this->dbConnection, $_POST['discount']);
       $tax = $_SESSION['tax'] = mysqli_real_escape_string($this->dbConnection, $_POST['tax']);
       $date_of_arrival = $_SESSION['date_of_arrival'] = mysqli_real_escape_string($this->dbConnection, $_POST['date_of_arrival']);
   
       $reciever_phone_no = $_SESSION['reciever_phone_no'] = mysqli_real_escape_string($this->dbConnection, $_POST['reciever_phone_no']);
       $decription_of_bill = $_SESSION['decription_of_bill'] = mysqli_real_escape_string($this->dbConnection, $_POST['decription_of_bill']);
       $custormer_will_pay = 'no';
        if(isset($_POST['custormer_will_pay'])){
            $custormer_will_pay = 'yes';
        }

        $thingsToValidate = [
            $track_point.'|Frack_point|track_point',
            $sender_fullname.'|Sender_fullname|sender_fullname',
            $package_name.'|Package_name|package_name',
            $package_desc.'|Package_desc|package_desc',
            $package_weight.'|Package_weight|package_weight',
            $sender_phone.'|Sender_phone|sender_phone',
            $sender_email.'|Sender_email|sender_email|empty',
            $sender_country.'|Sender_country|sender_country|empty',
            $reciever_fullname.'|Reciever_fullname|reciever_fullname|empty',
            $reciever_email.'|Reciever_email|reciever_email|empty',
            $reciever_address.'|Reciever_address|reciever_address|empty',
            $amount_charged_for_shipment.'|Amount_charged_for_shipment|amount_charged_for_shipment|empty',
            $discount.'|Discount|discount|empty',
            $tax.'|Tax|tax|empty',
            $date_of_arrival.'|Date_of_arrival|date_of_arrival|empty',
            $reciever_phone_no.'|Reciever_phone_no|reciever_phone_no|empty',
            $decription_of_bill.'|Decription_of_bill|decription_of_bill|empty',
            $custormer_will_pay.'|Custormer_will_pay|custormer_will_pay|empty',
        ];
        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false){
            $_SESSION['formError'] = $this->errors;
            // print_r( $_SESSION['formError']); die();
            header('location:../create_order.php');
            return;
        }
        //    print_r($thingsToValidate); die();
        // print_r($r); die();

        $tracking_no = $this->createUniqueID('main_table', 'tracking_no');
        $_SESSION['tracking_no'] = $tracking_no;


        $createuse = $this->insertIntoUsersTable($track_point,$sender_fullname,$package_name,$package_desc,$package_weight,$sender_phone,$sender_email,$sender_country,$reciever_fullname,$reciever_email,$reciever_address, $amount_charged_for_shipment, $discount, $tax, $date_of_arrival, $reciever_phone_no,$decription_of_bill, $custormer_will_pay,$tracking_no);
        // print_r($createuse); die();
            if ($createuse['error_code'] == 1){
            $_SESSION['formError']=['general_error' =>[$createuse['error']] ];
            header('location:../create_order.php');
            return;
        }

        if ($createuse){
            $to  = $reciever_email;
            $d = date('Y');
            $subject = "Welcome To Global Express Delivery";
            $message =  '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            </head>
            <body>
            <div>
            <h6 align="center"><img src="https://www.gexpdelivery.com/img/logooo.png" style="width:50px; height: 50px;" /></h6>
            <p>
            <strong>Client mail:</strong><br />
            Name: '.$sender_fullname.'<br />
            Email: '.$sender_email.'
            </p>
            <p> '.$reciever_email.'</p>
             </div>
            </body>
            </html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: gexpdelivery.com <support@gexpdelivery.com>' . "\r\n";
            $retval = @mail($to,$subject, $message, $header);
            if ($retval = true) {
                header('location:../create_order.php?success=order was successful Create');
                // header("location:login.php");
            }else {
                return  'Internal error. Mail fail to send';
            }
            header('location:../create_order.php?success=order was successful Create');
        }
        $to  = $sender_email;
        $d = date('Y');
        $subject = "Welcome To Global Express Delivery";
        $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
    <h6 align="center"><img src="https://www.gexpdelivery.com/img/logooo.png" alt="gexpdelivery "/></h6>
    <div style="font-size: 14px;">
    <p>
    <strong>Client mail:</strong><br />
    Name: '.$name.'<br />
    Email: '.$email.'
    </p>
    <p> '.$message.'</p>
    Global Express Delivery Team<br />
    Email: support@gexpdelivery@gmail.com<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        Global Express Delivery.<br>
located at 150 Minories,<br>
Tower, london EC3N,<br>
 United kingdom.
</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;Global Express Delivery <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $header .= 'From: gexpdelivery <support@gexpdelivery.com>' . "\r\n";
        $retval = @mail($sender_email, $subject, $message, $header);
        if ($retval = true) {
            header("location:../create_order.php?come=$users_unique_id");
        } else {
            return  'Internal error. Mail fail to send';
        }
        header("location:../create_order.php?success=order was successful Create");
        if ($createuse){
            $dsr = "SELECT * FROM users WHERE ref_id = '$ref_id'";
            $resu = $this->runMysqliQuery($dsr);
            if($resu['error_code'] == 1){
                return $resu['error'];
            }
            $resul = $resu['data'];
            if(mysqli_num_rows($resul) > 0) {
                while($row = mysqli_fetch_assoc($resul)){
                    $r = $row['referral'];
                }
            }
            $dsrs = "SELECT * FROM users WHERE ref_id = '$r'";
            $resus = $this->runMysqliQuery($dsrs);
            if($resus['error_code'] == 1){
                return $resus['error'];
            }
            $result = $resus['data'];
            if(mysqli_num_rows($result) == 0){
                return 'no';
            }else{
                while($row = mysqli_fetch_array($result)){
                    $refemail = $row['email'];
                    $refname = $row['username'];
                }
                $to  = $refemail;
                $d = date('Y');
                $subject = "Welcome To gexpdelivery";
                $message = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">
                                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                </head>
                                <body>
                    <h6 align="center"><img src="https://www.everledgerminers.com/images/rr.png" alt="verdienenglobal "/></h6>
                    <div style="font-size: 14px;">
					<p>Hello '.$refname.' <br>
						You Reffered : '.$fullname.' <br> you will receive 5% each time he makes a deposit.</p>
					<p style="">Thanks!</p>
					<p style="color:#332E2E">Best Regard<br />
                    everledgerminers Team<br />
                    Email: support@everledgerminers1.com<br /></p>

			<div style="background-color:rgb(253, 150, 26);
						float:left;
						width:80%;
						border:1px solid rgb(253, 150, 26);
						border-radius:0px 0px 3px 3px;
						padding-left:10% ;
						padding-right:10% ;
						padding-top:30px ;
						padding-bottom:30px ;
						font-family: \'Roboto\', sans-serif;" class="footer">
                        everledgerminers.<br>
				located at 150 Minories,<br>
Tower, london EC3N,<br>
 United kingdom.
			</div>
			<p style="float:left;
			width:100%;
			text-align:center;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;verdienenglobal . All Rights Reserved.</p>
		</div>
		</body>
		</html>';
                $header = "MIME-Version: 1.0" . "\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $header .= 'From: everledgerminers <support@gexpdelivery.com>' . "\r\n";
                $retval = @mail($to, $subject, $message, $header);
                if ($retval = true) {
                    return  'Verification Mail sent successfully?success=order was successful Create';
                    // header("location:login.php");
                } else {
                    return  'Internal error. Mail fail to send';
                }
                header('location:../create_order.php?success=order was successful Create');

            }

        }
        header("location:../create_order.php?success=order was successful Create");
    }

    function login(){
        $username= $_SESSION['username']=mysqli_real_escape_string($this->dbConnection, $_POST['username']);
        $password= $_SESSION['password']=mysqli_real_escape_string($this->dbConnection, $_POST['password']);

        $thingsToValidate = [
            $username.'|Username|username|empty',
            $password.'|Password|Passwords|empty'
        ];
        
        $validationStatus = $this->callValidation($thingsToValidate);
        // print_r($validationStatus);die();
        if($validationStatus === false) {
            $_SESSION['formError'] = $this->errors;
            //print_r($validationStatus);die();
            header('location:../login.php');
            return;
         
        }
        // print_r($validationStatus); die();
        $hashedPasword = $this->hasHer($password);

        $calllogin = $this->loginHandler($username,$hashedPasword);
        if ($calllogin['error_code']== 1 ){
            $_SESSION['formError'] = ['general_error'=>[$calllogin['error']]];
            header('location:../dashboard.php');

        }

    }

    function track(){
        $track = $_SESSION['track']=mysqli_real_escape_string($this->dbConnection, $_POST['track']);
        $thingsToValidate = [
            $track.'|Track|track|empty'
        ];
        
        $validationStatus = $this->callValidation($thingsToValidate);
        // print_r($validationStatus);die();
        if($validationStatus === false) {
            $_SESSION['formError'] = $this->errors;
            //print_r($validationStatus);die();
            header('location:../profile/tracking.php');
            return;
         
        }
        header("location:../track.php?success=$track");

    }
    function valdateSession($foider){
        if(!isset($_SESSION['userUniqueId'])){
            $_SESSION['formError'] = ['general_error'=>['Please Login to continue']];
            //print_r($_SESSION['formError']); die();
            header('location:'.$foider);
        }
    }

    function valdatereff($foider){
        if(!isset($_SESSION['userRef_id'])){
            $_SESSION['formError'] = ['general_error'=>['Please Login to continue']];
            //print_r($_SESSION['formError']); die();
            header('location:'.$foider);
        }
    }

    function main_table(){
        $UserDetails = [];
        $query = "SELECT * FROM main_table";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                // print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }
    function getTrackId($track){
        $UserDetails = "";
        $query = "SELECT * FROM main_table WHERE tracking_no = '".$track."'";
        //  print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $UserDetails = $details['data'];
        //print_r($query);die();

        return $UserDetails;

    }

    function getTrackIdUpdate($track){
        $UserDetails = "";
        $query = "SELECT * FROM updates WHERE order_id = '".$track."'";
        //  print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $UserDetails = $details['data'];
        //print_r($query);die();

        return $UserDetails;

    }

    function getTrackIdetail($track){
        $UserDetails = "";
        $query = "SELECT * FROM updates WHERE order_id = '".$track."'";
        //  print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $UserDetails = $details['data'];
        //print_r($query);die();

        return $UserDetails;

    }

    function getLoggedInUserDetails($track){
        $query = "SELECT * FROM main_table WHERE tracking_no = '$track'";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            $row = mysqli_fetch_object($result);
            return $row;
        }
        //  print_r($row); die();

    }

    function getdetall($track){
        $query = "SELECT * FROM main_table WHERE tracking_no = '$track'";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        //print_r($result); die();
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            $row = mysqli_fetch_object($result);
            // print_r($row); die();
            return $row;
        }
        //   print_r($row); die();

    }



    function getLoggeddepositDetails($depositid){
        $query = "SELECT * FROM deposit_tb WHERE deposit_id = '$depositid'";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            $row = mysqli_fetch_object($result);
            return $row;
        }

    }
    function getId($id){
        $query = "SELECT * FROM main_table WHERE main_id = '$id'";
        $details = $this->runMysqliQuery($query);
        // print_r($details); die();

        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            $row = mysqli_fetch_object($result);
            // print_r($row); die();
            return $row;
        }
        // print_r($query); die();

    }

    function getIdupdate($id){
        $query = "SELECT * FROM updates WHERE id = '$id'";
        $details = $this->runMysqliQuery($query);
        // print_r($details); die();

        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            $row = mysqli_fetch_object($result);
            // print_r($row); die();
            return $row;
        }
        // print_r($query); die();

    }


    function editOrder()
    {
        $track_point =  mysqli_real_escape_string($this->dbConnection, $_POST['track_point']);
        $sender_fullname  = mysqli_real_escape_string($this->dbConnection, $_POST['sender_fullname']);
        $package_name= mysqli_real_escape_string($this->dbConnection, $_POST['package_name']);
        $package_desc  = mysqli_real_escape_string($this->dbConnection, $_POST['package_desc']);
        $package_weight = mysqli_real_escape_string($this->dbConnection, $_POST['package_weight']);
        $sender_phone  = mysqli_real_escape_string($this->dbConnection, $_POST['sender_phone']);
        $sender_email  = mysqli_real_escape_string($this->dbConnection, $_POST['sender_email']);
        $sender_country  = mysqli_real_escape_string($this->dbConnection, $_POST['sender_country']);
        $reciever_fullname  = mysqli_real_escape_string($this->dbConnection, $_POST['reciever_fullname']);
        $reciever_email= mysqli_real_escape_string($this->dbConnection, $_POST['reciever_email']);
        $reciever_address  = mysqli_real_escape_string($this->dbConnection, $_POST['reciever_address']);
        $amount_charged_for_shipment = mysqli_real_escape_string($this->dbConnection, $_POST['amount_charged_for_shipment']);
        $discount = mysqli_real_escape_string($this->dbConnection, $_POST['discount']);
        $tax = mysqli_real_escape_string($this->dbConnection, $_POST['tax']);
        $date_of_arrival = mysqli_real_escape_string($this->dbConnection, $_POST['date_of_arrival']);
    
        $reciever_phone_no = mysqli_real_escape_string($this->dbConnection, $_POST['reciever_phone_no']);
        $decription_of_bill = mysqli_real_escape_string($this->dbConnection, $_POST['decription_of_bill']);
        $custormer_will_pay = 'no';
         if(isset($_POST['custormer_will_pay'])){
             $custormer_will_pay = 'yes';
         }
        $userId = mysqli_real_escape_string($this->dbConnection, $_POST['come']);

          $thingsToValidate = [
            $track_point.'|Frack_point|track_point|empty',
            $sender_fullname.'|Sender_fullname|sender_fullname|empty',
            $package_name.'|Package_name|package_name|empty',
            $package_desc.'|Package_desc|package_desc|empty',
            $package_weight.'|Package_weight|package_weight|empty',
            $sender_phone.'|Sender_phone|sender_phone|empty',
            $sender_email.'|Sender_email|sender_email|empty',
            $sender_country.'|Sender_country|sender_country|empty',
            $reciever_fullname.'|Reciever_fullname|reciever_fullname|empty',
            $reciever_email.'|Reciever_email|reciever_email|empty',
            $reciever_address.'|Reciever_address|reciever_address|empty',
            $amount_charged_for_shipment.'|Amount_charged_for_shipment|amount_charged_for_shipment|empty',
            $discount.'|Discount|discount|empty',
            $tax.'|Tax|tax|empty',
            $date_of_arrival.'|Date_of_arrival|date_of_arrival|empty',
            $reciever_phone_no.'|Reciever_phone_no|reciever_phone_no|empty',
            $decription_of_bill.'|Decription_of_bill|decription_of_bill|empty',
            $custormer_will_pay.'|Custormer_will_pay|custormer_will_pay|empty',
        ];
        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false){
            $_SESSION['formError'] = $this->errors;
            header("location:../edit_order.php?id=$userId");
            return;
        }


        $query = "UPDATE main_table SET track_point = '".$track_point."',sender_fullname = '$sender_fullname',package_name = '$package_name',package_desc = '$package_desc',package_weight = '$package_weight',sender_phone = '$sender_phone',sender_email = '$sender_email',sender_country = '$sender_country',reciever_fullname = '$reciever_fullname',reciever_email = '$reciever_email',reciever_address = '$reciever_address',amount_charged_for_shipment = '$amount_charged_for_shipment',discount = '$discount',tax = '$tax',date_of_arrival = '$date_of_arrival',reciever_phone_no = '$reciever_phone_no',decription_of_bill = '$decription_of_bill',custormer_will_pay = '$custormer_will_pay' WHERE main_id = '$userId'";
        $updateDetails = $this->runMysqliQuery($query);
        if($updateDetails['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $updateDetails['error']]];
            header("location:../admin/rean.php");
            return;
        }
        header ("location:../edit_order.php?id=$userId&success=Profile was updated successfully");
    }



    function createUpdate(){
        $current_location = $_SESSION['current_location'] = mysqli_real_escape_string($this->dbConnection, $_POST['current_location']);
        $time_of_arrival = $_SESSION['time_of_arrival'] = mysqli_real_escape_string($this->dbConnection, $_POST['time_of_arrival']);
        $time_of_departure = $_SESSION['time_of_departure'] = mysqli_real_escape_string($this->dbConnection, $_POST['time_of_departure']);
        $update_tax = $_SESSION['update_tax'] = mysqli_real_escape_string($this->dbConnection, $_POST['update_tax']);
        $update_discount = $_SESSION['update_discount'] = mysqli_real_escape_string($this->dbConnection, $_POST['update_discount']);
        $update_amount_charged_for_shipment = $_SESSION['update_amount_charged_for_shipment'] = mysqli_real_escape_string($this->dbConnection, $_POST['update_amount_charged_for_shipment']);
        $current_status = $_SESSION['current_status'] = mysqli_real_escape_string($this->dbConnection, $_POST['current_status']);
        $comments = $_SESSION['comments'] = mysqli_real_escape_string($this->dbConnection, $_POST['comments']);
        $userId = $_SESSION['come'] = mysqli_real_escape_string($this->dbConnection, $_POST['come']);
        $decription_of_bill = $_SESSION['decription_of_bill'] = mysqli_real_escape_string($this->dbConnection, $_POST['decription_of_bill']);
        $custormer_will_pay = 'no';
         if(isset($_POST['custormer_will_pay'])){
             $custormer_will_pay = 'yes';
         }
 
         $thingsToValidate = [
             $current_location.'|Current_location|current_location',
             $time_of_arrival.'|Time_of_arrival|time_of_arrival',
             $time_of_departure.'|Time_of_departure|time_of_departure',
             $update_tax.'|Update_tax|update_tax|empty',
             $update_discount.'|Update_discount|update_discount',
             $update_amount_charged_for_shipment.'|Update_amount_charged_for_shipment|update_amount_charged_for_shipment',
             $current_status.'|Current_status|current_status',
             $comments.'|Comments|comments',
             $decription_of_bill.'|Decription_of_bill|decription_of_bill',
             $custormer_will_pay.'|Custormer_will_pay|custormer_will_pay',
         ];
         $validationStatus = $this->callValidation($thingsToValidate);
         if($validationStatus === false){
             $_SESSION['formError'] = $this->errors;
              print_r( $_SESSION['formError']); die();
             header('location:../update_order.php');
             return;
         }
         //    print_r($thingsToValidate); die();
         // print_r($r); die();
 
        //  $tracking_no = $this->createUniqueID('main_table', 'tracking_no');
        //  $_SESSION['tracking_no'] = $tracking_no;
 
 
         $createuse = $this->insertIntoTable($current_location,$time_of_arrival,$time_of_departure,$update_tax,$update_discount,$update_amount_charged_for_shipment,$current_status,$comments,$decription_of_bill,$custormer_will_pay,$userId);
        //   print_r($createuse); die();
             if ($createuse['error_code'] == 1){
             $_SESSION['formError']=['general_error' =>[$createuse['error']] ];
             header('location:../update_order.php');
             return;
         }
 
         if ($createuse){
             $to  = $email;
             $d = date('Y');
             $subject = "Welcome To Everledgerminers";
             $message = '
                                 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                 <html xmlns="http://www.w3.org/1999/xhtml">
                                 <head>
                                 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                 </head>
                                 <body>
                     <h6 align="center"><img src="https://www.everledgerminers.com/images/rr.png" alt="everledgerminers "/></h6>
                     <div style="font-size: 14px;">
                     <p>Welcome and congratulations on joining everledgerminers; Your account has been confirmed. You can now <a href="https://www.everledgerminers.com/login.php">Login</a> to your account using your registered password.<br>
                         Get ready to participate in profitable investment!.</p>
                     <p style="">Thanks!</p>
                     <p style="color:#332E2E">Best Regard<br />
                     everledgerminers Team<br />
                     Email: support@everledgerminers1@gmail.com<br /></p>
                 
             <div style="background-color:rgb(253, 150, 26);
                         float:left;
                         width:80%;
                         border:1px solid rgb(253, 150, 26);
                         border-radius:0px 0px 3px 3px;
                         padding-left:10% ;
                         padding-right:10% ;
                         padding-top:30px ;
                         padding-bottom:30px ;
                         font-family: \'Roboto\', sans-serif;" class="footer">
                         everledgerminers.<br>
                 located at 150 Minories,<br>
                 Tower, london EC3N,<br>
                 United kingdom.
             </div>
             <p style="float:left;
             width:100%;
             text-align:center;
             font-family: \'Roboto Condensed\', sans-serif;
             ">&copy;everledgerminers <?php print ' . $d . ';?>. All Rights Reserved.</p>
         </div>
         </body>
         </html>';
             $header = "MIME-Version: 1.0" . "\r\n";
             $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
             $header .= 'From: everledgerminers <support@everledgerminers.com>' . "\r\n";
             $retval = @mail($to,$subject, $message, $header);
             if ($retval = true) {
                 header('location:../update_order.php?id=$userId&success=update was successful');
                 // header("location:login.php");
             }else {
                 return  'Internal error. Mail fail to send';
             }
             header('location:../update_order.php?id=$userId&success=update was successful');
         }
         $to  = 'everledgerminers1@gmail.com';
         $d = date('Y');
         $subject = "Welcome To Everledgerminers";
         $message = '
                 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                 <html xmlns="http://www.w3.org/1999/xhtml">
                 <head>
                 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                 </head>
                 <body>
     <h6 align="center"><img src="https://www.everledgerminers.com/images/rr.png" alt="everledgerminers "/></h6>
     <div style="font-size: 14px;">
     <p>'.$username.'. has Successfully Register on Everledgerminers.</p>
     <p style="">Thanks For Your Compliance!</p>
     <p style="color:#332E2E">Best Regard<br />
     Everledgerminers1 Team<br />
     Email: support@everledgerminers1@gmail.com<br /></p>
 
 <div style="background-color:rgb(253, 150, 26);
         float:left;
         width:80%;
         border:1px solid rgb(253, 150, 26);
         border-radius:0px 0px 3px 3px;
         padding-left:10% ;
         padding-right:10% ;
         padding-top:30px ;
         padding-bottom:30px ;
         font-family: \'Roboto\', sans-serif;" class="footer">
         Everledgerminers.<br>
 located at 150 Minories,<br>
 Tower, london EC3N,<br>
  United kingdom.
 </div>
 <p style="float:left;
 width:100%;
 text-align:center;
 font-family: \'Roboto Condensed\', sans-serif;
 ">&copy;Everledgerminers <?php print ' . $d . ';?>. All Rights Reserved.</p>
 </div>
 </body>
 </html>';
         $header = "MIME-Version: 1.0" . "\r\n";
         $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
         $header .= 'From: everledgerminers <support@everledgerminers.com>' . "\r\n";
         $retval = @mail('everledgerminers1@gmail.com', $subject, $message, $header);
         if ($retval = true) {
             header("location:../update_order.php?come=$users_unique_id");
         } else {
             return  'Internal error. Mail fail to send';
         }
         header("location:../update_order.php?id=$userId&success=update was successful");
         if ($createuse){
             $dsr = "SELECT * FROM users WHERE ref_id = '$ref_id'";
             $resu = $this->runMysqliQuery($dsr);
             if($resu['error_code'] == 1){
                 return $resu['error'];
             }
             $resul = $resu['data'];
             if(mysqli_num_rows($resul) > 0) {
                 while($row = mysqli_fetch_assoc($resul)){
                     $r = $row['referral'];
                 }
             }
             $dsrs = "SELECT * FROM users WHERE ref_id = '$r'";
             $resus = $this->runMysqliQuery($dsrs);
             if($resus['error_code'] == 1){
                 return $resus['error'];
             }
             $result = $resus['data'];
             if(mysqli_num_rows($result) == 0){
                 return 'no';
             }else{
                 while($row = mysqli_fetch_array($result)){
                     $refemail = $row['email'];
                     $refname = $row['username'];
                 }
                 $to  = $refemail;
                 $d = date('Y');
                 $subject = "Welcome To Everledgerminers";
                 $message = '
                                 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                 <html xmlns="http://www.w3.org/1999/xhtml">
                                 <head>
                                 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                 </head>
                                 <body>
                     <h6 align="center"><img src="https://www.everledgerminers.com/images/rr.png" alt="verdienenglobal "/></h6>
                     <div style="font-size: 14px;">
                     <p>Hello '.$refname.' <br>
                         You Reffered : '.$fullname.' <br> you will receive 5% each time he makes a deposit.</p>
                     <p style="">Thanks!</p>
                     <p style="color:#332E2E">Best Regard<br />
                     everledgerminers Team<br />
                     Email: support@everledgerminers1.com<br /></p>
 
             <div style="background-color:rgb(253, 150, 26);
                         float:left;
                         width:80%;
                         border:1px solid rgb(253, 150, 26);
                         border-radius:0px 0px 3px 3px;
                         padding-left:10% ;
                         padding-right:10% ;
                         padding-top:30px ;
                         padding-bottom:30px ;
                         font-family: \'Roboto\', sans-serif;" class="footer">
                         everledgerminers.<br>
                 located at 150 Minories,<br>
 Tower, london EC3N,<br>
  United kingdom.
             </div>
             <p style="float:left;
             width:100%;
             text-align:center;
             font-family: \'Roboto Condensed\', sans-serif;
             ">&copy;verdienenglobal . All Rights Reserved.</p>
         </div>
         </body>
         </html>';
                 $header = "MIME-Version: 1.0" . "\r\n";
                 $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                 $header .= 'From: everledgerminers <support@everledgerminers.com>' . "\r\n";
                 $retval = @mail($to, $subject, $message, $header);
                 if ($retval = true) {
                     return  'Verification Mail sent successfully?success=update was successful';
                     // header("location:login.php");
                 } else {
                     return  'Internal error. Mail fail to send';
                 }
                 header('location:../update_order.php?id=$userId&success=update was successful');
 
             }
 
         }
         header("location:../update_order.php?id=$userId&success=update was successful");
     }
 



     function edit_update_order()
     {
         $current_location  = mysqli_real_escape_string($this->dbConnection, $_POST['current_location']);
         $time_of_arrival= mysqli_real_escape_string($this->dbConnection, $_POST['time_of_arrival']);
         $time_of_departure  = mysqli_real_escape_string($this->dbConnection, $_POST['time_of_departure']);
         $comments  = mysqli_real_escape_string($this->dbConnection, $_POST['comments']);
         $update_amount_charged_for_shipment  = mysqli_real_escape_string($this->dbConnection, $_POST['update_amount_charged_for_shipment']);
         $decription_of_bill  = mysqli_real_escape_string($this->dbConnection, $_POST['decription_of_bill']);
         $update_discount  = mysqli_real_escape_string($this->dbConnection, $_POST['update_discount']);
         $update_tax  = mysqli_real_escape_string($this->dbConnection, $_POST['update_tax']);
         $current_status  = mysqli_real_escape_string($this->dbConnection, $_POST['current_status']);
         $custormer_will_pay = 'no';
          if(isset($_POST['custormer_will_pay'])){
              $custormer_will_pay = 'yes';
          }
         $userId = mysqli_real_escape_string($this->dbConnection, $_POST['come']);
 
           $thingsToValidate = [
             $current_location.'|Current_location|current_location|empty',
             $time_of_arrival.'|Ed_time_of_arrival|ed_time_of_arrival|empty',
             $time_of_departure.'|Time_of_departure|time_of_departure|empty',
             $comments.'|Comments|comments|empty',
             $update_amount_charged_for_shipment.'|Update_amount_charged_for_shipment|update_amount_charged_for_shipment|empty',
             $decription_of_bill.'|Decription_of_bill|decription_of_bill|empty',
             $update_discount.'|Update_discount|update_discount|empty',
             $update_tax.'|Update_tax|update_tax|empty',
             $current_status.'|Current_status|current_status|empty',
             $custormer_will_pay.'|Custormer_will_pay|custormer_will_pay|empty',
         ];
        //  print_r($thingsToValidate);die();
         $validationStatus = $this->callValidation($thingsToValidate);
            // print_r($query);die();
         if($validationStatus === false){
             $_SESSION['formError'] = $this->errors;
             header("location:../edit_update_order.php?id=$userId");
             return;
         }
 
 
         $query = "UPDATE updates SET current_location = '".$current_location."',arrival_time = '$time_of_arrival',depature_time = '$time_of_departure',comments = '$comments',amount_charged = '$update_amount_charged_for_shipment',decription_of_bill = '$decription_of_bill',discount = '$update_discount',tax = '$update_tax',current_status = '$current_status',custormer_will_pay = '$custormer_will_pay' WHERE id = '$userId'";

         $updateDetails = $this->runMysqliQuery($query);
         if($updateDetails['error_code'] == 1){
             $_SESSION['formError'] = ['general_error'=>[ $updateDetails['error']]];
             header("location:../edit_update_order.php");
             return;
         }
         header ("location:../edit_update_order.php?id=$userId&success=Profile was updated successfully");
     }










    function updatereff()
    {
        $username = mysqli_real_escape_string($this->dbConnection, $_POST['username']);
        $referral = mysqli_real_escape_string($this->dbConnection, $_POST['referral']);
        $ref_amount = mysqli_real_escape_string($this->dbConnection, $_POST['ref_amount']);
        $userId = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $thingsToValidate = [
            $username.'|Username|username|empty',
            $referral.'|Referral|referral|empty',
            $ref_amount.'|Ref_amount|ref_amount',
        ];

        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false){
            $_SESSION['formError'] = $this->errors;
            header('location:../admin/edit_refbouns.php');
            return;
        }


        $query = "UPDATE referral_tb SET username = '".$username."', referral = '$referral',ref_amount = '$ref_amount' WHERE referral_id = '$userId'";
        $updateDetails = $this->runMysqliQuery($query);
        if($updateDetails['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $updateDetails['error']]];
            header("location:../admin/edit_refbouns.php");
            return;
        }
        header ('location:../admin/allreferral.php?&success=Profile was updated successfully');
    }










    function updateuser()
    {
        $fullname = mysqli_real_escape_string($this->dbConnection, $_POST['fullname']);
        $username = mysqli_real_escape_string($this->dbConnection, $_POST['username']);
        $email = mysqli_real_escape_string($this->dbConnection, $_POST['email']);
        $number = mysqli_real_escape_string($this->dbConnection, $_POST['number']);
        $userId = mysqli_real_escape_string($this->dbConnection, $_POST['come']);

        $thingsToValidate = [
            $fullname.'|FullName|fullname|empty',
            $username.'|Username|username|empty',
            $email.'|Email|email|empty',
            $number.'|Number|number|empty',
        ];

        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false){
            $_SESSION['formError'] = $this->errors;
            header('location:../users/profile.php');
            return;
        }


        $query = "UPDATE users SET fullname = '$fullname', username = '".$username."', email = '$email',number = '$number' WHERE users_unique_id = '$userId'";
        $updateDetails = $this->runMysqliQuery($query);
        if($updateDetails['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $updateDetails['error']]];
            header("location:../users/profile.php");
            return;
        }
        header ('location:../users/profile.php?&success=Profile was updated successfully');
    }

    function updateuserss()
    {
        $country = mysqli_real_escape_string($this->dbConnection, $_POST['country']);
        $state = mysqli_real_escape_string($this->dbConnection, $_POST['state']);
        $city = mysqli_real_escape_string($this->dbConnection, $_POST['city']);
        $postal = mysqli_real_escape_string($this->dbConnection, $_POST['postal']);
        $userId = mysqli_real_escape_string($this->dbConnection, $_POST['come']);

        $thingsToValidate = [
            $country.'|Country|country|empty',
            $state.'|State|state|empty',
            $city.'|City|city|empty',
            $postal.'|Postal|postal|empty',
        ];

        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false){
            $_SESSION['formError'] = $this->errors;
            header('location:../users/mark.php');
            return;
        }


        $query = "UPDATE users SET country = '$country', state = '".$state."', city = '$city',postal = '$postal' WHERE users_unique_id = '$userId'";
        $updateDetails = $this->runMysqliQuery($query);
        if($updateDetails['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $updateDetails['error']]];
            header("location:../users/mark.php");
            return;
        }
        header ('location:../users/mark.php?&success=Profile was updated successfully');
    }



    function allreferral(){
        $UserDetails = [];
        $query = "SELECT * FROM referral_tb	";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }
    function url(){
        $url = "https://blockchain.info/stats?format=json";
        $stats = file_get_contents($url);
        $json = json_decode($stats,true);
        $btcvalum = $json['market_price_usd'];
        $_SESSION['btc_value'] = $btcvalum;
        return $btcvalum;
    }
     function BTC($amount){
         $btcValue = $this->url();
         $currBTC = $amount / $btcValue;
         return $currBTC;
     }
    function deposit()
    {
        $plan = $_SESSION['plan'] = mysqli_real_escape_string($this->dbConnection, $_POST['plan']);
        $username = $_SESSION['username'] = mysqli_real_escape_string($this->dbConnection, $_POST['username']);
        $amount = $_SESSION['amount'] = mysqli_real_escape_string($this->dbConnection, $_POST['amount']);

        $thingsToValidate = [
            $plan . '|Plan|plan|empty',
            $username . '|Username|username|empty',
            $amount . '|Amount|amount|empty',

        ];
        //     print_r($thingsToValidate);die();

        $validationStatus = $this->callValidation($thingsToValidate);
        if ($validationStatus === false) {
            $_SESSION['formError'] = $this->errors;
            header('location:../users/deposit.php');
            return;
        }
         
        $deposit_id = $this->createUniqueID('deposit_tb', 'deposit_id');
        $ref_id = $_SESSION['userRef_id'];
        $bal = $_SESSION['balance'];
        $r = $_SESSION['Ref'];
        $users_unique_id = $_SESSION['userUniqueId'];
        $email = $_SESSION['userEmail'];
        
        if($plan === 'Beginners Plan'  &&( $amount > 999 ||  $amount < 50) ){
            $_SESSION['formError'] = ['general_error'=>['Please Amount should be between $50-$999']];
            header('location:../users/deposit.php');
            return;
    }
        if($plan === 'Advanced Plan'  && ($amount > 9999 ||  $amount < 1000)){
            $_SESSION['formError'] = ['general_error'=>['Please Amount should be between $1000-$9999']];
            header('location:../users/deposit.php');
            return;
    }
        if($plan === 'Promotion Plan'  && ($amount > 6000 ||  $amount < 3000)){
            $_SESSION['formError'] = ['general_error'=>['Please Amount should be between $3000-$6000']];
            header('location:../users/deposit.php');
             return;
    }
         if($plan === 'Professional Plan'  && ($amount < 10000)){
            $_SESSION['formError'] = ['general_error'=>['Please Amount should be between $10000-Unlimted Amount']];
            header('location:../users/deposit.php');
             return;
    }

        $query = "INSERT INTO deposit_tb (id,users_unique_id,deposit_id,username,email,plan,referral,ref_id,amount)VALUES(null,'" . $users_unique_id . "','" . $deposit_id . "','" . $username . "','" . $email . "','".$plan."','" . $r . "','" . $ref_id . "','" . $amount . "') ";
        $results = $this->runMysqliQuery($query);
        //print_r($result);die();
        if ($results['error_code'] == 1) {
            $_SESSION['formError'] = ['general_error' => [$results['error']]];
            header('location:../users/deposit.php');
            return;
        }


        if ($results) {
            $to  = $email;
            $d = date('Y');
            $ego = $amount;
            $subject = "Deposited To Everledgerminers";
            $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
    <h6 align="center"><img src="https://www.everledgerminers.com/images/rr.png" alt="verdienenglobal"/></h6>
    <div style="font-size: 14px;">
    <p>Hello '.$username.' You have Successfully Deposited  amount of $ '.$ego.', You are meant to copy the wallet address showing on your Dashboard and deposite the Amount equivalent so that your transaction can be confirmed and your Interest can start Accruing.</p>
    <p style="color:#332E2E">Best Regard<br />
    everledgerminers Team<br />
    Email: support@everledgerminers.com<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        everledgerminers.<br>
located at 150 Minories,<br>
Tower, london EC3N,<br>
United kingdom.
</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;everledgerminers <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: everledgerminers <support@everledgerminers.com>' . "\r\n";
            $retval = @mail($to, $subject, $message, $header);
            if ($retval = true) {
                header("location:../users/depositprofile.php?de=$deposit_id");
            } else {
                return  'Internal error. Mail fail to send';
            }
            header("location:../users/depositprofile.php?de=$deposit_id");
        }
        $to  = 'everledgerminers1@gmail.com';
        $d = date('Y');
        $use = $username;
        $ego = $amount;
        $subject = "Deposited To Everledgerminers";
        $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
    <h6 align="center"><img src="https://www.everledgerminers.com/images/rr.png" alt="everledgerminers "/></h6>
    <div style="font-size: 14px;">
    <p>'.$username.'. has Successfully Deposited on everledgerminers amount is $ '.$ego.',.</p>
    <p style="">Thanks For Your Compliance!</p>
    <p style="color:#332E2E">Best Regard<br />
    everledgerminers Team<br />
    Email: support@everledgerminers1@gmail.com<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        everledgerminers.<br>
located at 150 Minories,<br>
Tower, london EC3N,<br>
United kingdom.
</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;everledgerminers <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $header .= 'From: everledgerminers <support@everledgerminers.com>' . "\r\n";
        $retval = @mail('everledgerminers1@gmail.com', $subject, $message, $header);
        if ($retval = true) {
            header("location:../users/depositprofile.php?de=$deposit_id");
        } else {
            return  'Internal error. Mail fail to send';
        }



        header("location:../users/depositprofile.php?de=$deposit_id");

    }
     function allwithdrawbonus(){
        $UserDetails = [];
        $query = "SELECT * FROM with_bonus";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }

    
     function GetfName($userId){
        $query = "SELECT * FROM users WHERE users_unique_id = '$userId'";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return [
                'count'=>0,
                'data'=>[]
            ];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return [
                'count'=>0,
                'data'=>[]
            ];
        }else{
            while($row = mysqli_fetch_array($result)){
                $r = $row['referral'];
            }
                $dsr = "SELECT * FROM users WHERE ref_id = '$r'";
             //   print_r($dsr);die();
                $resu = $this->runMysqliQuery($dsr);
                if($resu['error_code'] == 1){
                    return [
                        'count'=>0,
                        'data'=>[]
                    ];
                }
                $resul = $resu['data'];
                if(mysqli_num_rows($resul) > 0) {
                    while($rows = mysqli_fetch_assoc($resul)){
                       $refObject = $rows;
                    }
                    return [
                        'count'=>mysqli_num_rows($resul),
                        'data'=>$refObject
                    ];
                }
                //   print_r($username);die();
            return [
                'count'=>0,
                'data'=>[]
            ];
        }
    }


    function deycounter(){
        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' AND day_counter < 360";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
                $id = $row['id'];
                // print_r($row);die();
                $day_on = date('D');
                $count_value = $row['day_counter'];
                $new_countValue = $count_value + 1;
                $querys = "UPDATE deposit_tb SET day_counter = '".$new_countValue."' WHERE id = '".$id."' AND status = 'confirmed' AND day_counter < 360 ";
                $details = $this->runMysqliQuery($querys);

                if($details['error_code'] == 1){
                    $_SESSION['formError'] = ['general_error'=>[ $details['error'] ] ];
                    header("location:../counter.php");
                    return;
                }

                //header("location:../counter.php?success=deycounter one is successful");

            }
        }

    }
    function BuilderPlain(){
        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' AND day_counter < 8 AND plan = 'Beginners Plan'";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
                $id = $row['id'];
                $day_on = date('D');
                $interest = $row['interest'];
                $amount = $row['amount'];
                $plan = $row['plan'];
                $dayInt = ($amount/100)*4;
                $main_interest =  $interest + $dayInt;
                $querys = "UPDATE deposit_tb SET interest = '".$main_interest."' WHERE id = '".$id."'";
                $details = $this->runMysqliQuery($querys);//run the query

                if($details['error_code'] == 1){
                    $_SESSION['formError'] = ['general_error'=>[ $details['error'] ] ];
                    header("location:../counter.php");
                    return;
                }
                // header("location:../counter.php?success=premiunplan one is successful");

            }
        }

    }

    function SilverPlain(){
        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' AND day_counter < 8 AND plan = 'Advanced Plan'";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 0;
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
                $id = $row['id'];
                $day_on = date('D');
                $interest = $row['interest'];
                $amount = $row['amount'];
                $plan = $row['plan'];
                $dayInt = ($amount/100)*8;
                $main_interest =  $interest + $dayInt;
                $querys = "UPDATE deposit_tb SET interest = '".$main_interest."' WHERE id = '".$id."'";
                $details = $this->runMysqliQuery($querys);//run the query

                if($details['error_code'] == 1){
                    $_SESSION['formError'] = ['general_error'=>[ $details['error'] ] ];
                    header("location:../counter.php");
                    return;
                }
                // header("location:../counter.php?success=premiunplan one is successful");

            }
        }

    }

    function DiamondPlain(){
        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' AND day_counter < 8 AND plan = 'Promotion Plan'";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
                $id = $row['id'];
                $day_on = date('D');
                $interest = $row['interest'];
                $amount = $row['amount'];
                $plan = $row['plan'];
                $dayInt = ($amount/100)*15;
                $main_interest =  $interest + $dayInt;
                $querys = "UPDATE deposit_tb SET interest = '".$main_interest."' WHERE id = '".$id."'";
                $details = $this->runMysqliQuery($querys);//run the query

                if($details['error_code'] == 1){
                    $_SESSION['formError'] = ['general_error'=>[ $details['error'] ] ];
                    header("location:../counter.php");
                    return;
                }
                // header("location:../counter.php?success=premiunplan one is successful");

            }
        }

    }

    function UltimatePlain(){
        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' AND day_counter < 8 AND plan = 'Professional Plan'";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
                $id = $row['id'];
                $day_on = date('D');
                $interest = $row['interest'];
                $amount = $row['amount'];
                $plan = $row['plan'];
                $dayInt = ($amount/100)*12;
                $main_interest =  $interest + $dayInt;
                $querys = "UPDATE deposit_tb SET interest = '".$main_interest."' WHERE id = '".$id."'";
                $details = $this->runMysqliQuery($querys);//run the query

                if($details['error_code'] == 1){
                    $_SESSION['formError'] = ['general_error'=>[ $details['error'] ] ];
                    header("location:../counter.php");
                    return;
                }
                // header("location:../counter.php?success=premiunplan one is successful");

            }
        }

    }

  
    
    function ref(){
        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' AND ref = 0";
        $details = $this->runMysqliQuery($query);//run the query
        // print_r($details);die();
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)){
                $username = $row['username'];
                $users_unique_id = $row['users_unique_id'];
                $plan = $row['plan'];
                $coin_type = $row['coin_type'];
                $amount = $row['amount'];
                $r = $row['referral'];
                $ref_id = $row['ref_id'];
                if ($r != "non"){

                    if ($plan == 'Beginners Plan' ){
                        $amo = ($amount/100)*5;
                    }elseif ($plan == 'Advanced Plan' ){
                        $amo = ($amount/100)*5;
                    }elseif ($plan == 'Promotion Plan' ){
                        $amo = ($amount/100)*5;
                    }elseif ($plan == 'Professional Plan' ){
                        $amo = ($amount/100)*5;
                    }

                    $a = $amo;

                    $referral_id = $this->createUniqueID('referral_tb', 'referral_id');

                    $querys = "INSERT INTO referral_tb (id,referral_id,users_unique_id,plan,amount,referral,ref_id,ref_amount,username) VALUES (null,  '".$referral_id."','".$users_unique_id."','".$plan."','".$amount."', '".$r."', '".$ref_id."', '".$a."','".$username."')";
                    $resultss = $this->runMysqliQuery($querys);
                    if ($resultss['error_code'] == 1) {
                        $_SESSION['formError'] = ['general_error' => [$resultss['error']]];
                        header('location:../users/counter.php');
                        return;
                    }
//                    print_r($resultss);die();
                    if ($resultss){
                        $naw = 1;
                        $quer = "UPDATE deposit_tb SET ref ='".$naw."'WHERE referral = '".$r."'  AND  plan = '".$plan."'";
                        $results = $this->runMysqliQuery($quer);
                        if($results['error_code'] == 1){
                            return $results['error'];
                        }
                    }
                    //  header("location:../users/counter.php?success");
                }
            }
        }
    }

    function countref(){
        $query = "SELECT * FROM users";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_array($result); $i++) {
                $ref_id = $row['ref_id'];
                $users_unique_id = $row['users_unique_id'];
                $querys = "SELECT COUNT(ref) FROM deposit_tb WHERE referral = '".$ref_id."'";
                //    print_r($querys);die();
                $detail = $this->runMysqliQuery($querys);//run the query
                if($detail['error_code'] == 1){
                    return $detail['error'];
                }
                $resul = $detail['data'];
                //   print_r($resul);die();
                if(mysqli_num_rows($resul) == 0) {
                    return 'No Data was returned';
                }
                if($resul){
                    //  print_r($resul);die();
                    for ($i=0; $ro = mysqli_fetch_array($resul); $i++) {
                        $amount = $ro[0];
                        $quers = "UPDATE users SET num_ref ='".$amount."' WHERE users_unique_id  = '".$users_unique_id."'" ;
                        $detai = $this->runMysqliQuery($quers);//run the query
                        if($detai['error_code'] == 1){
                            $_SESSION['formError'] = ['general_error'=>[ $detai['error'] ] ];
                            header("location:../counter.php");
                            return;
                        }
                    }
                }
            }
        }
    }

    function counrff($userId){
        $query = "SELECT * FROM users  WHERE users_unique_id = '".$userId."'";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else {
            while ($row = mysqli_fetch_array($result)) {
                $ref_id = $row['ref_id'];
                $dsr = "SELECT COUNT(referral) FROM users WHERE referral = '$ref_id'";
                $resu = $this->runMysqliQuery($dsr);
                if($resu['error_code'] == 1){
                    return $resu['error'];
                }
                $resul = $resu['data'];
                if(mysqli_num_rows($resul) > 0) {
                    while ($row = mysqli_fetch_array($resul)) {
                        $output = $row[0];
                        //         print_r($output);die();
                    }
                    return $output;
                }
            }
        }
    }

    function counrffactive($userId){
        $query = "SELECT * FROM users  WHERE users_unique_id = '".$userId."'";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else {
            while ($row = mysqli_fetch_array($result)) {
                $ref_id = $row['ref_id'];
                $dsr = "SELECT COUNT(referral) FROM deposit_tb WHERE referral = '$ref_id' AND status = 'confirmed'";
                //  print_r($dsr);die();
                $resu = $this->runMysqliQuery($dsr);
                if($resu['error_code'] == 1){
                    return $resu['error'];
                }
                $resul = $resu['data'];
                if(mysqli_num_rows($resul) > 0) {
                    while ($row = mysqli_fetch_array($resul)) {
                        $output = $row[0];
                        //         print_r($output);die();
                    }
                    return $output;
                }
            }
        }
    }

    function reinvest(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);
        $option = trim($_GET['option']);
        if($option === 'upgrate'){
        $query = "SELECT * FROM deposit_tb WHERE deposit_id = '$user_id'";
        $message = "your are successfully Re_invest";
    }
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
                $id = $row['id'];
                $amount = $row['amount'];
                $interest = $row['interest'];
                $day_counter = $row['day_counter'];
            }
        $querys = "UPDATE deposit_tb SET amount = '".$interest."',interest = 0, day_counter = 0 WHERE deposit_id = '".$user_id."'";
       // print_r($querys);die();
        $detailss = $this->runMysqliQuery($querys);
       //print_r($detailss);die();
        if($detailss['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $detailss['error'] ] ];
            header("location:../users/button_reinvest.php?success");
            return;
    }
    header("location:../users/no_button_invest.php?success=$message");
   }
}


function withdrawAmount(){
    $wallet= $_SESSION['wallet']=mysqli_real_escape_string($this->dbConnection, $_POST['wallet']);
    $coin= $_SESSION['coin']=mysqli_real_escape_string($this->dbConnection, $_POST['coin']);
    $amount= $_SESSION['amount']=mysqli_real_escape_string($this->dbConnection, $_POST['amount']);
    $userId= $_SESSION['userId']=mysqli_real_escape_string($this->dbConnection, $_POST['userId']);

    $thingsToValidate = [
        $wallet.'|Wallet|wallet|empty',
        $coin.'|Coin|coin|empty',
        $amount.'|Amount|amount|empty',
    ];

    $validationStatus = $this->callValidation($thingsToValidate);
    if($validationStatus === false) {
        $_SESSION['formError'] = $this->errors;
        header('location:../users/withdrawamount.php');
        return;
    }

    $drawal_deposit_id= $this->createUniqueID('with_amount', 'withdraw_id');
    $users_unique_id = $_SESSION['userUniqueId'];
    $username = $_SESSION['userUsername'];
    $email = $_SESSION['userEmail'];

    $query = "SELECT * FROM deposit_tb WHERE deposit_id = '".$userId."'";
    $details = $this->runMysqliQuery($query);//run the query
    if($details['error_code'] == 1){
        return $details['error'];
    }
    $result = $details['data'];
    if(mysqli_num_rows($result) == 0) {
        return 'No Data was returned';
    }
    if($result){
        for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
            $deposit_id = $row['deposit_id'];
            $plan = $row['plan'];
            $day_counter = $row['day_counter'];
            $bal = $row['amount'];
       //   print_r($day_counter);die();
    }
}
   if(($plan === 'Builder Plan' && $day_counter >= 5) ||  ($plan === 'Silver Plan' && $day_counter >= 7) ||  ($plan === 'Diamond Plan' && $day_counter >= 10) ||  ($plan === 'Ultimate Plan' && $day_counter >= 14) ||  ($plan === 'Business Plan' && $day_counter >= 21)){
    $querys = "INSERT INTO with_amount (id,withdraw_id,users_unique_id,username,email,wallet,coin_type,amount)VALUES(null,'".$drawal_deposit_id."','".$users_unique_id."','".$username."','".$email."','".$wallet."','".$coin."','".$amount."') ";
    $resul = $this->runMysqliQuery($querys);
    //  print_r($result);die();

    if($resul['error_code'] == 1){
        $_SESSION['formError'] = ['general_error'=>[ $resul['error'] ] ];
        header('location:../users/withdrawamount.php');
        return;
    }
    $dequery = "SELECT * FROM deposit_tb  WHERE deposit_id = '$deposit_id'";
    $dedetails = $this->runMysqliQuery($dequery);
    if($dedetails['error_code'] == 1){
        return $dedetails['error'];
    }
    $deresult = $dedetails['data'];
    if(mysqli_num_rows($deresult) == 0){
        return 'No Data was returned';
    }if($deresult){
        for ($i=0; $rows = mysqli_fetch_assoc($deresult); $i++){
            $interest  = $rows['amount'];
        }
        $int = ($bal - $amount);
        $quers = "UPDATE deposit_tb SET amount ='".$int."' WHERE deposit_id  = '".$deposit_id."'" ;
     //   print_r($quers);die();
        $detai = $this->runMysqliQuery($quers);//run the query
        if($detai['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $detai['error'] ] ];
            header("location:../users/withdrawamount.php");
            return;
        }
    
    if ($detai) {
        $to  = $email;
        $ego = $amount;
        $d = date('Y');
        $subject = "withdraw To Everledgerminers";
        $message = '
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            </head>
            <body>
<h6 align="center"><img src="https://www.everledgerminers.com/images/rr.png" alt="everledgerminers "/></h6>
<div style="font-size: 14px;">
 <p>You have Successfully Created a withdrawal Ticket on everledgerminers  Amount $'.$ego.'., You are meant to wait for a period of 30 min so that the Money equivalent will be sent to your Wallet address on your Dashboard.</p>
<p style="">Thanks For Your Compliance!</p>
<p style="color:#332E2E">Best Regard<br />
everledgerminers Team<br />
Email: support@everledgerminers1@gmail.com<br /></p>

<div style="background-color:rgb(253, 150, 26);
    float:left;
    width:80%;
    border:1px solid rgb(253, 150, 26);
    border-radius:0px 0px 3px 3px;
    padding-left:10% ;
    padding-right:10% ;
    padding-top:30px ;
    padding-bottom:30px ;
    font-family: \'Roboto\', sans-serif;" class="footer">
    everledgerminers.<br>
located at 150 Minories,<br>
Tower, london EC3N,<br>
United kingdom.
</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;everledgerminers <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $header .= 'From: everledgerminers <support@everledgerminers.com>' . "\r\n";
        $retval = @mail($to, $subject, $message, $header);
        if ($retval = true) {
            header("location:../users/withdrawamount.php?success=withdrawal was successful");
        } else {
            return  'Internal error. Mail fail to send';
        }
        header("location:../users/withdrawamount.php?success=withdrawal was successful");
        // return("Deposite Successfully");
    }
    $to  = 'everledgerminers1@gmail.com';
    $d = date('Y');
    $use = $username;
    $ego = $amount;
    $subject = "withdraw To Everledgerminers";
    $message = '
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            </head>
            <body>
<h6 align="center"><img src="https://www.everledgerminers.com/images/rr.png" alt="everledgerminers "/></h6>
<div style="font-size: 14px;">
 <p>'.$use.'. has Successfully Withdraw on everledgerminers amount is $'.$ego.'</p>
<p style="">Thanks For Your Compliance!</p>
<p style="color:#332E2E">Best Regard<br />
everledgerminers Team<br />
Email: support@everledgerminers1@gmail.com<br /></p>

<div style="background-color:rgb(253, 150, 26);
    float:left;
    width:80%;
    border:1px solid rgb(253, 150, 26);
    border-radius:0px 0px 3px 3px;
    padding-left:10% ;
    padding-right:10% ;
    padding-top:30px ;
    padding-bottom:30px ;
    font-family: \'Roboto\', sans-serif;" class="footer">
    everledgerminers.<br>
located at 150 Minories,<br>
Tower, london EC3N,<br>
United kingdom.
</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;everledgerminers <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
    $header = "MIME-Version: 1.0" . "\r\n";
    $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $header .= 'From: everledgerminers <support@everledgerminers.com>' . "\r\n";
    $retval = @mail('everledgerminers1@gmail.com', $subject, $message, $header);
    if ($retval = true) {
        header("location:../users/withdrawamount.php?success=withdrawal was successful");
    } else {
        return  'Internal error. Mail fail to send';
    }


    header('location:../users/withdrawamount.php?success=withdrawal was successful');
}
    }else{
        $_SESSION['formError'] = ['general_error'=>['your are not allow to withdraw']];
        header('location:../users/withdrawamount.php');
    }




}




    function withdraw(){
        $wallet= $_SESSION['wallet']=mysqli_real_escape_string($this->dbConnection, $_POST['wallet']);
        $amount= $_SESSION['amount']=mysqli_real_escape_string($this->dbConnection, $_POST['amount']);
        $userId= $_SESSION['come']=mysqli_real_escape_string($this->dbConnection, $_POST['come']);

        $thingsToValidate = [
            $wallet.'|Wallet|wallet|empty',
            $amount.'|Amount|amount|empty',
        ];

        $validationStatus = $this->callValidation($thingsToValidate);
        if ($validationStatus === false) {
            $_SESSION['formError'] = $this->errors;
            header("location:../users/btc.php?come=$userId");
            return;
        }

        $drawal_deposit_id= $this->createUniqueID('withdrawal', 'withdraw_id');
        $username = $_SESSION['userUsername'];
        $email = $_SESSION['userEmail'];

        $querys = "INSERT INTO withdrawal (id,withdraw_id,users_unique_id,username,email,wallet,amount)VALUES(null,'".$drawal_deposit_id."','".$userId."','".$username."','".$email."','".$wallet."','".$amount."') ";
        $resul = $this->runMysqliQuery($querys);
        //  print_r($result);die();

        if ($resul['error_code'] == 1) {
            $_SESSION['formError'] = ['general_error'=>[ $resul['error'] ] ];
            header('location:../users/btc.php');
            return;
        }
     
        
        if ($resul) {
            $to  = $email;
            $ego = $amount;
            $d = date('Y');
            $subject = "withdraw To everledgerminers";
            $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
    <h6 align="center"><img src="https://www.everledgerminers.com/images/rr.png" alt="everledgerminers "/></h6>
    <div style="font-size: 14px;">
     <p>You have Successfully Created a withdrawal Ticket on everledgerminers  Amount $'.$ego.'., You are meant to wait for a period of 30 min so that the Money equivalent will be sent to your Wallet address on your Dashboard.</p>
    <p style="">Thanks For Your Compliance!</p>
    <p style="color:#332E2E">Best Regard<br />
    cyptovaultinvestment Team<br />
    Email: support@everledgerminers1@gmail.com<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        everledgerminers.<br>
located at 150 Minories,<br>
Tower, london EC3N,<br>
 United kingdom.
</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;everledgerminers <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: verdienenglobal <support@verdienenglobal.com>' . "\r\n";
            $retval = @mail($to, $subject, $message, $header);
            if ($retval = true) {
                header("location:../users/btc.php?success=withdrawal was successful");
            } else {
                return  'Internal error. Mail fail to send';
            }
            header("location:../users/btc.php?success=withdrawal was successful");
            // return("Deposite Successfully");
        }
        $to  = 'everledgerminers1@gmail.com';
        $d = date('Y');
        $use = $username;
        $ego = $amount;
        $subject = "withdraw To Verdienen Global";
        $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
    <h6 align="center"><img src="https://www.everledgerminers.com/images/rr.png" alt="everledgerminers "/></h6>
    <div style="font-size: 14px;">
     <p>'.$use.'. has Successfully Withdraw on everledgerminers amount is $'.$ego.'</p>
    <p style="">Thanks For Your Compliance!</p>
    <p style="color:#332E2E">Best Regard<br />
    verdienenglobal Team<br />
    Email: support@everledgerminers1@gmail.com<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        everledgerminers.<br>
located at 150 Minories,<br>
Tower, london EC3N,<br>
 United kingdom.
</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;everledgerminers <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $header .= 'From: everledgerminers <support@everledgerminers.com>' . "\r\n";
        $retval = @mail('everledgerminers1@gmail.com', $subject, $message, $header);
        if ($retval = true) {
            header("location:../users/btc.php?success=withdrawal was successful");
        } else {
            return  'Internal error. Mail fail to send';
        }
        header("location:../users/btc.php?success=withdrawal was successful");
 

        
        
       // print_r('jhwdasjksjkak.accordion-box');die();
       /*  if(($plan === 'Silver Plan') && ($day_counter > 7)){
             $_SESSION['formError'] = ['general_error'=>['your are not allow to withdraw']];
        header('location:../users/withdraw.php');
                return;
        }
        if(($plan === 'Diamond Plan') && ($day_counter > 10)){
            header('location:../users/withdraw.php?success=your are not allow to withdraw');
                return;
        }
        if(($plan === 'Ultimate Plan') && ($day_counter < 14)){
            header('location:../users/withdraw.php?success=your are not allow to withdraw');
                return;
        }
        if(($plan === 'Business Plan') && ($day_counter < 21)){
            header('location:../users/withdraw.php?success=your are not allow to withdraw');
                return;
        }*/
        


}

function selectsinglereffbouns($userId){
    $querys = "SELECT * FROM users WHERE ref_id = '".$userId."'";
    $details = $this->runMysqliQuery($querys);//run the query
    if($details['error_code'] == 1){
        return $details['error'];
    }
    $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
        while($row = mysqli_fetch_object($result)){
            $ref_id = $row->ref_id;
        }
        $UserDetails = "";
        $dsr = "SELECT * FROM referral_tb WHERE referral = '".$ref_id."'";
        $detail = $this->runMysqliQuery($dsr);//run the query
        if($detail['error_code'] == 1){
            return $detail['error'];
        }
        $resul = $detail['data'];
      //  print_r($resul);die();
       return $resul;
       // print_r($UserDetails);die();

    }
}

    function withdrawBonus(){
        $wallet= $_SESSION['wallet']=mysqli_real_escape_string($this->dbConnection, $_POST['wallet']);
        $coin= $_SESSION['coin']=mysqli_real_escape_string($this->dbConnection, $_POST['coin']);
        $amount= $_SESSION['amount']=mysqli_real_escape_string($this->dbConnection, $_POST['amount']);
        $userId= $_SESSION['userId']=mysqli_real_escape_string($this->dbConnection, $_POST['userId']);

        $thingsToValidate = [
            $wallet.'|Wallet|wallet|empty',
            $coin.'|Coin|coin|empty',
            $amount.'|Amount|amount|empty',
        ];

        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false) {
            $_SESSION['formError'] = $this->errors;
            header('location:../users/withdraw_bonus.php');
            return;
        }
        $querys = "SELECT * FROM referral_tb WHERE referral_id = '".$userId."'";
        $details = $this->runMysqliQuery($querys);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 0;
        }else{
            while($row = mysqli_fetch_object($result)){
                $referral = $row->referral;
                $ref_amount = $row->ref_amount;
            }
            $query = "SELECT * FROM users WHERE ref_id = '".$referral."'";
            $detail = $this->runMysqliQuery($query);//run the query
            if($detail['error_code'] == 1){
                return $detail['error'];
            }
            $resul = $detail['data'];
            if(mysqli_num_rows($resul) == 0){
                return 0;
            }else{
                while($rows = mysqli_fetch_object($resul)){
                    $email = $rows->email;
                    $username = $rows->username;
                }

        $drawal_referral_id = $this->createUniqueID('with_bonus', 'withbouns_id');
    
        $int = $ref_amount - $amount;

        $queryy = "INSERT INTO with_bonus (id,withbouns_id,username,email,wallet,coin_type,amount)VALUES(null,'".$drawal_referral_id."','".$username."','".$email."','".$wallet."','".$coin."','".$amount."') ";
        $resultt = $this->runMysqliQuery($queryy);
        //  print_r($result);die();

        if($resultt['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $resultt['error'] ] ];
            header('location:../users/withdraw_bonus.php');
            return;
        }
        $quers = "UPDATE referral_tb SET ref_amount ='".$int."' WHERE referral_id = '".$userId."'" ;
     //   print_r($quers);die();
        $detai = $this->runMysqliQuery($quers);//run the query
        if($detai['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $detai['error'] ] ];
            header("location:../users/withdraw_bonus.php");
            return;
        }



        if ($resultt) {
            $to  = $email;
            $ego = $amount;
            $d = date('Y');
            $subject = "withdraw To Verdienen Global";
            $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
    <h6 align="center"><img src="https://www.verdienenglobal.com/images/IMG-20220428-WA0063.jpg" alt="verdienenglobal "/></h6>
    <div style="font-size: 14px;">
     <p>You have Successfully Created a withdrawal Ticket on verdienenglobal  Amount $'.$ego.'., You are meant to wait for a period of 30 min so that the Money equivalent will be sent to your Wallet address on your Dashboard.</p>
    <p style="">Thanks For Your Compliance!</p>
    <p style="color:#332E2E">Best Regard<br />
    verdienenglobal Team<br />
    Email: support@cryptovaultinvestment7@gmail.com<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        verdienenglobal.<br>
located at 150 Minories,<br>
Tower, london EC3N,<br>
 United kingdom.
</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;verdienenglobal <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: verdienenglobal <support@verdienenglobal.com>' . "\r\n";
            $retval = @mail($to, $subject, $message, $header);
            if ($retval = true) {
                header("location:../users/withdraw_bonus.php?success=withdrawal was successful");
            } else {
                return  'Internal error. Mail fail to send';
            }
            header("location:../users/withdraw_bonus.php?success=withdrawal was successful");
            // return("Deposite Successfully");
        }
        $to  = 'cryptovaultinvestment7@gmail.com';
        $d = date('Y');
        $use = $username;
        $ego = $amount;
        $subject = "withdraw To Verdienen Global";
        $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
    <h6 align="center"><img src="https://www.verdienenglobal.com/images/IMG-20220428-WA0063.jpg" alt="verdienenglobal "/></h6>
    <div style="font-size: 14px;">
     <p>'.$use.'. has Successfully Withdraw on verdienenglobal amount is $'.$ego.'</p>
    <p style="">Thanks For Your Compliance!</p>
    <p style="color:#332E2E">Best Regard<br />
    verdienenglobal Team<br />
    Email: support@cryptovaultinvestment7@gmail.com<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        verdienenglobal.<br>
located at 150 Minories,<br>
Tower, london EC3N,<br>
 United kingdom.
</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;verdienenglobal <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $header .= 'From: verdienenglobal <support@verdienenglobal.com>' . "\r\n";
        $retval = @mail('maxwelldemax508@gmail.com', $subject, $message, $header);
        if ($retval = true) {
            header("location:../users/withdraw_bonus.php?success=withdrawal was successful");
        } else {
            return  'Internal error. Mail fail to send';
        }


        header('location:../users/withdraw_bonus.php?success=withdrawal was successful');

    }
}
}

    
    function selectdrawatable($id){
        $UserDetails = "";
        $query = "SELECT * FROM withdrawal WHERE users_unique_id = '".$id."'AND status = 'confirmed'";
        // print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $UserDetails = $details['data'];
        //print_r($query);die();

        return $UserDetails;
    }


    function alldeposit(){
        $UserDetails = [];
        $query = "SELECT * FROM deposit_tb";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }
    function alldepositwithcom(){
        $UserDetails = [];
        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' ORDER BY id DESC LIMIT 8";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }
    function allinvest(){
        $UserDetails = [];
        $query = "SELECT * FROM deposit_tb WHERE status ='confirmed'";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    
    }

    function allwithdrawamount(){
        $UserDetails = [];
        $query = "SELECT * FROM with_amount";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }


    function allwithdraw(){
        $UserDetails = [];
        $query = "SELECT * FROM withdrawal";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }
    function allwithdrawwithcom(){
        $UserDetails = [];
        $query = "SELECT * FROM withdrawal WHERE status = 'confirmed' ORDER BY id DESC LIMIT 8";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
                //print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }


  function manageAccount(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['id']);

        $option = trim($_GET['option']);
        if($option === 'delete'){
            $query = "DELETE FROM updates WHERE id = '".$user_id."'";
            $message = "order have been deleted successfully";
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../status.php");
            return;
        }
        header("location:../status.php?success=$message");

    }
    function manageAccounts(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'block'){
            $query = "UPDATE deposit_tb	 SET status = 'pending' WHERE deposit_id = '".$user_id."'";
            $message = "User have been pending successfully";

        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/status.php");
            return;
        }
        header("location:../admin/status.php?success=$message");

    }

    function manageAccountss(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'unblock'){
            $query = "UPDATE deposit_tb	 SET status = 'confirmed' WHERE deposit_id = '".$user_id."'";
            header("location:../admin/status.php?success=Users have been confirmed successfully");

            //run the query
            $result = $this->runMysqliQuery($query);
            //print_r($result);die();
            if($result['error_code'] == 1){
                $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
                header("location:../admin/status.php?success=User have been confirmed successfully");
                return;
            }
            $select = "SELECT * FROM deposit_tb WHERE deposit_id = '".$user_id."'";
            $details = $this->runMysqliQuery($select);
            //  print_r($query);die();
            if($details['error_code'] == 1){
                return $details['error'];
            }
            $result = $details['data'];
            if(mysqli_num_rows($result) == 0) {
                return 'No Data was returned';
            }
            if($result) {
                for ($i = 0; $row = mysqli_fetch_array($result); $i++) {
                    $email = $row['email'];
                    $amount = $row['amount'];
                    $username = $row['username'];
                    $referral = $row['referral'];
                    $go = ( $amount/100)*5;
                }
                $quer = "UPDATE deposit_tb SET go = '".$go."' WHERE deposit_id = '".$user_id."' ";
                $det = $this->runMysqliQuery($quer);//run the query

                if($det['error_code'] == 1){
                    $_SESSION['formError'] = ['general_error'=>[ $det['error'] ] ];
                    header("location:../counter.php");
                    return;
                }



                $to  = $email;
                $d = date('Y');
                $ego = $amount;
                $subject = "Welcome To Everledgerminers";
                $message = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">
                                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                </head>
                                <body>
                    <h6 align="center"><img src="https://www.everledgerminers.com/images/rr.png" alt="verdienenglobal "/></h6>
                    <div style="font-size: 14px;">
					<p>Hello '.$username.'. Your Deposit of $'.$ego.'. have been confirmed</p>
					<p style="">Thanks!</p>
					<p style="color:#332E2E">Best Regard<br />
                    everledgerminers Team<br />
                    Email: support@everledgerminers1@gmail.com<br /></p>
				
			<div style="background-color:rgb(253, 150, 26);
						float:left;
						width:80%;
						border:1px solid rgb(253, 150, 26);
						border-radius:0px 0px 3px 3px;
						padding-left:10% ;
						padding-right:10% ;
						padding-top:30px ;
						padding-bottom:30px ;
						font-family: \'Roboto\', sans-serif;" class="footer">
                        everledgerminers.<br>
			located at 150 Minories,<br>
				Tower, london EC3N,<br>
                United kingdom.
			</div>
			<p style="float:left;
			width:100%;
			text-align:center;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;everledgerminers <?php print ' . $d . ';?>. All Rights Reserved.</p>
		</div>
		</body>
		</html>';
                $header = "MIME-Version: 1.0" . "\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $header .= 'From: everledgerminers <support@everledgerminers.com>' . "\r\n";
                $retval = @mail($to, $subject, $message, $header);
                if ($retval = true) {
                    return  "location:../admin/status.php?success=User have been un-blocked successfully";
                    // header("location:login.php");
                } else {
                    return   "location:../admin/status.php?success=User have been un-blocked successfully";
                }
                header("location:../admin/status.php?success=User have been un-blocked successfully");
            }
            header("location:../admin/status.php?success=User have been un-blocked successfully");

            // header("location:../admin/status.php?success=$message");

            $to  = 'everledgerminers1@gmail.com';
            $d = date('Y');
            $subject = "Welcome To Everledgerminers";
            $message = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                </head>
                <body>
    <h6 align="center"><img src="https://www.everledgerminers.com/images/rr.png" alt="verdienenglobal "/></h6>
    <div style="font-size: 14px;">
    <p>'.$username.'. deposit of .'.$ego.'. has been Successfully confirmed.</p>
    <p style="">Thanks For Your Compliance!</p>
    <p style="color:#332E2E">Best Regard<br />
    Verdienen Global Team<br />
    Email: support@everledgerminers1@gmail.com<br /></p>

<div style="background-color:rgb(253, 150, 26);
        float:left;
        width:80%;
        border:1px solid rgb(253, 150, 26);
        border-radius:0px 0px 3px 3px;
        padding-left:10% ;
        padding-right:10% ;
        padding-top:30px ;
        padding-bottom:30px ;
        font-family: \'Roboto\', sans-serif;" class="footer">
        everledgerminers.<br>
located at 150 Minories,<br>
Tower, london EC3N,<br>
 United kingdom.
</div>
<p style="float:left;
width:100%;
text-align:center;
font-family: \'Roboto Condensed\', sans-serif;
">&copy;everledgerminers <?php print ' . $d . ';?>. All Rights Reserved.</p>
</div>
</body>
</html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: everledgerminers <support@everledgerminers.com>' . "\r\n";
            $retval = @mail('everledgerminers1@gmail.com', $subject, $message, $header);
            if ($retval = true) {
                return  "location:../admin/status.php?success=User have been un-blocked successfully";
            } else {
                return  "location:../admin/status.php?success=User have been un-blocked successfully";
            }
            return  "location:../admin/status.php?success=User have been un-blocked successfully";
        }
        if($result){
            $dsrs = "SELECT * FROM users WHERE ref_id = '$referral'";
            $resus = $this->runMysqliQuery($dsrs);
            if($resus['error_code'] == 1){
                return $resus['error'];
            }
            $results = $resus['data'];
            if(mysqli_num_rows($results) == 0){
                return 'no';
            }else{
                while($row = mysqli_fetch_array($results)){
                    $refemail = $row['email'];
                    $refname = $row['username'];
                }
            





                $to  = $refemail;
                $d = date('Y');
                $subject = "Welcome To Everledgerminers";
                $message = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">
                                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                </head>
                                <body>
                    <h6 align="center"><img src="https://www.everledgerminers.com/images/rr.png" alt="verdienenglobal "/></h6>
                    <div style="font-size: 14px;">
					<p>Hello '.$refname.' <br>
						You Reffered : '.$fullname.' <br> you have  receive 10% of deposit.</p>
					<p style="">Thanks!</p>
					<p style="color:#332E2E">Best Regard<br />
                    everledgerminers Team<br />
                    Email: support@everledgerminers1.com<br /></p>

			<div style="background-color:rgb(253, 150, 26);
						float:left;
						width:80%;
						border:1px solid rgb(253, 150, 26);
						border-radius:0px 0px 3px 3px;
						padding-left:10% ;
						padding-right:10% ;
						padding-top:30px ;
						padding-bottom:30px ;
						font-family: \'Roboto\', sans-serif;" class="footer">
                        verdienenglobal.<br>
				located at 150 Minories,<br>
Tower, london EC3N,<br>
 United kingdom.
			</div>
			<p style="float:left;
			width:100%;
			text-align:center;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;everledgerminers . All Rights Reserved.</p>
		</div>
		</body>
		</html>';
                $header = "MIME-Version: 1.0" . "\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $header .= 'From: everledgerminers <support@everledgerminers.com>' . "\r\n";
                $retval = @mail($to, $subject, $message, $header);
                if ($retval = true) {
                    return  'location:../admin/status.php?success=User have been un-blocked successfully';
                    // header("location:login.php");
                } else {
                    return  'location:../admin/status.php?success=User have been un-blocked successfully';
                }
            }
            header("location:../admin/status.php?success=User have been un-blocked successfully");
        }
        header("location:../admin/status.php?success=User have been un-blocked successfully");

    }

    function managewithdraw(){
        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'deletel'){
            $query = "DELETE FROM referral_tb WHERE referral_id = '".$user_id."'";
             header("location:../admin/statuss.php?success=$message");
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statuss.php");
            return;
        }
        header("location:../admin/statuss.php?success=$message");

    }
    function managewithdra(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'pending'){
            $query = "UPDATE withdrawal SET status = 'pending' WHERE withdraw_id = '".$user_id."'";
            $message = "User have been pending successfully";

        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statuss.php");
            return;
        }
        header("location:../admin/statuss.php?success=$message");

    }
    function managewithdr(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'confirmed'){
            $query = "UPDATE withdrawal	 SET status = 'confirmed' WHERE withdraw_id = '".$user_id."'";
            header("location:../admin/statuss.php?success=User have been confirmed successfully");
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statuss.php");
            return;
        }
        $select = "SELECT * FROM withdrawal WHERE withdraw_id = '".$user_id."'";
        $details = $this->runMysqliQuery($select);
        // print_r($result);die();
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $results = $details['data'];
        if(mysqli_num_rows($results) == 0) {
            return 'No Data was returned';
        }
        if($results) {
            for ($i = 0; $row = mysqli_fetch_array($results); $i++) {
                $email = $row['email'];
                $amount = $row['amount'];
                $users_unique_id = $row['users_unique_id'];
            }
             $queryss = "SELECT * FROM users WHERE users_unique_id = '".$users_unique_id."'";
           // print_r($queryss);die();
            $detailss = $this->runMysqliQuery($queryss);//run the query
            if($detailss['error_code'] == 1){
                return $detailss['error'];
            }
            $resultss = $detailss['data'];
            if(mysqli_num_rows($resultss) == 0){
                return 'No Data was returned';
            }else{
                while($rows = mysqli_fetch_array($resultss)){
                    $bal = $rows['balance'];
                }
            }
            $int = ($bal - $amount);

            $querysss = "UPDATE users SET balance = '".$int."' WHERE users_unique_id = '".$users_unique_id."'";
            $resultsss = $this->runMysqliQuery($querysss);
            if($resultsss['error_code'] == 1){
                $_SESSION['formError'] = ['general_error'=>[ $resultsss['error'] ] ];
                header("location:../users/withdraw.php");
                return;
            }
            
            $to  = $email;
            $d = date('Y');
            $ego = $amount;
            $subject = "Welcome To Everledgerminers";
            $message = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">
                                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                </head>
                                <body>
                    <h6 align="center"><img src="https://www.everledgerminers.com/images/rr.png" alt="verdienenglobal"/></h6>
                    <div style="font-size: 14px;">
					<p>Your withdrawal of $'.$ego.' have be confirmed</p>
					<p style="">Thanks!</p>
					<p style="color:#332E2E">Best Regard<br />
                    Verdienen Global Team<br/>
                    Email: support@everledgerminers1@gmail.com<br /></p>
				
			<div style="background-color:rgb(253, 150, 26);
						float:left;
						width:80%;
						border:1px solid rgb(253, 150, 26);
						border-radius:0px 0px 3px 3px;
						padding-left:10% ;
						padding-right:10% ;
						padding-top:30px ;
						padding-bottom:30px ;
						font-family: \'Roboto\', sans-serif;" class="footer">
                        everledgerminers.<br>
				located at 150 Minories,<br>
				Tower, london EC3N,<br>
                United kingdom.
			</div>
			<p style="float:left;
			width:100%;
			text-align:center;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;everledgerminers <?php print ' . $d . ';?>. All Rights Reserved.</p>
		</div>
		</body>
		</html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: everledgerminers <support@everledgerminers.com>' . "\r\n";
            $retval = @mail($to, $subject, $message, $header);
            if ($retval = true) {
                return  "location:../admin/statuss.php?success=User have been un-blocked successfully";
                // header("location:login.php");
            } else {
                return  "location:../admin/statuss.php?success=User have been un-blocked successfully";
            }
            header("location:../admin/statuss.php?success=User have been un-blocked successfully");
        }


        header("location:../admin/statuss.php?success=$message");

    }
    function manbonus(){
        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'delete4'){
            $query = "DELETE FROM withdrawal WHERE withdraw_id = '".$user_id."'";
            $message = "User have been deleted successfully";
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/status_bonus.php");
            return;
        }
        header("location:../admin/status_bonus.php?success=$message");

    }
    function manabonus(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'pendiiing'){
            $query = "UPDATE with_bonus SET status = 'pending' WHERE withbouns_id = '".$user_id."'";
            $message = "User have been pending successfully";

        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/status_bonus.php");
            return;
        }
        header("location:../admin/status_bonus.php?success=$message");

    }
    function managbonus(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'confiiirmed'){
            $query = "UPDATE with_bonus	SET status = 'confirmed' WHERE withbouns_id = '".$user_id."'";
            $message =("location:../admin/status_bonus.php?success=User have been confirmed successfully");
              }
        //run the query
        $result = $this->runMysqliQuery($query);
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/status_bonus.php?success=User have been confirmed successfully");
            return;
        }
        $select = "SELECT * FROM with_bonus WHERE withbouns_id = '".$user_id."'";
        $details = $this->runMysqliQuery($select);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $results = $details['data'];
        if(mysqli_num_rows($results) == 0) {
            return 0;
        }
        if($results) {
            for ($i = 0; $row = mysqli_fetch_array($results); $i++) {
           //     print_r($row);die();
                $email = $row['email'];
                $amount = $row['amount'];
            }
            
            //         print_r($resultsss);die();
         

            $to  = $email;
            $d = date('Y');
            $ego = $amount;
            $subject = "Welcome To Everledgerminers";
            $message = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">
                                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                </head>
                                <body>
                    <h6 align="center"><img src="https://www.verdienenglobal.com/images/IMG-20220428-WA0063.jpg" alt="verdienenglobal"/></h6>
                    <div style="font-size: 14px;">
					<p>You withdrawal of $'.$ego.'have be confirmed</p>
					<p style="">Thanks!</p>
					<p style="color:#332E2E">Best Regard<br />
                    everledgerminers Team<br/>
                    Email: support@everledgerminers1@gmail.com<br /></p>
				
			<div style="background-color:rgb(253, 150, 26);
						float:left;
						width:80%;
						border:1px solid rgb(253, 150, 26);
						border-radius:0px 0px 3px 3px;
						padding-left:10% ;
						padding-right:10% ;
						padding-top:30px ;
						padding-bottom:30px ;
						font-family: \'Roboto\', sans-serif;" class="footer">
                        everledgerminers.<br>
				located at 150 Minories,<br>
				Tower, london EC3N,<br>
                United kingdom.
			</div>
			<p style="float:left;
			width:100%;
			text-align:center;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;everledgerminers <?php print ' . $d . ';?>. All Rights Reserved.</p>
		</div>
		</body>
		</html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: everledgerminers <support@everledgerminers.com>' . "\r\n";
            $retval = @mail($to, $subject, $message, $header);
            if ($retval = true) {
                return  "location:../admin/status_bonus.php?success=User have been un-blocked successfully";
                // header("location:login.php");
            } else {
                return  "location:../admin/status_bonus.php?success=User have been un-blocked successfully";
            }
        return "location:../admin/status_bonus.php?success=User have been un-blocked successfully";
    }


        header("location:../admin/status_bonus.php?success=User have been un-blocked successfully");


    }

    function manageusers(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['id']);

        $option = trim($_GET['option']);
        if($option === 'deleteled'){
            $query = "DELETE FROM main_table WHERE main_id  = '".$user_id."'";
            $message = "order have been deleted successfully";
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../statusinter.php");
            return;
        }
        header("location:../statusinter.php?success=$message");

    }
    function manageuser(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'pendingi'){
            $query = "UPDATE users SET status = 'pending' WHERE users_unique_id = '".$user_id."'";
            $message = "User have been pending successfully";

        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statusinter.php");
            return;
        }
        header("location:../admin/statusinter.php?success=$message");

    }
    function manageuse(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'confirmedi'){
            $query = "UPDATE users SET status = 'confirmed' WHERE users_unique_id  = '".$user_id."'";
            $message = "User have been confirmed successfully";
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statusinter.php");
            return;
        }
        header("location:../admin/statusinter.php?success=$message");

    }
    
    function managereff(){
        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'delete2'){
            $query = "DELETE FROM referral_tb WHERE referral_id  = '".$user_id."'";
            $message = "User have been deleted successfully";
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statuswith.php");
            return;
        }
        header("location:../admin/statuswith.php?success=$message");

    }
    function manageref(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'pendiing'){
            $query = "UPDATE referral_tb SET status = 'pending' WHERE referral_id = '".$user_id."'";
            $message = "User have been pending successfully";

        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statuswith.php");
            return;
        }

        header("location:../admin/statuswith.php?success=$message");

    }
    function managere(){

        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'confiirmed'){
            $query = "UPDATE referral_tb SET status = 'confirmed' WHERE referral_id = '".$user_id."'";
            $message = "User have been confirmed successfully";
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statuswith.php");
            return;
        }

        $select = "SELECT * FROM referral_tb WHERE referral_id = '".$user_id."'";
        $details = $this->runMysqliQuery($select);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result) {
            for ($i = 0; $row = mysqli_fetch_array($result); $i++) {
                $referral = $row['referral'];
                $ref_amount = $row['ref_amount'];

            }
        }
        $dsrs = "SELECT * FROM users WHERE ref_id = '$referral'";
        $resus = $this->runMysqliQuery($dsrs);
        if($resus['error_code'] == 1){
            return $resus['error'];
        }
        $result = $resus['data'];
        if(mysqli_num_rows($result) == 0){
            return 'no';
        }else {
            while ($row = mysqli_fetch_array($result)) {
                $email = $row['email'];
                $refname = $row['username'];
            }
            $to  = $email;
            $d = date('Y');
            $subject = "Welcome To Everledgerminers";
            $message = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">
                                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                </head>
                                <body>
                    <h6 align="center"><img src="https://www.everledgerminers.com/images/rr.png" alt="verdienenglobal"/></h6>
                    <div style="font-size: 14px;">
				<p>Your referral of $'.$ref_amount.'have been deposit into balance</p>
					<p style="">Thanks!</p>
					<p style="color:#332E2E">Best Regard<br />
                    everledgerminers Team<br/>
                    Email: support@everledgerminers1@gmail.com<br /></p>
				
			<div style="background-color:rgb(253, 150, 26);
						float:left;
						width:80%;
						border:1px solid rgb(253, 150, 26);
						border-radius:0px 0px 3px 3px;
						padding-left:10% ;
						padding-right:10% ;
						padding-top:30px ;
						padding-bottom:30px ;
						font-family: \'Roboto\', sans-serif;" class="footer">
                        everledgerminers.<br>
				located at 150 Minories,<br>
				Tower, london EC3N,<br>
                United kingdom.
			</div>
			<p style="float:left;
			width:100%;
			text-align:center;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;everledgerminers <?php print ' . $d . ';?>. All Rights Reserved.</p>
		</div>
		</body>
		</html>';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: everledgerminers <support@everledgerminers.com>' . "\r\n";
            $retval = @mail($to, $subject, $message, $header);
            if ($retval = true) {
                return  "location:../admin/statuswith.php?success=User have been un-blocked successfully";
                // header("location:login.php");
            } else {
                return  "location:../admin/statuswith.php?success=User have been un-blocked successfully";
            }
            header("location:../admin/statuss.php?success=User have been un-blocked successfully");
        }

        header("location:../admin/statuswith.php?success=$message");

    }
    
    function getLoggedInDepositDetails($userID){
        $query = "SELECT * FROM deposit_tb WHERE deposit_id = '$userID'";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            $row = mysqli_fetch_object($result);
            return $row;
        }
    }
    function updateadmin()
    {
        $username = mysqli_real_escape_string($this->dbConnection, $_POST['username']);
        $plan = mysqli_real_escape_string($this->dbConnection, $_POST['plan']);
        $amount = mysqli_real_escape_string($this->dbConnection, $_POST['amount']);
        $interest = mysqli_real_escape_string($this->dbConnection, $_POST['interest']);
        $go = mysqli_real_escape_string($this->dbConnection, $_POST['go']);
        $userId = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $thingsToValidate = [
            $username.'|Username|username|empty',
            $plan.'|Plan|plan|empty',
            $amount.'|Amount|amount',
            $interest.'|Interest|interest',
            $go.'|Go|go',
        ];

        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false){
            $_SESSION['formError'] = $this->errors;
            header('location:../users/de_profile.php');
            return;
        }


        $query = "UPDATE deposit_tb SET username = '".$username."', plan = '$plan' , amount = '$amount' , interest = '$interest', go = '$go' WHERE deposit_id = '$userId'";
        $updateDetails = $this->runMysqliQuery($query);
        if($updateDetails['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $updateDetails['error']]];
            header("location:../admin/de_profile.php");
            return;
        }
        header ('location:../admin/alldeposit.php?&success=Profile was updated successfully');
    }


    function updatewallet()
    {
        $Bitcoin = mysqli_real_escape_string($this->dbConnection, $_POST['Bitcoin']);
        $Ethereum = mysqli_real_escape_string($this->dbConnection, $_POST['Ethereum']);
        $Perfect = mysqli_real_escape_string($this->dbConnection, $_POST['Perfect']);
        $BNB = mysqli_real_escape_string($this->dbConnection, $_POST['BNB']);
        $userId = mysqli_real_escape_string($this->dbConnection, $_POST['userId']);

        $thingsToValidate = [
            $Bitcoin.'|Bitcoin|bitcoin|empty',
            $Ethereum.'|Ethereum|ethereum|empty',
            $Perfect.'|Perfect|perfect|empty',
            $BNB.'|BNB|bnb|empty',
        ];

        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false){
            $_SESSION['formError'] = $this->errors;
            header('location:../admin/wallet_update.php');
            return;
        }


        $query = "UPDATE wallet SET Bitcoin = '$Bitcoin', Ethereum = '".$Ethereum."', Perfect = '$Perfect' ,BNB = '$BNB' WHERE id = '$userId'";
        $updateDetails = $this->runMysqliQuery($query);
        // print_r($query);die();

        if($updateDetails['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $updateDetails['error'] ]];
            header("location:../admin/wallet_update.php");
            return;
        }

        header ('location:../admin/wallet_profile.php?&success=Profile was updated successfully');


    }
    

    function support(){
       $fullname= $_SESSION['fullname']=mysqli_real_escape_string($this->dbConnection, $_POST['fullname']);
        $email= $_SESSION['email']=mysqli_real_escape_string($this->dbConnection, $_POST['email']);
        $message= $_SESSION['message']=mysqli_real_escape_string($this->dbConnection, $_POST['message']);

        $thingsToValidate = [
            $fullname.'|FullName|fullname|empty',
            $email.'|Email|email|empty',
            $message.'|Message|message|empty',
        ];
        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false){
            $_SESSION['formError'] = $this->errors;
            header('location:../contact.php');
            return;
        }
        //       print_r($_SESSION); die();
        // print_r($r); die();
        $createuse = $this->insertIntosuppost($fullname, $email, $message);
        if ($createuse['error_code'] == 1){
            $_SESSION['formError']=['general_error' =>[$createuse['error']] ];
            header('location:../contact.php');
            return;
        }
        header('location:../contact.php?success=messages was successful');

    }
    function allsupport(){
        $UserDetails = [];
        $query = "SELECT * FROM support";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails[] = $row;
//                print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }

    
    function selectWithdrwallsingle($id){
        $UserDetails = "";
        $query = "SELECT * FROM withdrawal WHERE users_unique_id ='".$id."' ";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        //print_r($details);die();
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];

        return $result;
//        if(mysqli_num_rows($result) == 0){
//            return 'No Data was returned';
//        }else{
//            while($row = mysqli_fetch_assoc($result)){
//                $UserDetails = $row;
//               // print_r($UserDetails);die();
//            }
//            return $UserDetails;
//        }

    }


    function seldeposittable($id){
        $query = "SELECT * FROM deposit_tb WHERE users_unique_id ='".$id."'";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        //print_r($details);die();
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 0;
        }else{
            while($row = mysqli_fetch_object($result)){
                $plan = $row->plan;
            }
            return $plan;
        }

    }
    function selectdeposittable($id){
        $UserDetails = "";
        $query = "SELECT * FROM deposit_tb WHERE users_unique_id ='".$id."' And status = 'confirmed'";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        //print_r($details);die();
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];

        return $result;
//        if(mysqli_num_rows($result) == 0){
//            return 'No Data was returned';
//        }else{
//            while($row = mysqli_fetch_assoc($result)){
//                $UserDetails = $row;
//               // print_r($UserDetails);die();
//            }
//            return $UserDetails;
//        }

    }


    function selectdeposittablepending($id){
        $UserDetails = "";
        $query = "SELECT * FROM deposit_tb WHERE users_unique_id ='".$id."' And status = 'pending'";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        //print_r($details);die();
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];

        return $result;
//        if(mysqli_num_rows($result) == 0){
//            return 'No Data was returned';
//        }else{
//            while($row = mysqli_fetch_assoc($result)){
//                $UserDetails = $row;
//               // print_r($UserDetails);die();
//            }
//            return $UserDetails;
//        }

    }

    function selectdeposittableinterest($id){
        $UserDetails = "";
        $query = "SELECT * FROM deposit_tb WHERE users_unique_id ='".$id."' AND status = '0' ";
        //print_r($query);die();
        $details = $this->runMysqliQuery($query);//run the query
        //print_r($details);die();
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];

        return $result;
//        if(mysqli_num_rows($result) == 0){
//            return 'No Data was returned';
//        }else{
//            while($row = mysqli_fetch_assoc($result)){
//                $UserDetails = $row;
//               // print_r($UserDetails);die();
//            }
//            return $UserDetails;
//        }

    }

    function selectsingleuser($userId){
        $querys = "SELECT * FROM users WHERE users_unique_id = '".$userId."' ";
        $details = $this->runMysqliQuery($querys);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails = $row;
                //               print_r($UserDetails);die();
            }
            return $UserDetails;
        }
    }

    function enteremail(){
        $email= $_SESSION['email']=mysqli_real_escape_string($this->dbConnection, $_POST['email']);
        $thingsToValidate = [
            $email.'|Email|email|empty',
        ];
        $validationStatus = $this->callValidation($thingsToValidate);
        if($validationStatus === false) {
            $_SESSION['formError'] = $this->errors;
            header('location:../reset.php');
        }
        $query = "SELECT email FROM users WHERE email='".$email."'";
        $back= $this->runMysqliQuery($query);
        if($back['error_code'] == 1){
            header('location:../reset.php?');
        }
        $result = $back['data'];
        if(mysqli_num_rows($result) == 0){
            return 'No Data was returned';
        }else{
            $row = mysqli_fetch_object($result);
            // print_r($row);die();
            header('location:../new_password.php?userid='.$email);

        }
    }
    function enternewpassword(){

        $password = $_SESSION['password']=mysqli_real_escape_string($this->dbConnection, $_POST['password']);
        $new_password = $_SESSION['new_password']=mysqli_real_escape_string($this->dbConnection, $_POST['new_password']);
        $userId = $_SESSION['userid']=mysqli_real_escape_string($this->dbConnection, $_POST['userId']);

        $thingsToValidate = [
            $password.'|Password|password|empty',
            $new_password.'|New_password|new password|empty',
        ];
        $validationStatus = $this->callValidation($thingsToValidate);

        if($validationStatus === false) {
            $_SESSION['formError'] = $this->errors;
            header('location:../new_password.php');
        }
        $hashedPasword = $this->hasHer($password);
        $query = "UPDATE users SET password='".$hashedPasword."' WHERE email='".$userId."' ";
        $back = $this->runMysqliQuery($query);
        if($back['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $back['error'] ]];
            header("location:../new_password.php");
            return;
        }

        header ('location:../new_password.php?&success=New_password was updated successfully');

    }
    function logout(){
        session_destroy();
        header('location:../login.php?success=you have successfully logged out');
    }


    function sumbalances($userId){
        $query = "SELECT * FROM deposit_tb WHERE users_unique_id = '".$userId."' ";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 0;
        }else {
            while ($row = mysqli_fetch_array($result)) {
                $querys = "SELECT SUM(interest) FROM deposit_tb WHERE users_unique_id = '".$userId."' ";
                $detail = $this->runMysqliQuery($querys);//run the query
                if($detail['error_code'] == 1){
                    return $detail['error'];
                }
                $resul = $detail['data'];
                if(mysqli_num_rows($resul) == 0) {
                    return 'No Data was returned';
                }else {
                    while ($rows = mysqli_fetch_array($resul)) {
                        $output = $rows[0];
                    }
                    return  $output;
                }
            }
        }
    
    }

    function meanamount($userId){
        $query = "SELECT * FROM deposit_tb WHERE users_unique_id = '".$userId."' ";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 0;
        }else {
            while ($row = mysqli_fetch_array($result)) {
                $querys = "SELECT SUM(amount) FROM deposit_tb WHERE users_unique_id = '".$userId."'And status = 'confirmed'";
                $detail = $this->runMysqliQuery($querys);//run the query
                if($detail['error_code'] == 1){
                    return $detail['error'];
                }
                $resul = $detail['data'];
                if(mysqli_num_rows($resul) == 0) {
                    return 'No Data was returned';
                }else {
                    while ($rows = mysqli_fetch_array($resul)) {
                        $output = $rows[0];
                    }
                    return  $output;
                }
            }
        }
    }


    function meanwithdrwa($userId){
        $query = "SELECT * FROM withdrawal WHERE users_unique_id = '".$userId."' ";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 0;
        }else {
            while ($row = mysqli_fetch_array($result)) {
                $querys = "SELECT SUM(amount) FROM withdrawal WHERE users_unique_id = '".$userId."'";
                $detail = $this->runMysqliQuery($querys);//run the query
                if($detail['error_code'] == 1){
                    return $detail['error'];
                }
                $resul = $detail['data'];
                if(mysqli_num_rows($resul) == 0) {
                    return 'No Data was returned';
                }else {
                    while ($rows = mysqli_fetch_array($resul)) {
                        $output = $rows[0];
                    }
                    return  $output;
                }
            }
        }
    }

    function meanwithdrwapending($userId){
        $query = "SELECT * FROM withdrawal WHERE users_unique_id = '".$userId."' ";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 0;
        }else {
            while ($row = mysqli_fetch_array($result)) {
                $querys = "SELECT SUM(amount) FROM withdrawal WHERE users_unique_id = '".$userId."' AND status ='pending'";
                $detail = $this->runMysqliQuery($querys);//run the query
                if($detail['error_code'] == 1){
                    return $detail['error'];
                }
                $resul = $detail['data'];
                if(mysqli_num_rows($resul) == 0) {
                    return 'No Data was returned';
                }else {
                    while ($rows = mysqli_fetch_array($resul)) {
                        $output = $rows[0];
                    }
                    return  $output;
                }
            }
        }
    }

    function total($userId){
        $amount = $this->meanamount($userId);
        $interest = $this->sumbalances($userId);
        $ref = $this->sumreff($userId);
        $total =  $amount + $interest + $ref;
       // print_r($rr);die();
        return $total;
    }

    function btcc($userId){
        $totals = $this->total($userId);
        $rr = $this->BTC($totals);
       // print_r($rr);die();
        return $rr;
    }




    
    function meanwithinvest($userId){
        $query = "SELECT * FROM deposit_tb WHERE users_unique_id = '".$userId."' ";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 0;
        }else {
            while ($row = mysqli_fetch_array($result)) {
                $querys = "SELECT COUNT(username) FROM deposit_tb WHERE users_unique_id  = '$userId'";
                $detail = $this->runMysqliQuery($querys);//run the query
                if($detail['error_code'] == 1){
                    return $detail['error'];
                }
                $resul = $detail['data'];
                if(mysqli_num_rows($resul) == 0) {
                    return 'No Data was returned';
                }else {
                    while ($rows = mysqli_fetch_array($resul)) {
                        $output = $rows[0];
                    }
                    return  $output;
                }
            }
        }
    
    }

    function amount(){
        $query = "SELECT * FROM deposit_tb WHERE status = 'confirmed' AND day_counter < 360 ";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_array($result); $i++) {
                $users_unique_id = $row['users_unique_id'];
                $querys = "SELECT SUM(interest) FROM deposit_tb WHERE users_unique_id = '".$users_unique_id."' AND status = 'confirmed'";
                $detail = $this->runMysqliQuery($querys);//run the query
                if($detail['error_code'] == 1){
                    return $detail['error'];
                }
                $resul = $detail['data'];
                if(mysqli_num_rows($resul) == 0) {
                    return 'No Data was returned';
                }
                if($resul){
                    for ($i=0; $ro = mysqli_fetch_array($resul); $i++) {
                        $amount = $ro[0];
                        $quers = "UPDATE users SET balance = '".$amount."' WHERE users_unique_id =  '".$users_unique_id."'" ;
                        $detai = $this->runMysqliQuery($quers);//run the query
                        if($detai['error_code'] == 1){
                            $_SESSION['formError'] = ['general_error'=>[ $detai['error'] ] ];
                            header("location:../counter.php");
                            return;
                        }
                    }
                }
            }
        }
    }

    function sumreff($userId){
        $query = "SELECT * FROM users WHERE users_unique_id = '".$userId."'";
        $details = $this->runMysqliQuery($query);//run the query
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_array($result); $i++) {
                $ref_id = $row['ref_id'];
                $querys = "SELECT SUM(go) FROM deposit_tb WHERE referral = '".$ref_id."'";
              //  print_r($querys);die();
                $detail = $this->runMysqliQuery($querys);//run the query
                if($detail['error_code'] == 1){
                    return $detail['error'];
                }
                $resul = $detail['data'];
                if(mysqli_num_rows($resul) == 0) {
                    return 'No Data was returned';
                }
                if($resul){
                    for ($i=0; $ro = mysqli_fetch_array($resul); $i++) {
                        $amount = $ro[0];
                 
                    }
                    return  $amount;
                }
            }
        }
    }

    function managesupport(){
        $user_id = mysqli_real_escape_string($this->dbConnection, $_POST['user_id']);

        $option = trim($_GET['option']);
        if($option === 'deletellll'){
            $query = "DELETE FROM support WHERE id = '".$user_id."'";
             header("location:../admin/statussupport.php?success=$message");
        }

        //run the query
        $result = $this->runMysqliQuery($query);
        //print_r($result);die();
        if($result['error_code'] == 1){
            $_SESSION['formError'] = ['general_error'=>[ $result['error'] ] ];
            header("location:../admin/statussupport.php");
            return;
        }
        header("location:../admin/statussupport.php?success=$message");

    }

    function admindetail(){
        $query = "SELECT * FROM users WHERE type_of_user = 'admin'";
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 0;
        }else{
            while($row = mysqli_fetch_object($result)){
                $UserDetails = $row;
                //               print_r($UserDetails);die();
            }
        }
        return  $UserDetails;
    }

    function seeallreff($userId){
        $UserDetails = "";
        $query = "SELECT * FROM users WHERE ref_id = '".$userId."'";
        // print_r($query);die();
        $details = $this->runMysqliQuery($query);
        if($details['error_code'] == 1){
            return $details['error'];
        }
        $result = $details['data'];
        if(mysqli_num_rows($result) == 0) {
            return 'No Data was returned';
        }
        if($result){
            for ($i=0; $row = mysqli_fetch_assoc($result); $i++){
                $ref_id = $row['ref_id'];
                // print_r($row);die();
        $querys = "SELECT * FROM referral_tb WHERE  referral = '".$ref_id."'";
        $detail = $this->runMysqliQuery($querys);
        if($detail['error_code'] == 1){
        return $detail['error'];
        }
        $resul = $detail['data'];
        //   print_r($resul);die();
        if(mysqli_num_rows($resul) == 0) {
            return 'No Data was returned';
        }else{
            while($rows = mysqli_fetch_object($resul)){
                 $UserDetails = $rows;
                //   print_r($UserDetails);die();
            }
    }
}
    return  $UserDetails;
}
}

function runMysqliQuery(string $query) : array{
    //mysqli_query function will excute the query passed to it
    $result = mysqli_query($this->dbConnection, $query);
    if($result){
        return ['error_code'=>0, 'data'=>$result];//no error
    }else{
        return ['error_code'=>1, 'error'=>mysqli_error($this->dbConnection)];//error dey
    }

}




}
$for = new main_work();
?>