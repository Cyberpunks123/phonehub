<?php
	if (isset($_POST['addTocart'])) {
		include_once "db_connect.php";
		include_once "function.inc.php";

		$quan = $_POST['quantity'];
		$itID = $_POST['itemId'];
		$itIDshop = $_POST['itemIds'];
		$UidSess = $_POST['itemSess'];
		$itNAME = $_POST['itemName'];
		$itPRC = $_POST['itemPrice'];
		$itCODE = $_POST['itemCode'];
		$itIMG = $_POST['itemImg'];
		
        

        
        $sql_ins = "INSERT INTO `orders`(`user_id`, `item_id`, `supp_item_id`,
                    `order_item_name`, `order_item_code`, 
                    `order_item_price`, `order_qty`, `order_item_image`) 
                    
                    VALUES (?,?,?,?,?,?,?,?);";
        
        
	
	$stmt_ins = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt_ins, $sql_ins)) {
			echo "Statement Failed";
			exit();
	}
	mysqli_stmt_bind_param($stmt_ins, "ssssssss", $UidSess,$itID,$itIDshop,$itNAME,$itCODE,$itPRC,$quan,$itIMG);
	mysqli_stmt_execute($stmt_ins);
           header("location: ../cart.php?add=succes");
    }
        
	

	








