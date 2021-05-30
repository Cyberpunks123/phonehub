<?php 
        if(isset($_POST['recievecart'])) {
        include_once "db_connect.php";
            
            $stat = $_POST['recStat'];
            $sess = $_POST['recSess'];
            $recid = $_POST['recID'];
            
            
             $sqlupdte = "UPDATE orders 
                        SET order_status = 'D'
                            WHERE order_id = ?;";
        
        	$stmtupdte = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmtupdte, $sqlupdte)) {
			echo "Statement Failed";
			exit();
        }
            mysqli_stmt_bind_param($stmtupdte, "s", $recid);
            mysqli_stmt_execute($stmtupdte);
            
             header("location: ../userproff.php?add=success");
            
}