<?php
	if (isset($_POST['updateAllProfDU'])) {
		include_once "db_connect.php";
		include_once "function.inc.php";

	
		$Fname = $_POST['usrUpFName'];
		$Lname = $_POST['usrUpLName'];
		$addrss = $_POST['usrUpAdd'];
		$mun = $_POST['usrUpMun'];
		$prov = $_POST['usrUpProv'];
		$passW = $_POST['usrUpPass'];
		$usrSess = $_POST['usrSess'];
	

		$sql_ins = "UPDATE user SET 
                    first_name = ?, last_name = ?,
                    user_address = ?, user_muni = ?, 
                    user_prov = ?, user_pass = ?
            
                    WHERE user_id = ? ;";
	
	$stmt_ins = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt_ins, $sql_ins)) {
			echo "Statement Failed";
			exit();
	}
	mysqli_stmt_bind_param($stmt_ins, "sssssss", $Fname,$Lname,$addrss,$mun,$prov,$passW,$usrSess);
	mysqli_stmt_execute($stmt_ins);
	header("location: ../userprof.php?default");
	}

	


