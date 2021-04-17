<?php
    include_once "db_connect.php";
    include_once "function.inc.php";

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
             $sql = "SELECT * FROM `item`;";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
          }
          else {
             $sql = "SELECT * FROM `item` WHERE item_id = ?;";
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
                      WHERE supp_id = ?";
              $stmt=mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                 return false;
                exit;
              }
              mysqli_stmt_bind_param($stmt, "s" , $supp);
          }
          else {
             $sql = "SELECT * FROM `item` 
                   WHERE 
                   ( item_id = ?
                         OR item_name = ? )
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

// function createUser($conn,$username,$firstname,$lastname,$useraddress,$usermuni,$userprov,$usergender,$password){
//     $err;
//     $sql = "SELECT * FROM `user` WHERE `user_name` = ?; ";
    
//     $stmt = mysqli_stmt_init($conn);
//     if(!mysqli_stmt_prepare($stmt, $sql)){
//      header("Location: ../signup.php?error=stmtfailed");
//         exit();
//     }
//     else{
//         mysqli_stmt_bind_param($stmt, "s" ,$username);
//         mysqli_stmt_execute($stmt);
//         mysqli_stmt_store_result($stmt);
        
        
//         $resultcheck = mysqli_stmt_num_rows($stmt);
//         if($resultcheck > 0){
//             header("Location: signup.php?error=usernametaken");
//             exit();
//         }
//         else{
//             $sql = "INSERT INTO `user` (`user_name`,`first_name`,`last_name`,`user_address`,`user_muni`,`user_prov`,`user_gender`,`user_pass`) 
//             VALUES(?,?,?,?,?,?,?,?);";
    
//     $stmt=mysqli_stmt_init($conn);
    
//     if(!mysqli_stmt_prepare($stmt, $sql)){
//      return false;
//         exit();
    
//     }
//     mysqli_stmt_bind_param($stmt, "ssssssss" ,$username, $firstname, $lastname, $useraddress,$usermuni,$userprov,$usergender, $password);
//         mysqli_stmt_execute($stmt);
//         header("Location: ..signup.php?signin=success");
//          mysqli_stmt_close($stmt);
//     return true;
//         }

//     }
//     mysqli_stmt_close($stmt);   
// }



// function usrnametaken ($conn, $username){
//     $err;
//     $sql = "SELECT * FROM `user` WHERE `user_name` = ?; ";
    
//     $stmt = mysqli_stmt_init($conn);
//     if(!mysqli_stmt_prepare($stmt, $sql)){
//      header("Location: ../signup.php?error=stmtfailed");
//         exit();
//     }
//     else{
//         mysqli_stmt_bind_param($stmt, "s" ,$username);
//         mysqli_stmt_execute($stmt);
//         mysqli_stmt_store_result($stmt);
        
        
//         $resultcheck = mysqli_stmt_num_rows($stmt);
//         if($resultcheck > 0){
//             header("Location: signup.php?error=usernametaken");
//             exit();
//         }
//         else if ($resultcheck == $username) {
//             header("Location: ../accnt.php?signin=success");
//              return $resultcheck;
//             exit();
//         }
//         else{
//              echo "bubu";
//         }
//     }
//     mysqli_stmt_close($stmt);
// }
    
    
    
 function uidExists($conn, $username, $password){
     $err;
     $sql = "SELECT * FROM `user` 
             WHERE `user_name` = ? 
             AND `user_pass` = ?;";
     $stmt=mysqli_stmt_init($conn);
  
     if(!mysqli_stmt_prepare($stmt, $sql)){
      header("location: accnt.php?error=stmtfailed");
         exit();
       }  
         mysqli_stmt_bind_param($stmt, "ss" ,$username,$password);
         mysqli_stmt_execute($stmt);
      
         $resultData = mysqli_stmt_get_result($stmt);
      
         if($row = mysqli_fetch_assoc($resultData)){
            return $row;
            exit();
             }
         else{
             $err=false;
             return $err;
         }
         mysql_stmt_close($stmt);
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

// function usrnametaken($username){
//     $err;

//     if ($resultcheck == $_POST['username']){
//        $err = true;
//     }
//     else{
//         $err = false;
//     }

// }

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