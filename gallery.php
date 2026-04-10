<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<style>
		.gallery{
			display: flex;
			flex-wrap: wrap;
			justify-content: space-around;
			border: 5px solid white;
			padding: 10px;
			background-image: url(budget.png);
			background-size: cover;
			height: 100;
		}
		.image-box{
			padding: 20px;
			border: 1px solid black;
			box-shadow: 8px 6px 15px blueviolet;
			background-image:
		}	
		.image-box:hover{
			transform: scale(1.5);
			transform: rotate(360deg);
			box-shadow: 30px 6px 15px violet;
			transition-duration: 1s;
		}
	</style>
	<h1>ahhh here we go again </h1>
	<a href="http://localhost/newproject/test6.php">
	<div class="gallery">
	   <div class="image-box">
	     <img src="budget.png" alt="image 1" width="200" height="150">  	
	   </div>
	   <div class="image-box">
	     <img src="budget.png" alt="image 1" width="200" height="150">  	
	   </div>
	   <div class="image-box">
	     <img src="budget.png" alt="image 1" width="200" height="150">  	
	   </div>
	   <div class="image-box">
	     <img src="budget.png" alt="image 1" width="200" height="150">  	
	   </div>
	   <div class="image-box">
	     <img src="budget.png" alt="image 1" width="200" height="150">  	
	   </div>
	   <div class="image-box">
	     <img src="budget.png" alt="image 1" width="200" height="150">  	
	   </div>
	</div>




</body>
</html>