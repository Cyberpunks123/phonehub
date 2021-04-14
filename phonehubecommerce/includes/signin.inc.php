<?php 
	if(isset($_POST['submit'])){
		include_once "db_connect.php";
		include_once "function.inc.php";
		
		


		$username = htmlentities($_POST['username']);
		$firstname = htmlentities($_POST['firstname']);
		$lastname = htmlentities($_POST['lastname']);
		$useraddress = htmlentities($_POST['useraddress']);
		$usermuni = htmlentities($_POST['usermuni']);
		$userprov = htmlentities($_POST['userprov']);
		$usergender = htmlentities($_POST['usergender']);
		$password = htmlentities($_POST['password']);
		
		if (emptyFields($username,$firstname,$lastname,$useraddress,$usermuni,$userprov,$usergender,$password) !== false){
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

		 else if (invaAddress($useraddress)  !== false) {
		 	header("Location: ../signup.php?error=invaAddress");
		 	exit();
		 }
		
		 else if (invaPass($password)  !== false) {
		 	header("Location: ../signup.php?error=invaPass");
		 			exit();
		 		}
	}


		 if (createUser($conn,$username,$firstname,$lastname,$useraddress,$usermuni,$userprov,$usergender,$password) !== false){
			header("Location: ../accnt.php?signin=success");
			exit();  
		}

            else{
                 echo " ";
             }
        
		
