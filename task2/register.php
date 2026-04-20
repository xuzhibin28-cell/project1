<?php
include "db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $qry = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $qry->bind_param("ss", $username, $password);

    if ($qry->execute()) {
        echo "<script>alert('sign sucesssful go to login'); window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <div class="card">
            <form action="register.php" method="post">
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" name="username">
                </div>
                <div class="form-group">
                    <label>password:</label>
                    <input type="password" name="password">
                </div>
                <div class="form-group">
                    <label>Confirm password:</label>
                    <input type="password" name="confirm_password"> 
                </div>
                <a href="login.php">Login page</a><br>
                 <button type="submit" name="register">register</button>
            </form>      
        </div>
    </div>
    
</body>
</html>