<?php
	if (isset($_POST['updateprfleImg'])) {
		include_once "db_connect.php";
		include_once "function.inc.php";

	
		$suppadditemimage = $_POST['suppadditemimage'];
		$suppadditemSid = $_POST['suppadditemSid'];
	

		$sql_ins = "UPDATE suppliers SET supp_image = ? 
                    WHERE supp_id = ? ;";
	
	$stmt_ins = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt_ins, $sql_ins)) {
			echo "Statement Failed";
			exit();
	}
	mysqli_stmt_bind_param($stmt_ins, "ss", $suppadditemimage,$suppadditemSid);
	mysqli_stmt_execute($stmt_ins);
	header("location: ../shopface.php?default");
	}

	