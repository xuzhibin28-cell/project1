<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<p id="fruitDisplay"></p>
	<script>
		let Fruit="apple";
		let Fruit=["apple","orange","banana","grape"];

        //for loop
		for(let i=0;i<Fruit.length;i++){
	document.getElementById("fruitDisplay").innerHTML+=Fruit[i]+"<br>";
		}
		//while loops
		let j=0;
		while(j<Fruits.length){
			document.getElementById("fruitDisplay").innerHTML+=Fruit[j]+"<br>";
		}

		//do while loops
		do{
			document.getElementById("fruitDisplay").innerHTML+=Fruits[k]+"<br>";k++;
		}while(k<Fruits.length);

		//foreach.Loop
		Fruits.forEach(function(fruit){
			document.getElementById("fruitDisplay").innerHTML+=fruit+"<br>";
		});
		for(let i=100;i>=1;I--){
			document.getElementById("integerDisplay").innerHTML+=i+"<br>";
		}
	</script>

</body>
</html>