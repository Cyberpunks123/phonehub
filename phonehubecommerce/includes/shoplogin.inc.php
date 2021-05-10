<?php
if(isset($_POST['shoplogin'])){
include_once "db_connect.php";
include_once "function.inc.php";

    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    

        if (loggedempty($username, $password)  !== false) {
			header("Location: ../shopaccnt.php?error=loggedempty");
			exit();
		}

		else if (loggedinvaname($username)  !== false) {
			header("Location: ../shopaccnt.php?error=loggedinvaname");
			exit();
		}	
    
        else if (loggedinvapassw($password)  !== false) {
			header("Location: ../shopaccnt.php?error=loggedinvapassw");
			exit();
		}


        else {
            
    $err;
    $sql = "SELECT * FROM `suppliers` 
            WHERE `supp_username` = ? 
            AND `supp_pass` = ?;";
    $stmt=mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)){
     header("location: shopaccnt.php?error=stmtfailed");
        exit();
      }  
      else{
        mysqli_stmt_bind_param($stmt, "ss" ,$username,$password);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
      
         if($row = mysqli_fetch_assoc($resultData)){
             if ( $row == true) {
                session_start();
                $_SESSION['SUPID'] = $row['supp_id'];
                 $myshopid = $_SESSION['SUPID'];


                  header("location: ../shopface.php?disshop=$myshopid");
        exit();
            }
            else if ($row  == false)
            {
                  header("location: ../shopaccnt.php?error=wrongpass");
        exit();
            }
         }

         else{
            header("location: ../shopaccnt.php?error=Usernotfound");
        exit();
         }

      }   

    
    }
    }


?>