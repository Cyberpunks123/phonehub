<?php 
	if(isset($_POST['submit'])){
		include_once "db_connect.php";
		include_once "function.inc.php";
		
		


		$username = htmlentities($_POST['username']);
		$firstname = htmlentities($_POST['firstname']);
		$lastname = htmlentities($_POST['lastname']);
		$useraddress = htmlentities($_POST['q']);
		$usergender = htmlentities($_POST['usergender']);
		$password = htmlentities($_POST['password']);
		
		if (emptyFields($username,$firstname,$lastname,$useraddress,$usergender,$password) !== false){
			header("Location: ../signup.php?error=emptyFields");
			exit();
		}

		else if (invaUname($username)  !== false) {
			header("Location: ../signup.php?error=invaUname");
			exit();
		}

		 else if (invaFName($firstname)  !== false) {
		 	header("Location: ../signup.php?error=invaFName");
		 	exit();
		 }

		 else if (invaLName($lastname)  !== false) {
		 	header("Location: ../signup.php?error=invaLName");
		 	exit();
		 }
		
		 else if (invaPass($password)  !== false) {
		 	header("Location: ../signup.php?error=invaPass");
		 			exit();
		 		}

		 	else{
		 		 $err;
    $sql = "SELECT * FROM `user` WHERE `user_name` = ?; ";
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
     header("Location: ../signup.php?error=stmtfailed");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "s" ,$username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
        
        $resultcheck = mysqli_stmt_num_rows($stmt);
        if($resultcheck > 0){
            header("Location: ../signup.php?error=usernametaken");
            exit();
        }
        else{
            $sql = "INSERT INTO `user` (`user_name`,`first_name`,`last_name`,`user_address`,`user_gender`,`user_pass`) 
            VALUES(?,?,?,?,?,?);";
    
    $stmt=mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)){
     return false;
        exit();
    
    }
    mysqli_stmt_bind_param($stmt, "ssssss" ,$username, $firstname, $lastname, $useraddress,$usergender, $password);
        mysqli_stmt_execute($stmt);
        header("Location: ../accnt.php?signin=success");
         mysqli_stmt_close($stmt);
    return true;
        }

    }
    mysqli_stmt_close($stmt);   
		 	}
	}


            else{
                 echo " ";
             }
        
		
