<?php
    include_once "db_connect.php";
    include_once "function.inc.php";

function SearchingInShop($conn, $searchkey="X", $supp = "X", $suppitem = "X"){
  $err;
   if($searchkey == "X"){ 
       if($supp == "X"){
           if ($suppitem == "X"){
                $sql = "SELECT * FROM suppitems;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
           
       }
           
       }
       else{
           $sql = "SELECT * FROM `suppitems` WHERE cat_id = ?;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "s" , $suppitem);
       }

  }
    
    else{ 
         if($searchkey == "X"){
             $sql = "SELECT * 
                       FROM `suppitems`
                      WHERE supp_id = ?";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "s" , $supp);
          }
        else{
              $sql = "SELECT s.supp_item_id , s.supp_item_name, 
            s.supp_item_image , s.supp_item_code, 
            c.cat_desc , s.supp_item_price,
            s.supp_item_desc, s.supp_item_stat
            
            FROM `suppitems` s 
            JOIN `category` c 
            ON s.cat_id = c.cat_id 
            WHERE s.supp_item_name LIKE ?
            OR supp_item_name = ? 
            OR s.cat_id = ? 
            OR s.supp_item_code = ?
            AND supp_id = ?;";
        }
 
  $stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
     header("Location: shopface.php?error=sqlFailed");
                exit(); 
     exit();
   }  
    $itemname="%{$searchkey}%";
    mysqli_stmt_bind_param($stmt, "sssss", $itemname, $searchkey, $searchkey, $searchkey, $supp);  
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
  return $arr;

  mysql_stmt_close($stmt);

}
//----------------------------------------------
function AllitemsPerSupplier($conn, $supp = "X", $item = "X" ){
     $err;
     if($supp == "X"){
          if($item == "X"){
             $sql = "SELECT * FROM `suppitems`;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
          }
          else {
             $sql = "SELECT * FROM `suppitems` WHERE cat_id = ?;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "s" , $item);
          }
     }
     else
     {
          if($item == "X"){
             $sql = "SELECT s.supp_item_id, s.cat_id, s.supp_item_name, 
             s.supp_item_code, s.supp_item_price, s.supp_item_image, 
             s.supp_item_desc, s.supp_item_stat, c.cat_desc 
             FROM suppitems as s 
             JOIN category as c 
             on c.cat_id = s.cat_id 
             WHERE supp_id = ?
             ORDER BY supp_item_id DESC;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "s" , $supp);
          }
          else {
             $sql = "SELECT * FROM `suppitems` 
                    WHERE ( cat_id = ? 
                    OR supp_item_name = ? ) 
                    AND supp_id = ?;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "sss" , $item, $item, $supp);
          }
     }
         mysqli_stmt_execute($stmt);
        
      $resultData = mysqli_stmt_get_result($stmt);
      if(!empty($resultData)){
        $arr = array();
         while($row = mysqli_fetch_assoc($resultData)){
            array_push($arr,$row);
         }
          return $arr;
      } else
      {
          return false;
      }
         mysql_stmt_close($stmt);
 }


//---------------------------------------------
function DisplayEachShop($conn, $disshop="X"){
  $err;
   if($disshop == ""){
    $sql = "SELECT * FROM suppliers WHERE supp_id = ?;";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: shopface.php?error=sqlFailed");
                exit(); 
        }          

  }else{ 
  $sql = "SELECT * FROM suppliers WHERE supp_id = ?;";

  $stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
     header("Location: shopface.php?error=sqlFailed");
                exit(); 
     exit();
   }  
        mysqli_stmt_bind_param($stmt, "s",$disshop);  
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
  return $arr;

  mysql_stmt_close($stmt);

}

function DisplayEachUser($conn, $disuser="X"){
  $err;
   if($disuser == ""){
    $sql = "SELECT * FROM user WHERE user_id = ?;";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: userprof.php?error=sqlFailed");
                exit(); 
        }          

  }else{ 
  $sql = "SELECT * FROM user WHERE user_id = ?;";

  $stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
     header("Location: userprof.php?error=sqlFailed");
                exit(); 
     exit();
   }  
        mysqli_stmt_bind_param($stmt, "s",$disuser);  
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
  return $arr;

  mysql_stmt_close($stmt);

}



// --------------------------------------------------------------------------------------
function DisplayEachItem($conn, $disitem="X"){
  $err;
   if($disitem == "X"){
    $sql = "SELECT * FROM item as i 
            JOIN category as c
            on i.cat_id = c.cat_id 
            JOIN suppliers as s
            ON i.cat_id = s.supp_id 
            WHERE item_id = 1;";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: singleproduct.php?error=sqlFailed");
                exit(); 
        }          

  }else{ 
  $sql = "SELECT * FROM item as i 
            JOIN category as c
            on i.cat_id = c.cat_id 
            JOIN suppliers as s
            ON i.cat_id = s.supp_id 
            WHERE item_id = ?;";

  $stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
     header("Location: singleproduct.php?error=sqlFailed");
                exit(); 
     exit();
   }  
        mysqli_stmt_bind_param($stmt, "s", $disitem);  
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
  return $arr;

  mysql_stmt_close($stmt);

}


// ---------------------------------------------------------------
function searching($conn, $searchkey=""){
  $err;
   if($searchkey == ""){
    $sql = "SELECT * from item ;";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: singleproduct.php?error=sqlFailed");
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
     header("Location: singleproduct.php?error=sqlFailed");
                exit(); 
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
  return $arr;

  mysql_stmt_close($stmt);

}

// ----------------------------------------------
function getPrice($conn, $price_start = "all"){
     $err;
     if($supp_muni == "all"){
        $sql = "SELECT * FROM `suppliers`;";
         
         $stmt=mysqli_stmt_init($conn);
         if(!mysqli_stmt_prepare($stmt, $sql)){
            return false;
            exit;
         }  
     }else{
        $sql = "SELECT * FROM `suppliers` where supp_mun = ? ;";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            return false;
            exit;
         } 
        mysqli_stmt_bind_param($stmt, "s" , $supp_muni);
     }
     
         mysqli_stmt_execute($stmt);
        
         $resultData = mysqli_stmt_get_result($stmt);
      if(!empty($resultData)){
        $arr = array();
         while($row = mysqli_fetch_assoc($resultData)){
            array_push($arr,$row);
         }
          return $arr;
      } else
      {
          return false;
      }
         mysql_stmt_close($stmt);
 }

// ---------------------------------------------------------------
function getItemListperCategory($conn, $cat = "X", $item = "X" ){
     $err;
     if($cat == "X"){
          if($item == "X"){
             $sql = "SELECT * FROM `item`;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
          }
          else {
             $sql = "SELECT * FROM `item` WHERE cat_id = ?;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "s" , $item);
          }
     }
     else
     {
          if($item == "X"){
             $sql = "SELECT * 
                       FROM `item`
                      WHERE cat_id = ?";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "s" , $cat);
          }
          else {
             $sql = "SELECT * FROM `item`
             WHERE cat_id = ? 
             OR item_name = ?;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "ss" , $item, $cat);
          }
     }
         mysqli_stmt_execute($stmt);
        
      $resultData = mysqli_stmt_get_result($stmt);
      if(!empty($resultData)){
        $arr = array();
         while($row = mysqli_fetch_assoc($resultData)){
            array_push($arr,$row);
         }
          return $arr;
      } else
      {
          return false;
      }
         mysql_stmt_close($stmt);
 }



// ----------------------------------------------------------------
function allitemList($conn, $item_stat = "X", $item_code = "all", ){
     $err;
     if($item_code == "all"){
          if($item_stat == "X"){
             $sql = "SELECT * FROM `item`;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
          }
          else {
             $sql = "SELECT * FROM `item` WHERE item_stat = ?;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "s" , $item_stat);
          }
     }
     else
     {
          if($item_stat == "X"){
             $sql = "SELECT * 
                       FROM `item`
                      WHERE item_id = ?
                         OR item_stat = ?;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "ss" , $item_code, $item_code);
          }
          else {
             $sql = "SELECT * FROM `item`
                    WHERE item_id = ? 
                    OR item_stat = ?;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "ss" , $item_code, $item_stat);
          }
     }
         mysqli_stmt_execute($stmt);
        
      $resultData = mysqli_stmt_get_result($stmt);
      if(!empty($resultData)){
        $arr = array();
         while($row = mysqli_fetch_assoc($resultData)){
            array_push($arr,$row);
         }
          return $arr;
      } else
      {
          return false;
      }
         mysql_stmt_close($stmt);
 }


// ------------------------------------------------------------
function getSuppliers($conn, $supp_stat = "X", $supp = "all", ){
     $err;
     if($supp == "all"){
          if($supp_stat == "X"){
             $sql = "SELECT * FROM `suppliers`;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
          }
          else {
             $sql = "SELECT * FROM `suppliers` WHERE supp_stat = ?;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "s" , $supp_stat);
          }
     }
     else
     {
          if($supp_stat == "X"){
             $sql = "SELECT * 
                       FROM `suppliers`
                      WHERE supp_id = ?
                         OR supp_stat = ?;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "ss" , $supp, $supp);
          }
          else {
             $sql = "SELECT * FROM `suppliers` 
                   WHERE 
                   ( supp_id = ?
                         OR supp_stat = ? )
                   AND supp_stat = ?;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "sss" , $supp, $supp, $supp_stat);
          }
     }
         mysqli_stmt_execute($stmt);
        
      $resultData = mysqli_stmt_get_result($stmt);
      if(!empty($resultData)){
        $arr = array();
         while($row = mysqli_fetch_assoc($resultData)){
            array_push($arr,$row);
         }
          return $arr;
      } else
      {
          return false;
      }
         mysql_stmt_close($stmt);
 }

 function getCategory($conn, $cat_id = "all"){
     $err;
     if($cat_id == "all"){
        $sql = "SELECT * FROM `category`;";
         
         $stmt=mysqli_stmt_init($conn);
         if(!mysqli_stmt_prepare($stmt, $sql)){
            return false;
            exit;
         }  
     }else{
        $sql = "SELECT * FROM `category` where cat_id = ? ;";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            return false;
            exit;
         } 
        mysqli_stmt_bind_param($stmt, "s" , $cat_id);
     }
     
         mysqli_stmt_execute($stmt);
        
         $resultData = mysqli_stmt_get_result($stmt);
      if(!empty($resultData)){
        $arr = array();
         while($row = mysqli_fetch_assoc($resultData)){
            array_push($arr,$row);
         }
          return $arr;
      } else
      {
          return false;
      }
         mysql_stmt_close($stmt);
 }


function getItemListperSupplier($conn, $supp = "X", $item = "X" ){
     $err;
     if($supp == "X"){
          if($item == "X"){
             $sql = "SELECT * FROM `suppitems`;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
          }
          else {
             $sql = "SELECT * FROM `suppitems` WHERE cat_id = ?;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "s" , $item);
          }
     }
     else
     {
          if($item == "X"){
             $sql = "SELECT * 
                       FROM `suppitems`
                      WHERE supp_id = ?";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "s" , $supp);
          }
          else {
             $sql = "SELECT * FROM `suppitems` 
                    WHERE ( cat_id = ? 
                    OR supp_item_name = ? ) 
                    AND supp_id = ?;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "sss" , $item, $item, $supp);
          }
     }
         mysqli_stmt_execute($stmt);
        
      $resultData = mysqli_stmt_get_result($stmt);
      if(!empty($resultData)){
        $arr = array();
         while($row = mysqli_fetch_assoc($resultData)){
            array_push($arr,$row);
         }
          return $arr;
      } else
      {
          return false;
      }
         mysql_stmt_close($stmt);
 }

function usrnametaken ($conn, $username){
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
            header("Location: signup.php?error=usernametaken");
            exit();
        }
        else if ($resultcheck == $username) {
            header("Location: ../accnt.php?signin=success");
             return $resultcheck;
            exit();
        }
        else{
             echo "bubu";
        }
    }
    mysqli_stmt_close($stmt);
}
    
    
//----------------sign in---------------------//

    function emptyFields($username,$firstname,$lastname,$useraddress,$usermuni,$userprov,$usergender,$password){
        $err;
        if (empty($username) || empty($firstname) || empty($lastname) || empty($useraddress) || empty($usermuni) || empty($userprov) || empty($usergender) || empty($password)) {
            $err = true;
        }
        else{
            $err = false;
        }
        return $err;
    }

    function invaUname($username){
        $err;
        if (!preg_match("/^[a-zA-Z0-9@]*$/", $username) ){
           $err = true;
        }
        else{
            $err = false;
        }
        return $err;
    }

    function invaFName($firstname){
    $err;
    if (!preg_match("/^[a-z A-Z]*$/", $firstname) ) {
        $err = true;
    }
    else{
        $err = false;
    }
    return $err;
}
    
     function invaLName($lastname){
    $err;
    if (!preg_match("/^[a-z A-Z .]*$/", $lastname) ) {
        $err = true;
    }
    else{
        $err = false;
    }
    return $err;
}

 function invaAddress($useraddress){
    $err;
    if (!preg_match("/^[a-zA-Z 0-9 ,-]*$/", $useraddress) ) {
        $err = true;
    }
    else{
        $err = false;
    }
    return $err;
}

function invaPass($password){
    $err;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $password) ) {
        $err = true;
    }
    else{
        $err = false;
    }
    return $err;
}

//---------------log in-------------------//
 function loggedempty($username,$password){
        $err;
        if (empty($username) || empty($password)) {
            $err = true;
        }
        else{
            $err = false;
        }
        return $err;
    }

 function loggedinvaname($username){
        $err;
        if (!preg_match("/^[a-zA-Z0-9@]*$/", $username) ){
           $err = true;
        }
        else{
            $err = false;
        }
        return $err;
    } 

    function loggedinvapassw($password){
        $err;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $password) ){
           $err = true;
        }
        else{
            $err = false;
        }
        return $err;
    }








?>
