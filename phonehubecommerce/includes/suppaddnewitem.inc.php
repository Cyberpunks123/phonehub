<?php
	if (isset($_POST['suppaddnewItem'])) {
		include_once "db_connect.php";
		include_once "function.inc.php";

		$suppadditemname = $_POST['suppadditemname'];
		$suppadditemcategory = $_POST['suppadditemcategory'];
		$suppadditemprice = $_POST['suppadditemprice'];
		$suppadditemimage = $_POST['suppadditemimage'];
		$suppadditemdesc = $_POST['suppadditemdesc'];
        $suppadditemcode = $_POST['suppadditemcode'];
        $suppadditemSid = $_POST['suppadditemSid'];

		$sql_ins = "INSERT INTO `suppitems`( cat_id, supp_item_name, supp_item_image, supp_item_price, supp_item_desc, supp_item_code, supp_id)
					 VALUES (?,?,?,?,?,?,?);";
	
	$stmt_ins = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt_ins, $sql_ins)) {
			echo "Statement Failed";
			exit();
	}
	mysqli_stmt_bind_param($stmt_ins, "sssssss", $suppadditemcategory,$suppadditemname,$suppadditemimage,$suppadditemprice,$suppadditemdesc,$suppadditemcode,$suppadditemSid);
	mysqli_stmt_execute($stmt_ins);
	header("location: ../shopface.php?recordman");
	}

	