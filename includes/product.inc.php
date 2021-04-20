<?php
 include_once "includes/db_connect.php"; 
  $searchkey="";
if (isset($_GET['searchkey'])){
   $searchkey=htmlentities($_GET['searchkey']);     
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/bootstrap-icons.css">
    <style>
      img{
        width: 200px
      }
    </style>
</head>
<body>      
<div class="container-fluid">

  <?php
  //declare the SQL
  //Scenario: I wanted to show item_id, item_name, item_short_code
  //          category description, price
  if($searchkey == ""){
    $sql = "SELECT i.item_id
            , i.item_name
            , i.item_image
            , c.cat_desc
            , i.item_price
         FROM `item` i
         JOIN `category` c
           ON i.cat_id = c.cat_id ;";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "Statement Failed.";
        exit(); 
        }          

  }else{ 
  $sql = "SELECT i.item_id
            , i.item_name
            , i.item_image
            , i.item_code
            , c.cat_desc
            , i.item_price
         FROM `item` i
         JOIN `category` c
           ON i.cat_id = c.cat_id
         Where  i.item_name LIKE ?
            OR i.item_name = ?
            OR c.cat_id = ?
           OR i.item_code = ?;";

  $stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
     echo "Statement Failed.";
     exit();
   }  
    $itemname="%{$searchkey}%";
    mysqli_stmt_bind_param($stmt, "ssss", $itemname, $searchkey, $searchkey, $searchkey);  
  }
  //it will execute the statement 
   mysqli_stmt_execute($stmt);
  //get the results of the executed statement and put it into a variable
   $resultData = mysqli_stmt_get_result($stmt);
  //declare a container array.
   $arr=array();
   while($row = mysqli_fetch_assoc($resultData)){
       //we will do the transfer of data to another array to test 
       //if there is a result.
       array_push($arr,$row);
   }
   // if the new array is not empty, display the tabular representation
   // as HTML
   if(!empty($arr)){
      echo "<table class='table'>";
      echo "<thead>";
      echo "<th> Item Image </th>";
      echo "<th> Item Name </th>";
      echo "<th> Category </th>";
      echo "<th> Price </th>";
      echo "<th> Actions </th>";
      echo "</thead>";
      foreach($arr as $key => $val){
      echo "<tr>";
          echo "<td> <img src='img/" . $val['item_image']."'></td>";
          echo "<td>" . $val['item_name'] . "</td>";
          echo "<td>" . $val['cat_desc'] . "</td>";
          echo "<td> Php ". number_format($val['item_price'],2) . "</td>";
          echo "<td> <a href='orderform.php?itemid=".$val['item_id']."' class='btn btn-primary'>order this item</a> </td>";
      echo "</tr>";
      }
      echo "<tr >";
          echo "<td colspan=4 class='text-center'><em>End of result</em></td>";
      echo "</tr>";
  echo "</table>";
   }
   else{
       echo "<h4> No Records Found.</h4>";
   }
  ?>
  </div>
</div>
</div>
     
</body>
<?php mysqli_close($conn);?>
<script src="js/bootstrap.min.js"></script>
</html>