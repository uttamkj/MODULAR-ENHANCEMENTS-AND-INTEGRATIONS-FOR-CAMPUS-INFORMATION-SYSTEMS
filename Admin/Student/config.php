<?php
// config.php
// $host = 'localhost';
// $port = '3301';  
// $dbname = '23mmci80';  
// $username = 'root';     
// $password = '';     

// try {
    // $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // $conn = new mysqli("$HOST" , "$USERNAME","$PASSWORD","$DBNAME","3301");
    // echo "Connected successfully";
// } catch(PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    // exit;
// }
?>

<?php

$HOST = "127.0.0.1";
$USERNAME="root";
$PASSWORD = "";
$DBNAME = "23mmci80";

$conn = new mysqli("$HOST" , "$USERNAME","$PASSWORD","$DBNAME","3301");
if($conn->connect_error){
    die($conn->connect_error);
}else{
    // echo "Connected";
}
?>