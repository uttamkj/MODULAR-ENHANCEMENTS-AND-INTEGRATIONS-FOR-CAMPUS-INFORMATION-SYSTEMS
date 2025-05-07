<?php
$HOST = "127.0.0.1";
$USERNAME = "root";
$PASSWORD = "";
$DBNAME = "erp";
$PORT = 3301; 

$conn = new mysqli($HOST, $USERNAME, $PASSWORD, $DBNAME, $PORT);
if($conn->connect_error){
    die($conn->connect_error);
}else{
    // echo "Connected";
}
?>