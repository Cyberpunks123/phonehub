<?php
if(isset($_POST['login'])){
include_once "db_connect.php";
include_once "function.inc.php";

    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    

        if (loggedempty($username, $password)  !== false) {
			header("Location: ../accnt.php?error=loggedempty");
			exit();
		}

		else if (loggedinvaname($username)  !== false) {
			header("Location: ../accnt.php?error=loggedinvaname");
			exit();
		}	
    
        else if (loggedinvapassw($password)  !== false) {
			header("Location: ../accnt.php?error=loggedinvapassw");
			exit();
		}


        else {
            
    $err;
    $sql = "SELECT * FROM `user` 
            WHERE `user_name` = ? 
            AND `user_pass` = ?;";
    $stmt=mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)){
     header("location: accnt.php?error=stmtfailed");
        exit();
      }  
      else{
        mysqli_stmt_bind_param($stmt, "ss" ,$username,$password);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
      
         if($row = mysqli_fetch_assoc($resultData)){
            // $passcheck = password_verify($password, $row['user_pass']);
        //     if ($passcheck == false) {
        //          header("location: accnt.php?error=Usernotfound");
        // exit();
        //     }
             if ( $row == true) {
                session_start();
                $_SESSION['USER'] = $row['user_id'];

                  header("location: ../shop.php?login=success");
        exit();
            }
            else if ($row  == false)
            {
                  header("location: accnt.php?error=wrongpass");
        exit();
            }
         }

         else{
            header("location: accnt.php?error=Usernotfound");
        exit();
         }

      }   

    
    }
        


     //    else if (uidExists($conn, $username, $password) !== false) {
				 // $sesscheck = $row;

     //             if ($sesscheck == $resultData) {
     //               echo "hello";
     //             }

     //            // header("Location: ../shop.php?login=success");
     //            // exit();
     //        }
        // else {
        //     echo "User Not Found";
        //     header("Location: ../accnt.php?error=Usernotfound");
        //         exit();
        // }
    }


?>
