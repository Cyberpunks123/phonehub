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


        else if (uidExists($conn, $username, $password) !== false) {
				 session_start();
                $_SESSION['UserId'] = $row ['user_id'];
                $_SESSION['UserName'] = $row ['user_name'];

                header("Location: ../shop.php?login=success");
                exit();
            }
        else {
            echo "User Not Found";
            header("Location: ../accnt.php?error=Usernotfound");
                exit();
        }
    }


?>
