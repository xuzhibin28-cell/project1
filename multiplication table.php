<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<link rel="stylesheet" href="dd.css">
<body>
	<style>
		#multiplyDisplay{
			display:flex;
			flex-wrap: wrap;
			justify-content: space-around;
			border: 5px solid black;
			background-color: ;
			color: black;
			background-size: px;
			background-repeat: ;

		}

		div{
			border: 3px solid black;
			color: black;
			gap: 10px;
		    font-weight: bold;
		    background-color: ;

 
		}
		body{
			background-image: url(Untitled.jpg);
			background-size: 315%;
		}
		
	</style>
	<h1>Multiply List</h1>
	<div id="multiplyDisplay">
		
	</div>
	<script>
		const multiplyDisplay=document.getElementById("multiplyDisplay");
		for(let i=1;i<=13;i++){
			const div=document.createElement("div");
div.innerHTML+="<h2>multiplication Table of "+i+"</h2>";

			for(let j=1;j<=13;j++){
div.innerHTML+=""+i+"x"+j+ " = "+(i*j)+"<br>;"
			}
			multiplyDisplay.appendChild(div);
		}
	</script>

</body>
</html>