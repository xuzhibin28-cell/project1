<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $_POST["username"];
    $p = $_POST["password"];


    $qry = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $qry->bind_param("ss", $u, $p);
    $qry->execute();
    $res = $qry->get_result();

    if ($res->num_rows > 0) {
        $user = $res->fetch_assoc();
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        echo "<script>alert('login successful'); window.location.href='website.php';</script>";
    } else {
        echo "<script>alert('login failed');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<div class="container">
<h1>Login</h1>
 <div class="card">
 	   <form action="login.php" method="post">
 	<div class="form-group">
 			<label for="username">Username:</label>
 			<input type="" id="username" name="username">
  </div>

 	<div class="form-group">
 			<label for="password">Password:</label>
 			<input type="password" id="password" name="password">
  </div>

 		 <button type="submit" value="register">login</button>
     <a href="register.php">did not have aoccount me for register</a>
 	</form>
</div>
</body>
</html>