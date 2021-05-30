<?php 
    if(isset($_POST['deleteDel'])) {
        include_once "db_connect.php";
        
        $deliverID = $_POST['deliverDEL'];
        
        $err;
        $sql = "DELETE FROM orders WHERE order_id = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
           echo "Statement Failed";
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "s", $deliverID);
        mysqli_stmt_execute($stmt);
        
        $resultData = mysqli_stmt_get_result($stmt);
        
        if($resultData === 0){
            header("location: ../userproff.php?error=Unknown");
            exit();
        }
        else{
            header("location: ../userproff.php?add=success");
            exit();
        }
    
        
        mysqli_stmt_close($stmt);
    }


