<?php
$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DBNAME = "erp";
try{
    $conn = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DBNAME,3301);
    if($conn->connect_error){
        echo "Connection Error".$conn->connect_error;
    } else {
        // echo "Connection Successful";
    }
} catch (Exception $e){
    echo "Check Credentials<br>";
    echo $e->getMessage()." at line ".$e->getLine();
}
?>