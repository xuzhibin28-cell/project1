<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>ab</h1>
	<label for="num1">Number 1:</label>
	<input type="number" id="num1" value="0">
	<br>
	<label for="num1">Number 2:</label>
	<input type="number" id="num2" value="0">
	<button type="button" value="plus">Plus</button>
	<button type="button" value="minus">Minus</button>
	<button type="button" value="multiply">Multiply</button>
	<button type="button" value="divide">Divide</button>
	
	<p id="result"></p>
	<p id="calc"></p>
	
	<script>
		//(add number)plus operator
		let x = document.querySelector("#num1").value;
		let y = document.querySelector("#num2").value;
		function addNumbers(a,b){
			return a + b;
		}
		//minus operator
		function subtractNumber(a,b){
			return a - b;
		}
		//multiply operator
		function multiplyNumber(a,b){
			return a * b;
		}
		//divide operator
		function divideNumber(a,b){
			return a / b;
		}
		document.querySelectorAll("button").forEach(function(button){
			button.onclick=function(event){
			let x = parseFloat(document.querySelector("#num1").value);
			let y = parseFloat(document.querySelector("#num2").value);
		    const calc=document.getElementById("result");
			 if(event.target.value==="plus"){
				calc.innerHTML=x+"+"+y+"="+addNumbers(x,y);

			}
			else if(event.target.value==="minus"){
				calc.innerHTML=x+"-"+y+"="+subtractNumber(x,y);
			}
			else if(event.target.value==="multiply"){
				calc.innerHTML=x+"*"+y+"="+multiplyNumber(x,y);
			}
			else if(event.target.value==="divide"){
				calc.innerHTML=x+"/"+y+"="+(x,y);
			}
			
	};
	
});		
	</script>	

</body>
</html>