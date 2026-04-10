<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>	
	<link rel="stylesheet" href="file1.css">
<body>
<section class="id">
	<nav>	
		<ul class="side-menu">
			<li>aquarium</li>
			<li>home</li>
			<li>about</li>
			<li>contact us</li>	
	</ul>
	<div id="user-info">
		<a href="">login</a>
		<a href="">register</a>
	</div>
	</nav>
</section>
<section id="footer">
	<footer>
		&copy;2000 Aquarium. all rights reserved
	</footer>
</section>
	<script>
		document.addEventListener("DOMContentLoaded",() => {
			const username = sessionStorage.getItem("username");
			const userInfoDiv = document.getElementById("user-info");
			if(username!="") {
				userInfoDiv.innerHTML='<span onclick='logout()'>${username}</span>';
			}else{
				userInfoDiv.innerHTML=<a href="login.html">login</a>  
				<a href="register.html">Register</a>;
			}
		});

		function logout(){
			if(confirm("logout?")){
				.removeItem("username");
				sessionStorage.localStorage.removeItem("password");
				sessionStorage.reload();
		}
		}
	</script>

</body>
</html>