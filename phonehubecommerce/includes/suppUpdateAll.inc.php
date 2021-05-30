<?php
	if (isset($_POST['updateAllProfD'])) {
		include_once "db_connect.php";
		include_once "function.inc.php";

	
		$suppsUpName = $_POST['suppsUpName'];
		$suppsUpMun = $_POST['suppsUpMun'];
		$suppsUpProv = $_POST['suppsUpProv'];
		$suppsUpPass = $_POST['suppsUpPass'];
		$suppSess = $_POST['suppSess'];
	

		$sql_ins = "UPDATE suppliers SET 
                    supp_name = ?, supp_mun = ?,
                    supp_prov = ?, supp_pass = ?
            
                    WHERE supp_id = ? ;";
	
	$stmt_ins = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt_ins, $sql_ins)) {
			echo "Statement Failed";
			exit();
	}
	mysqli_stmt_bind_param($stmt_ins, "sssss", $suppsUpName,$suppsUpMun,$suppsUpProv,$suppsUpPass,$suppSess);
	mysqli_stmt_execute($stmt_ins);
	header("location: ../shopfacee.php?add=success");
	}

	


