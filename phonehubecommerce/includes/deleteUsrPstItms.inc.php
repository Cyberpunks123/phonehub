<?php 
    if(isset($_POST['usrdeleteIt'])) {
        include_once "db_connect.php";
        
        $delUseritem = $_POST['delUseritem'];
        
        $err;
        $sql = "DELETE FROM item WHERE item_id = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
           echo "Statement Failed";
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "s", $delUseritem);
        mysqli_stmt_execute($stmt);
        
        $resultData = mysqli_stmt_get_result($stmt);
        
        if($resultData === 0){
            header("location: ../userproff.php?error=Unknown");
            exit();
        }
        else{
            header("location: ../userproff.php?posted");
            exit();
        }
    
        
        mysqli_stmt_close($stmt);
    }


