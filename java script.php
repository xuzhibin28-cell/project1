<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DOCUMENT</title>
</head>
<body>
	<style>
		.container{
			display: flex;
		}
		.container{
			height: 100px;
		}
		.div1{
        background-color: red;
        flex: 1;
        width: 2px;

		}
		.div2{
		background-color: green;
		flex: 1;
		width: 2px;	
		}
	</style>
	<h1>hello</h1>
	<button onclick="changeContent()"> Click Me</button>
<div class="container">
	<div class="div1">
		<button onclick="addRedDiv()"> red</button>
		<p id='red'></p>
    </div>
    <div class="div2">
    	<button style="float: right;" onclick="addGreenDiv()">green</button>
		<p id='green'></p>
    </div>
</div>
	<script>
		let message = "	helo world"
		const data1 = 123;
		console.log(message);

		const data="new content";
		function changeContent(){
            const heading=document.querySelector('h1');
            heading.style.color="blue";
            heading.textContent=data;
		}
		let flexvalueRed=1;
		let flexvalueGreen=1
		function addRedDiv(){
			const divred=document.querySelector('.div1');
			let redwidth=flexvalueRed/(flexvalueRed+flexvalueGreen)*100;
			document.querySelector('#red').innerHTML=redwidth;
			flexvalueRed++;
			divred.style.flex=flexvalueRed+1;
		}
		function addGreenDiv(){
			const divgreen=document.querySelector('.div2');
			let greenwidth=flexvalueGreen/(flexvalueRed+flexvalueGreen)*100;
			document.querySelector('#green').innerHTML=greenwidth;
			flexvalueGreen++;
			//cocument.querySelectr(div1)style.width
			divgreen.style.flex=flexvalueGreen+1;
		}

		document.addEventListener('keydown',function(event){
			if(event.key=='a'){
				addRedDiv();
			}
			if(event.key=='b'){
				addGreenDiv();
			}
		});
	</script>
</body>
</html>