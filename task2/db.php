<?php
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "quetion1";      

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die( db base error" . $conn->connect_error);
} 
?>
