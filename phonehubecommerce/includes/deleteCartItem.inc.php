<?php
    if(isset($_POST['Itmdelete'])) {
        include_once "db_connect.php";
        
        $cartitemId = $_POST['cartORid'];
        
        $err;
        $sql = "DELETE FROM orders WHERE order_id = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
           echo "Statement Failed";
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "s", $cartitemId);
        mysqli_stmt_execute($stmt);
        
        $resultData = mysqli_stmt_get_result($stmt);
        
        if($resultData === 0){
            header("location: ../cart.php?error=Unknown");
            exit();
        }
        else{
            header("location: ../cart.php");
            exit();
        }
    
        
        mysqli_stmt_close($stmt);
    }


