<?php
	if (isset($_POST['addnewItem'])) {
		include_once "db_connect.php";
		include_once "function.inc.php";

		$additemname = $_POST['additemname'];
		$additemcategory = $_POST['additemcategory'];
		$additemprice = $_POST['additemprice'];
		$additemimage = $_POST['additemimage'];
		$additemdesc = $_POST['additemdesc'];
        $additemcode = $_POST['additemcode'];
        $additemsUid = $_POST['additemsUid'];

        
    
            
        
        
        $sql_ins = "INSERT INTO `item`( cat_id, item_name, item_image, item_price, item_desc, item_code, user_id)
					 VALUES (?,?,?,?,?,?,?);";
	
	$stmt_ins = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt_ins, $sql_ins)) {
			echo "Statement Failed";
			exit();
	}
	mysqli_stmt_bind_param($stmt_ins, "sssssss", $additemcategory,$additemname,$additemimage,$additemprice,$additemdesc,$additemcode,$additemsUid);
	mysqli_stmt_execute($stmt_ins);
	echo "Record has been Added";
	}
        
	

	