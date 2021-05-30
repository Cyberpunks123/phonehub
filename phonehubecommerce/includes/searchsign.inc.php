<?php
    include_once "db_connect.php";
        
 if($id = $_GET['q']){
 	$sql = "select b.brgyDesc, c.citymunDesc, p.provDesc
            from refbrgy b

            JOIN refcitymun c
            ON c.citymunCode = b.citymunCode

            JOIN refprovince p
            ON p.provCode = b.provCode

            where b.brgyDesc like '%$id%' limit 100;";
     
     
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
     echo $row["brgyDesc"] . ", " . $row["citymunDesc"] . ", " . $row["provDesc"]. "\n";
     }
     }
    } 

    else {
    echo "0 results";
}
    $conn->close();
?>
