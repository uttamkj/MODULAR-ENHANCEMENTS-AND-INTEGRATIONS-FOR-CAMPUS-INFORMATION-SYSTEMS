<?php
$HOST = "127.0.0.1";
$USERNAME = "root";
$PASSWORD = "";
$DBNAME = "23mmci80";

$conn = new mysqli("$HOST", "$USERNAME", "$PASSWORD", "$DBNAME", "3301");
if($conn->connect_error){
    die($conn->connect_error);
}else{
    // echo "Connected";
}
?>