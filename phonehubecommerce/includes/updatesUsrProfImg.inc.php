<?php
	if (isset($_POST['updateUsrprfleImg'])) {
		include_once "db_connect.php";
		include_once "function.inc.php";

	
		$additemimage = $_POST['userdditemimage'];
		$additemSid = $_POST['useradditemSid'];
	

		$sql_ins = "UPDATE user SET user_image = ? 
                    WHERE user_id = ? ;";
	
	$stmt_ins = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt_ins, $sql_ins)) {
			echo "Statement Failed";
			exit();
	}
	mysqli_stmt_bind_param($stmt_ins, "ss", $additemimage,$additemSid);
	mysqli_stmt_execute($stmt_ins);
	header("location: ../userprof.php?default");
	}

	