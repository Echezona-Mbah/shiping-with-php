<?php

trait DatabaseQueries{

    var $host = 'localhost';
    var $dataBaseName = 'ship';
    var $userName = 'root';
    var $dataBasePassword = '';
    var $dbConnection;

    //connection to data base
    public function connectToDb(){

        $this->dbConnection = mysqli_connect($this->host,$this->userName, $this->dataBasePassword,$this->dataBaseName) or die(mysqli_error($this->dbConnection));

    }

    function createDb($dataBaseName){
        $query = "CREATE DATABASE $dataBaseName";
        $result = $this->runMysqliQuery($query);
        return $result;
    }
    function createUniqueIdD($table_name, $column)
	{

		$unique_id = $this->picker();
		$query = "SELECT * FROM " . $table_name . " WHERE " . $column . " = '$unique_id'";

		//check for the database count from the database"unique_id"
		$this->generalSelectStatement($query);
		$rowcount = $this->_general_count;
		if ($rowcount == 0) {
			return $unique_id;
		} else {
			$this->createUniqueId($query);
		}
	}

    //runs our query
    function runMysqliQuery(string $query) : array{
        //mysqli_query function will excute the query passed to it
        $result = mysqli_query($this->dbConnection, $query);
        if($result){
            return ['error_code'=>0, 'data'=>$result];//no error
        }else{
            return ['error_code'=>1, 'error'=>mysqli_error($this->dbConnection)];//error dey
        }

    }

    function checkUniqueValueInDatabase($table, $columnName, $value){

        $query = "SELECT * FROM $table WHERE $columnName = '$value'";
        $result = $this->runMysqliQuery($query);
        return mysqli_num_rows($result['data']);
     }

     function createUniqueID($tableName, $columnName){
         $unique_id = uniqid();
         $result = $this->checkUniqueValueInDatabase($tableName, $columnName, $unique_id);
         if($result > 0){
             $this->createUniqueID($tableName, $columnName);//recursion
         }else{
             return $unique_id;
         }
     }

     function insertIntoUsersTable($track_point,$sender_fullname,$package_name,$package_desc,$package_weight,$sender_phone,$sender_email,$sender_country,$reciever_fullname,$reciever_email,$reciever_address, $amount_charged_for_shipment, $discount, $tax, $date_of_arrival, $reciever_phone_no,$decription_of_bill, $custormer_will_pay,$tracking_no){

        $query = "INSERT INTO main_table (main_id,sender_fullname,package_name,package_weight,sender_phone,sender_email,sender_country,reciever_fullname,reciever_email,reciever_address,tracking_no,reciever_phone_no,package_desc,amount_charged_for_shipment,discount,tax,date_of_arrival,decription_of_bill,custormer_will_pay,track_point) VALUES (null,'".$sender_fullname."', '".$package_name."', '".$package_weight."','".$sender_phone."','".$sender_email."','".$sender_country."','".$reciever_fullname."','".$reciever_email."','".$reciever_address."','".$tracking_no."','".$reciever_phone_no."','".$package_desc."','".$amount_charged_for_shipment."','".$discount."','".$tax."','".$date_of_arrival."','".$decription_of_bill."','".$custormer_will_pay."','".$track_point."')";
        // print_r($query); die();

        $result = $this->runMysqliQuery($query);
         return $result;

     }


     function insertIntoTable($current_location,$time_of_arrival,$time_of_departure,$update_tax,$update_discount,$update_amount_charged_for_shipment,$current_status,$comments,$decription_of_bill,$custormer_will_pay,$userId){

        $query = "INSERT INTO updates (id,order_id,current_location,arrival_time,depature_time,comments,amount_charged,discount,tax,decription_of_bill,custormer_will_pay,current_status) VALUES (null,'".$userId."', '".$current_location."', '".$time_of_arrival."','".$time_of_departure."','".$comments."','".$update_amount_charged_for_shipment."','".$update_discount."','".$update_tax."','".$decription_of_bill."','".$custormer_will_pay."','".$current_status."')";
        //  print_r($query); die();

        $result = $this->runMysqliQuery($query);
         return $result;

     }

     //hash password
    public function hasHer($password){
        return hash('sha256', md5($password));
    }

    //run login query select
    function loginHandler($username, $password){
        $query = "SELECT * FROM yeah_yeah WHERE password = '$password' AND username = '$username'";
        $result = $this->runMysqliQuery($query);
        return $result;
    }

    function insertIntoUsersTabl($Bitcoin, $Ethereum, $Perfect){

        $query = "INSERT INTO wallet (id,Bitcoin,Ethereum,Perfect) VALUES (null, '".$Bitcoin."', '".$Ethereum."', '".$Perfect."')";
        $result = $this->runMysqliQuery($query);
        return $result;

    }

    function insertIntosuppost($fullname, $email, $message){

        $query = "INSERT INTO support (id,fullname,email,message) VALUES (null, '".$fullname."', '".$email."', '".$message."')";
        $result = $this->runMysqliQuery($query);
        return $result;

    }

    function insertIntoadminTable($fullname,$username,$password,$pay_account,$email,$admin_id){
        $query = "INSERT INTO admin (id,admin_id,first_name,username,password,wallet,email) VALUES (null ,'".$admin_id."','".$fullname."','".$username."','".$password."','".$pay_account."','".$email."')";
        $result = $this->runMysqliQuery($query);
        return $result;

    }








}



?>
