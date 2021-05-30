<?php
	if (isset($_POST['AddNewCat'])) {
		include_once "db_connect.php";
		include_once "function.inc.php";

	
		$addCat = $_POST['userAddCat'];
        
        
        $sql = "SELECT * FROM category WHERE cat_desc = ?;";
        
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error";
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "s", $addCat);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
        $resultData = mysqli_stmt_num_rows($stmt);
        if($resultData > 0){
            header("location: ../userproff.php?error=taken");
            exit();

        }
        else{
            $sql_ins = "INSERT INTO category (cat_desc) VALUES(?);";
	
	$stmt_ins = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt_ins, $sql_ins)) {
			echo "Statement Failed";
			exit();
	}
	mysqli_stmt_bind_param($stmt_ins, "s", $addCat);
	mysqli_stmt_execute($stmt_ins);
	header("location: ../userproff.php?add=success");

        }
        
        mysqli_stmt_close($stmt);
		
	}

	