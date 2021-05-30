<?php 
    if(isset($_POST['subdelete'])) {
        include_once "db_connect.php";
        
        $shopitemId = $_POST['delsupitem'];
        
        $err;
        $sql = "DELETE FROM `suppitems` WHERE supp_item_id = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
           echo "Statement Failed";
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "s", $shopitemId);
        mysqli_stmt_execute($stmt);
        
        $resultData = mysqli_stmt_get_result($stmt);
        
        if($resultData === 0){
            header("location: ../shopfacee.php?error=Unknown");
            exit();
        }
        else{
            header("location: ../shopfacee.php?add=success");
            exit();
        }
    
        
        mysqli_stmt_close($stmt);
    }


