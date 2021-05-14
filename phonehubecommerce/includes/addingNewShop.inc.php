<?php
	if (isset($_POST['createNwShop'])) {
		include_once "db_connect.php";
		include_once "function.inc.php";

		$suppsUpName = $_POST['suppsUpName'];
		$suppsUpUsrName = $_POST['suppsUpUsrName'];
		$suppsUpMun = $_POST['suppsUpMun'];
		$suppsUpProv = $_POST['suppsUpProv'];
        $suppsUpPass = $_POST['suppsUpPass'];

        $sql_ins = "INSERT INTO `suppliers`( supp_name, supp_username, 
                        supp_mun, supp_prov, supp_pass)
					 VALUES (?,?,?,?,?);";
	
	$stmt_ins = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt_ins, $sql_ins)) {
			echo "Statement Failed";
			exit();
	}
	mysqli_stmt_bind_param($stmt_ins, "sssss", $suppsUpName,$suppsUpUsrName,$suppsUpMun,$suppsUpProv,$suppsUpPass);
	mysqli_stmt_execute($stmt_ins);
    header("location: logout.inc.php");
	}
        
	

