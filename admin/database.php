<?php
class Database{

	public $hostname = "localhost";
	public $username = "root";
	public $passowrd = "";
	public $database = "training";
	public $connection;
	public $message = array(); 

	//Connect with database for mysql database
	public function __construct()
	{
		$this->connection = new mysqli($this->hostname, $this->username, $this->passowrd, $this->database);

		//Check Connection
		if($this->connection->connect_errno){
			die("Connection Fail ".$this->connection->connect_error);
		}
		else{
			//echo "Connection is ok <br>";
		}
	}// End of constructor


	//Function to Create Table
	public function CreateTable($sql){
		//Create Table
		if ($this->connection->query($sql) === TRUE) {
		    echo "Table has been created successfully";
		} else {
		    echo "Error to creating table: ".$this->connection->error;
		}
		echo "<br>";
	}//End of function CreateTable



	//Fetch data by accepting table name and columns(1 dimentional array) name
	public function fetch($table, array $columns, array $condition, array $orderby = NULL){
		
		$where_condition = "";
		if(!empty($condition)){
			$where_condition =" WHERE ";
			foreach ($condition as $key => $value) {
				$where_condition .= $key." = '".$value."' AND ";
			}
			$where_condition = rtrim($where_condition, "AND ");
		}
		$columns = (empty($columns)) ? "*" : rtrim(implode(",",$columns), ",");

		//ORDER BY Country ASC, CustomerName DESC;
		$order_by="";
		if(!empty($orderby)){
			$order_by = " ORDER BY ";
			foreach ($orderby as $key => $value) {
				$order_by .= $key." ".$value.", ";
			}
			$order_by = rtrim($order_by, ", ");
		}
		//echo "SELECT $columns FROM $table $where_condition $order_by;<br>"; die;

		$result=$this->connection->query("SELECT $columns FROM $table $where_condition $order_by;");
	
		if($this->connection->errno){
			die("Fail Select ".$this->connection->error);
		}

		//return tow dimentional array as required columns result
		return $result->fetch_all(MYSQLI_ASSOC);
	}



	//Fetch data by accepting table name and columns(1 dimentional array) name
	public function cquery($sql){
		$result=$this->connection->query($sql);
	
		if($this->connection->errno){
			die("Fail Select ".$this->connection->error);
		}

		//return tow dimentional array as required columns result
		return $result->fetch_all(MYSQLI_ASSOC);
	}



	# Insert Data within table by accepting TableName and Table column => Data as associative array
	public function insert($tblname, array $val_cols){

		$keysString = implode(", ", array_keys($val_cols));

		$i=0;
		foreach($val_cols as $key=>$value) {
			$StValue[$i] = "'".$value."'";
		    $i++;
		}

		$StValues = implode(", ",$StValue);
		
		if (mysqli_connect_errno()) {
		  $this->message['msg'] = "Failed to connect to MySQL: " . mysqli_connect_error();
		  $this->message['return'] = false;
		  return $this->message;
		}

		//Perform Insert operation
		if($this->connection->query("INSERT INTO $tblname ($keysString) VALUES ($StValues)") === TRUE){
			$this->message['msg'] =  "New record has been inserted successfully!";
			$this->message['return'] = true;
			return $this->message;
		}else{
			$this->message['msg'] =  "Error ".$this->connection->error;
			$this->message['return'] = false;
			return $this->message;			
		}
	}//End of function insert




	//Delete data form table; Accepting Table Name and Keys=>Values as associative array
	public function delete($tblname, array $val_cols){
		//Append each element of val_cols associative array 
		$i=0;
		foreach($val_cols as $key=>$value) {
			$exp[$i] = $key." = '".$value."'";
		    $i++;
		}

		$Stexp = implode(" AND ",$exp);

		//Perform Delete operation
		if($this->connection->query("DELETE FROM $tblname WHERE $Stexp") === TRUE){
			if(mysqli_affected_rows($this->connection)){
				$this->message['msg'] =  "Record has been deleted successfully";
				$this->message['return'] = true;
				return $this->message;
			}
			else{
				$this->message['msg'] = "The Record you want to delete is no loger exists";
				$this->message['return'] = false;
				return $this->message;
			}
		}
		else{
			$this->message['msg'] = "Error to delete".$this->connection->error;
			$this->message['return'] = false;
			return $this->message;	
		}	
	}




	//Update data within table; Accepting Table Name and Keys=>Values as associative array
	public function update($tblname, array $set_val_cols, array $cod_val_cols){
		
		//append set_val_cols associative array elements 
		$i=0;
		foreach($set_val_cols as $key=>$value) {
			$set[$i] = $key." = '".$value."'";
		    $i++;
		}

		$Stset = implode(", ",$set);

		//append cod_val_cols associative array elements
		$i=0;
		foreach($cod_val_cols as $key=>$value) {
			$cod[$i] = $key." = '".$value."'";
		    $i++;
		}

		$Stcod = implode(" AND ",$cod);

		//Update operation
		if($this->connection->query("UPDATE $tblname SET $Stset WHERE $Stcod") === TRUE){
			if(mysqli_affected_rows($this->connection)){
				$this->message['msg'] =  "Record updated successfully!";
				$this->message['return'] = true;
				return $this->message;
			}
			else{
				$this->message['msg'] =  "The Record you want to updated is no loger exists";
				$this->message['return'] = false;
				return $this->message;
			}
		}else{
			$this->message['msg'] =  "Error to update ".$this->connection->error;
			$this->message['return'] = false;
			return $this->message;
		}
	}


	public function validation($fieldname, $fieldvalue, $fieldlength){
		$errorMSG = "";
		if (isset($fieldvalue) && empty($fieldvalue)) {
			$errorMSG .= "<li>".$fieldname." is required</<li>"; 
			$name_validation = false;
		}
		else{
			if(!preg_match("/^[a-zA-Z]([\w -]*[a-zA-Z])?$/i", $fieldvalue)){
				$errorMSG .= "<li>".$fieldname." only allow alphanumeric, hyphen, underscore and space</<li>"; 
				$name_validation = false;
			}
			else {
				if(strlen($fieldvalue)>100){
					$errorMSG .= "<li>".$fieldname." must be less than ".$fieldlength." characters</<li>"; 
					$name_validation = false;
				}
				else {
					$errorMSG .= "<li>".$fieldname." is correct</<li>"; 
					$name_validation = true;
				}
			}
		}
		$validation_result = array("errorMSG" => $errorMSG, "validation" => $name_validation);
		return $validation_result;
	}



	//Call destructor function 
	public function __destruct() {
		if($this->connection){
			// Close the connection
        	$this->connection->close();
        	//echo "Connection is release";
        }	
	}

}//end of class


// Create Connection
$obj = new Database();


	if(isset($_GET["page"]) && isset($_GET["action"])){
		/* ======= START: Index Search Operation ======== */
		//'database.php?page=index&action=search'
		if(($_GET["page"]=="index" || $_GET["action"]=="search")) {
			$response = array();
			/*Array
			(
				[from_date] => 2023-03-01
				[to_date] => 2023-03-08
			)*/



			/*======== START: Withdrawn Table =========*/
			// SELECT `id`, `bank_id`, `amount`, `created_at`, `updated_at` FROM `withdrawn` WHERE 1
			// SELECT `id`, `name`, `sname`, `created_at`, `updated_at` FROM `banks` WHERE 1
			$sql = "SELECT b.sname AS bank, c.amount AS amount, c.updated_at as udate FROM withdrawn c INNER JOIN banks b ON c.bank_id = b.id WHERE c.updated_at BETWEEN '".$_POST['from_date']."' AND '".$_POST['to_date']."' GROUP BY c.id;";
            $rwithdrawn = $obj->cquery($sql);

            if(!empty($rwithdrawn)){
				$i=0;
				$withdrawn = array();
				foreach ($rwithdrawn as $key => $value) {
					$withdrawn[$i]['bank'] = $value['bank'];
					$withdrawn[$i]['amount'] = number_format($value['amount']);
					$withdrawn[$i]['udate'] = date("j M Y", strtotime($value['udate']));
					$i++;
				}
				$response['withdrawn'] = $withdrawn;
            }
			/*======== END: Withdrawn Table =========*/



			/*======== START: Cash Table =========*/
			// SELECT `id`, `bank_id`, `amount`, `created_at`, `updated_at` FROM `cash` WHERE 1
			// SELECT `id`, `name`, `sname`, `created_at`, `updated_at` FROM `banks` WHERE 1
			$sql = "SELECT b.sname AS bank, c.amount AS amount, c.updated_at as udate FROM cash c INNER JOIN banks b ON c.bank_id = b.id WHERE c.updated_at BETWEEN '".$_POST['from_date']."' AND '".$_POST['to_date']."' GROUP BY c.id;";
            $rcash = $obj->cquery($sql);

            //if(!empty($rcash)){
				$i=0;
				$cash = array();
				foreach ($rcash as $key => $value) {
					$cash[$i]['bank'] = $value['bank'];
					$cash[$i]['amount'] = number_format($value['amount']);
					$cash[$i]['udate'] = date("j M Y", strtotime($value['udate']));
					$i++;
				}
				$response['cash'] = $cash;
            //}
			/*======== END: Cash Table =========*/



			/*======== START: Cards Cost Bar Chart and Table =========*/
			// SELECT `id`, `bank_id`, `amount`, `created_at`, `updated_at` FROM `cards` WHERE 1
			// SELECT `id`, `name`, `sname`, `created_at`, `updated_at` FROM `banks` WHERE 1
			$sql = "SELECT b.sname AS bank, SUM(c.amount) AS amount FROM cards c INNER JOIN banks b ON c.bank_id = b.id WHERE c.updated_at BETWEEN '".$_POST['from_date']."' AND '".$_POST['to_date']."' GROUP BY c.id;";
            $cards = $obj->cquery($sql);
			$response['cards'] = $cards;
			/*======== START: Cards Cost Bar Chart and Table =========*/



			/*======== START: Payment Type Cost Bar Chart and Table =========*/
            $sql = "SELECT c.sname AS bank, SUM(d.amount) AS amount FROM banks c INNER JOIN daily d ON c.id = d.banks_id WHERE d.updated_at BETWEEN '".$_POST['from_date']."' AND '".$_POST['to_date']."' GROUP BY d.banks_id;";
            $payments = $obj->cquery($sql);

            if(!empty($payments)){
				$response['payments'] = $payments;
            }
			/*======== START: Payment Type Cost Bar Chart and Table =========*/
			


			/*======== START: Category Cost Bar Chart and Table =========*/
            $sql = "SELECT c.name AS category, c.budget AS budget, SUM(d.amount) AS amount FROM categories c INNER JOIN daily d ON c.id = d.categories_id WHERE d.updated_at BETWEEN '".$_POST['from_date']."' AND '".$_POST['to_date']."' GROUP BY c.id;";
            $category = $obj->cquery($sql);

            if(!empty($category)){
				$response['category'] = $category;
            }
			/*======== START: Category Cost Bar Chart and Table =========*/




			/*======== START: Daily Cost Line Chart and Table =========*/
			/*amount: "3000"
			categories_id: "2"
			created_at: "0000-00-00 00:00:00"
			description: "Housekeeping"
			id: "13"
			name: "Housekeeping"
			updated_at: "2023-03-01 00:00:00"
			*/
			//$stop_date = date('Y-m-d', strtotime($_POST['to_date'] . ' +1 day'));
			$tsql = "SELECT SUM(amount) AS amount FROM daily WHERE updated_at BETWEEN '".$_POST['from_date']."' AND '".$_POST['to_date']."'";
			$tresult = $obj->cquery($tsql);
			$response['amount'] = $tresult;

			$sql = "SELECT * FROM daily WHERE updated_at BETWEEN '".$_POST['from_date']."' AND '".$_POST['to_date']."'";
			$dresult = $obj->cquery($sql);
			
			$banks = $obj->fetch('banks', array(), array());
			$bank = array();
			foreach ($banks as $key => $value) {
				$bank[$value['id']] = $value['sname'];
			}
			
			if(!empty($dresult)){
				$i = 1;
				$tk = 0;
				$k = 0;
				$j = 0;
				$date1=date("Y-m-d", strtotime($dresult[0]['updated_at']));
				foreach ($dresult as $key => $value) {
					$date2 = date("Y-m-d", strtotime($value['updated_at']));

					if (strtotime($date1) == strtotime($date2)) {
						$daily[$k]['sn'] = $i++;
						$daily[$k]['name'] = $value['name'];
						$daily[$k]['banks_id'] = $bank[$value['banks_id']];
						$daily[$k]['amount'] = number_format($value['amount']);
						$daily[$k]['date'] = date("j M Y", strtotime($value['updated_at']));

						$tk = $tk + $value['amount'];
					}else{
						$i = 0;

						$daily[$k]['sn'] = $i++;
						$daily[$k]['name'] = "Total";
						$daily[$k]['amount'] = number_format($tk);
						$daily[$k]['date'] = date("j M Y", strtotime($date1));

						$costData[$j] = intval($tk);
						$dateData[$j] = $date1;
						$j++;

						$k++;

						$daily[$k]['sn'] = $i++;
						$daily[$k]['name'] = $value['name'];
						$daily[$k]['banks_id'] = $bank[$value['banks_id']];
						$daily[$k]['amount'] = number_format($value['amount']);
						$daily[$k]['date'] = date("j M Y", strtotime($value['updated_at']));

						$date1 = date("Y-m-d", strtotime($value['updated_at']));
						$tk = $value['amount'];
					}
					$k++;

					$daily[$k]['sn'] = 0;
					$daily[$k]['name'] = "Total";
					$daily[$k]['amount'] = number_format($tk);
					$daily[$k]['date'] = date("j M Y", strtotime($date1));

					/*$j++;
					$dateData[$j] = $tk;
					$costData[$j] = $date1;*/
				}
				
				/*echo "<pre>";
				print_r($daily);
				echo "</pre>";*/
				$response['daily'] = $daily;
				$response['dateData'] = $dateData;
				$response['costData'] = $costData;
			}
			/*===== END: Daily Cost Line Chart and Table =========*/
			
			header('Content-Type: application/json');
			echo json_encode($response);
			exit();
		}
		/* ======= START: Index Search Operation ======== */


		/* ======= START: Insert and Update Banks+Categories ======== */
		if(($_GET["action"]=="update" || $_GET["action"]=="insert")) {
			$page=$_GET['page'];
			$action=$_GET['action'];
			$tablename = $_GET["page"];

			if($_GET["page"]=="courses" || $_GET["page"]=="institutions" || $_GET["page"]=="profession" || $_GET["page"]== "meeting")
				$ColumnVal = array("name"=>$_POST['name'],"description"=>$_POST['description'],"updated_at"=>date("Y-m-d H:i:sP"));
			/*elseif($_GET["page"]=="cash" || $_GET["page"]=="cards" || $_GET["page"]=="withdrawn")
				$ColumnVal = array("bank_id"=>$_POST['bank_id'],"amount"=>$_POST['amount'],"updated_at"=>$_POST['updated_at']);
			elseif($_GET["page"]=="daily")
				$ColumnVal = array("name"=>$_POST['name'],"description"=>$_POST['description'],"categories_id"=>$_POST['categories_id'],"amount"=>$_POST['amount'],"banks_id"=>$_POST['banks_id'],"updated_at"=>$_POST['updated_at']);
			*/

			if($action=="update"){
				$condition = array("id"=>$_POST['id']);
				$dbreturn = $obj->update($tablename, $ColumnVal, $condition);
			}else{
				$dbreturn = $obj->insert($tablename, $ColumnVal);
			}

			if($dbreturn["return"]){
				$data_result = "success";
				$data_msg = $dbreturn['msg'];
				$data_message = $page." Successfully ".$action;
			}else{
				$data_result ="failed";
				$data_msg = $dbreturn['msg'];
				$data_message = $page." unable to ".$action;
			}

			echo json_encode(['result'=>$data_result, 'msg'=>$data_msg, 'message'=>$data_message]);
		}
		/* ======= END: Insert and Update Tag ======== */




		/* ======= START: Delete Tag ======== */
		//if(($_GET["page"]=="banks" || $_GET["page"]=="categories") && $_GET["action"]=="delete") {
		if($_GET["action"]=="delete") {
			$page=$_GET['page'];
			$action=$_GET['action'];
			$id=$_GET['id'];

			$tablename = $_GET["page"];
			$DelColumnVal = array("id"=>$id);
			$dbreturn = $obj->delete($tablename, $DelColumnVal);

			if($dbreturn["return"]){
				$data_result = "success";
				$data_msg = $dbreturn['msg'];
				$data_message = $page." Successfully ".$action;
			}else{
				$data_result ="failed";
				$data_msg = $dbreturn['msg'];
				$data_message = $page." unable to ".$action;
			}
			echo json_encode(['result'=>$data_result, 'msg'=>$data_msg, 'message'=>$data_message]);	
		}


		/* ======= START: Update Budget Data ======== */
		if(($_GET["page"]=="budget" && $_GET["action"]=="modify" && isset($_GET["name"]))) {
			$page = $_GET["page"];
			$action = $_GET["action"];
			$name = $_GET["name"];
			$value = $_GET["value"];
			$date = $_GET["date"];
			
			/*echo "<pre>";
			print_r($_GET);
			echo "</pre>";*/

			$catid = $obj->fetch('categories', array('id'), array('name'=>$name));
			$cat_id = $catid[0]['id'];

			$get_budget_row = $obj->fetch($page, array(), array('categories_id'=>$cat_id, 'date'=>$date));
			/*echo "<pre>";
			print_r($get_budget_row);
			echo "</pre>"; 
			echo "<br>id=".$get_budget_row['id'];
			die;*/

			$dsplit = explode("-",$date);
			/*echo "<pre>";
			print_r($dsplit);
			echo "</pre>";*/
			$year = $dsplit[0];
			$month = $dsplit[1];

			//echo "<br>value=".$value." | categories_id=".$cat_id.' | month='.$month.' | year='.$year.' | date='.$date;
			// value=16750 | categories_id=1 | month=03 | year=2023 | date=2023-03
			if(!$get_budget_row) { //get_budget_row list is empty.
				//echo "<br>if";
				$dbreturn = $obj->insert($page, array('budget'=>$value,'categories_id'=>$cat_id,'month'=>$month,'year'=>$year, 'date'=>$date,'updated_at'=>date("Y-m-d h:i:sa")));
				//$delrow = $obj->delete($page, array('categories_id'=>$cat_id, 'date'=>$date));
		   	}else{ //get_budget_row list is not empty.
				//echo "<br>else";
				$dbreturn = $obj->update($page, array('budget'=>$value, 'updated_at'=>date("Y-m-d h:i:sa")),array('categories_id'=>$cat_id,'month'=>$month,'year'=>$year, 'date'=>$date));
			}

			if($dbreturn["return"]){
				$data_result = "success";
				$data_msg = $dbreturn['msg'];
				$data_message = $page." Successfully ".$action;
			}else{
				$data_result ="failed";
				$data_msg = $dbreturn['msg'];
				$data_message = $page." unable to ".$action;
			}


			/*
			if($action=="update"){
				$condition = array("id"=>$_POST['id']);
				$dbreturn = $obj->update($tablename, $ColumnVal, $condition);
			}else{
				$dbreturn = $obj->insert($tablename, $ColumnVal);
			}

			if($dbreturn["return"]){
				$data_result = "success";
				$data_msg = $dbreturn['msg'];
				$data_message = $page." Successfully ".$action;
			}else{
				$data_result ="failed";
				$data_msg = $dbreturn['msg'];
				$data_message = $page." unable to ".$action;
			}
			*/

			/*Array
			(
				[page] => budget
				[action] => modify
				[name] => House Rent
				[value] => 123
				[date] => 2023-02
			)*/
			echo json_encode(['result'=>$page, 'msg'=>$page, 'message'=>$action]);	
		}



	}//End of Action
	/* ======= END: Delete Tag ======== */

/*
// Assign table name
$tablename = "student";
// Create table query
$CreateTableSql = "CREATE TABLE $tablename(Roll INT,Name CHAR(50),Marks DOUBLE)";
//Call Create Table
$obj->CreateTable($CreateTableSql);
*/

/*
//Associative array for insert function
$InsColumnVal = array("Roll"=>4,"Name"=>'Zahan',"Marks"=>64.8);
//Call insert function to insert record
$obj->insert($tablename, $InsColumnVal);
*/


/*
//Associative array for delete function
$DelColumnVal = array("Roll"=>4,"Name"=>'Zahan');
//Call Delete function
$obj->delete($tablename, $DelColumnVal);
*/

/*
//Associative array to set query for update function
$set = array("Roll"=>5,"Marks"=>75.3);
//Associative array to condition query for update function
$condition = array("Roll"=>3,"Name"=>'Hatim');
//call update function
$obj->update($tablename, $set,$condition);
*/

/*
// Fetch data from the table
$show = $obj->fetch($tablename, array("Roll","Name","Marks"));
// Show data from table
echo "<pre>";
print_r($show);
echo "</pre>";
*/
?>