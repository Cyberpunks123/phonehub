<?php
	if (isset($_POST['checkout'])) {
		include_once "db_connect.php";
		include_once "function.inc.php";
        

	

		$additemStat = $_POST['cartStat'];
		$sess = $_POST['mySess'];
		
        
        
        $sqlupdte = "UPDATE orders 
                        SET order_status = 'O'
                            WHERE user_id = ?;";
        
        
        
        	$stmtupdte = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmtupdte, $sqlupdte)) {
			echo "Statement Failed";
			exit();
	}
        mysqli_stmt_bind_param($stmtupdte, "s", $sess);
        mysqli_stmt_execute($stmtupdte);
        
        header("location: ../checkout.php?chckout=success");

        
    }


        
        
        


	
