<?php
class School
{
	private $host  = 'localhost';
	private $user  = 'root';
	private $password   = '';
	private $database  = 'school';
	private $adminTable = 'admin';
	private $studentTable = 'students';
	private $student_feesTable = 'student_fees';
	private $feesTable = 'fees';
	private $techerTable = 'techer';


	private $dbConnect = false;
	public function __construct()
	{
		if (!$this->dbConnect) {
			$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
			if ($conn->connect_error) {
				die("Error failed to connect to MySQL: " . $conn->connect_error);
			} else {
				$this->dbConnect = $conn;
			}
		}
	}
	private function getData($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ' . mysqli_error($sqlQuery));
		}
		$data = array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

	public function login($email, $password)
	{
		// $password = md5($password);
		$sqlQuery = "
			SELECT id, email, password, name
			FROM " . $this->adminTable . " 
			WHERE email='" . $email . "' AND password='" . $password . "'";
		return  $this->getData($sqlQuery);
	}
	public function checkLogin()
	{
		if (empty($_SESSION['id'])) {
			header("Location:login.php");
		}
	}
	
	// student functions 
	public function addStudent()
	{
		$roll_gen = "SELECT COUNT(*) AS count FROM " . $this->studentTable . " WHERE class='" . $_POST['class'] . "'";
		$result = mysqli_query($this->dbConnect, $roll_gen);

		$row = mysqli_fetch_assoc($result);
		$rowcount = $row['count'];
		$roll_no= $_POST['class'] ."AVM". $rowcount+1;
		$sqlInsert = "
			INSERT INTO ".$this->studentTable."(roll_no,name,email,class,address,mob,gender,password) 
			VALUES ('$roll_no','".$_POST['name']."', '".$_POST['email']."', '".$_POST['class']."','".$_POST['address']."', '".$_POST['mob']."', '".$_POST['gender']."','".$_POST['password']."')";		
		mysqli_query($this->dbConnect, $sqlInsert);

		//student fess table data
		$fee_query="SELECT  fees FROM " . $this->feesTable . " WHERE class='" . $_POST['class'] . "'";
		$fee_result = mysqli_query($this->dbConnect, $fee_query);
		$fee_row = mysqli_fetch_assoc($fee_result);
		$fee=$fee_row['fees'];
		$feeInsert = "
			INSERT INTO ".$this->student_feesTable."(roll_no,name,class,due_fee,total_fees) 
			VALUES ('$roll_no','".$_POST['name']."',  '".$_POST['class']."','$fee', '$fee')";		
		mysqli_query($this->dbConnect, $feeInsert);
		
		echo "<script>
		alert('Save data successfully	');
		window.location.href='index.php'
		</script>";
	}
	public function showStudents(){
		$sqlselect="SELECT * FROM $this->studentTable";
		$result = mysqli_query($this->dbConnect, $sqlselect);
		return $result;		
	} 

	public function editstudent(){
		$sqlselect="SELECT * FROM " . $this->studentTable . " WHERE roll_no='" . $_GET['roll_no'] . "'";

		$result = mysqli_query($this->dbConnect, $sqlselect);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}

	public function studentEdit(){
		$updatequery="Update " . $this->studentTable . " SET name='".$_POST['name']."',email='".$_POST['email']."',password='".$_POST['password']."',mob='".$_POST['mob']."',gender='".$_POST['gender']."' WHERE roll_no = '".$_POST['roll_no']."'";
		// die($updatequery);
		mysqli_query($this->dbConnect, $updatequery);
		
		echo "<script>
		alert('Save data successfully');
		window.location.href='showstudent.php'
		</script>";
	}

	public function deletestudent(){
		$sqldelete="DELETE FROM " . $this->studentTable . " WHERE roll_no = '".$_GET['roll_no']."'";
		// die($sqldelete);
		mysqli_query($this->dbConnect, $sqldelete);
		
		echo "<script>
		alert(' data successfully deleted');
		window.location.href='showstudent.php'
		</script>";
	}
	
	public function showStudentsFee(){
		$sqlselect="SELECT * FROM $this->student_feesTable";
		$result = mysqli_query($this->dbConnect, $sqlselect);
		return $result;		
	} 

	public function editstudentFEE(){
		$sqlselect="SELECT * FROM " . $this->student_feesTable . " WHERE roll_no='" . $_GET['roll_no'] . "'";

		$result = mysqli_query($this->dbConnect, $sqlselect);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}

	public function studentFeeUpdate(){
		$updatequery="Update " . $this->student_feesTable . " SET paid_fee='".$_POST['paid_fee']."',due_fee='".$_POST['due_fee']."' WHERE roll_no = '".$_POST['roll_no']."'";
		// die($updatequery);
		mysqli_query($this->dbConnect, $updatequery);
		
		echo "<script>
		alert(' data successfully UPDATE');
		window.location.href='studentFEE.php'
		</script>";
	}


	// Techer Functions 
	public function addtecher(){
		extract($_POST);
		$class= implode(",",$class);
		$sqlInsert="INSERT INTO " . $this->techerTable. "(name,email, mob, gender, address, subject, class, salary,joining_date) 
		VALUES('$name','$email','$mob','$gender','$address','$subject','$class','$salary','$joining_date')";
		mysqli_query($this->dbConnect, $sqlInsert);
		echo "<script>
		alert(' data successfully UPDATE');
		window.location.href='addTecher.php'
		</script>";
	}
	public function showTechers(){
		$sqlselect="SELECT * FROM $this->techerTable";
		$result = mysqli_query($this->dbConnect, $sqlselect);
		return $result;		
	} 

	public function editTeacher(){
		$sqlselect="SELECT * FROM " . $this->techerTable . " WHERE id='" . $_GET['id'] . "'";

		$result = mysqli_query($this->dbConnect, $sqlselect);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}

	public function TecherEdit(){
		extract($_POST);
		$class= implode(",",$class);
		$updatequery="Update " . $this->techerTable . " SET name='$name',email='$email',mob='$mob',address='$address',subject='$subject',salary='$salary',class='$class',gender='$gender' WHERE id = '$id'";
		mysqli_query($this->dbConnect, $updatequery);
		
		echo "<script>
		alert(' data successfully UPDATE');
		window.location.href='ShowTechers.php'
		</script>";
	}
	public function deleteTecher(){
		$sqldelete="DELETE FROM " . $this->techerTable . " WHERE id = '".$_GET['teacher_id']."'";
		// die($sqldelete);
		mysqli_query($this->dbConnect, $sqldelete);
		
		echo "<script>
		alert(' data successfully deleted');
		window.location.href='ShowTechers.php'
		</script>";
	}

	public function addFee(){
		extract($_POST);
		$sqlInsert="INSERT INTO ". $this->feesTable . "(class, fees)
		 VALUES ('$class','$fees')";
		 mysqli_query($this->dbConnect, $sqlInsert);
		echo "<script>
		alert(' data successfully Save');
		window.location.href='FEES.php'
		</script>";
	}

	public function showFEE(){
		$sqlselect="SELECT * FROM $this->feesTable";
		$result = mysqli_query($this->dbConnect, $sqlselect);
		return $result;		
	} 
	public function editFees(){
		$sqlselect="SELECT * FROM " . $this->feesTable . " WHERE id='" . $_GET['id'] . "'";

		$result = mysqli_query($this->dbConnect, $sqlselect);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}
	public function FeesEdit(){
		extract($_POST);
		
		$updatequery="Update " . $this->feesTable . " SET fees='$fees' WHERE id = '$id'";
		mysqli_query($this->dbConnect, $updatequery);
		
		echo "<script>
		alert(' data successfully UPDATE');
		window.location.href='Fees.php'
		</script>";
	}

	public function deleteFees(){
		$sqldelete="DELETE FROM " . $this->feesTable . " WHERE id = '".$_GET['Fee_id']."'";
		// die($sqldelete);
		mysqli_query($this->dbConnect, $sqldelete);
		
		echo "<script>
		alert(' data successfully deleted');
		window.location.href='FEES.php'
		</script>";
	}

	// deshboard functions 
	public function totalstudents(){
		$sqlSelect="SELECT COUNT(*) AS count FROM  $this->studentTable ";
		$result = mysqli_query($this->dbConnect, $sqlSelect);

		$row = mysqli_fetch_assoc($result);
		$rowcount = $row['count'];
		return $rowcount;
	}
	public function totaltechers(){
		$sqlSelect="SELECT COUNT(*) AS count FROM  $this->techerTable ";
		$result = mysqli_query($this->dbConnect, $sqlSelect);

		$row = mysqli_fetch_assoc($result);
		$rowcount = $row['count'];
		return $rowcount;
	}
	public function totalClasses(){
		$sqlSelect="SELECT COUNT(*) AS count FROM  $this->feesTable ";
		$result = mysqli_query($this->dbConnect, $sqlSelect);

		$row = mysqli_fetch_assoc($result);
		$rowcount = $row['count'];
		return $rowcount;
	}

	public function totalpaidfee(){
		$sqlSelect="SELECT SUM(paid_fee) FROM $this->student_feesTable WHERE  date > now() - INTERVAL 7 day";
		$result = mysqli_query($this->dbConnect, $sqlSelect);
		$row = mysqli_fetch_assoc($result);
		$rowcount = $row['SUM(paid_fee)'];
		return $rowcount;
	}

	public function newStudents(){
		$sqlSelect="SELECT * FROM $this->studentTable WHERE  date > now() - INTERVAL 7 day";
		$result = mysqli_query($this->dbConnect, $sqlSelect);
		return $result;
	}
}
