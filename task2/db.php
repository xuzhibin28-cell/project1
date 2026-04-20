<?php
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "quetion1";      // 这就是你照片里那个数据库的名字

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
} 
?>