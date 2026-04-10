<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<style>
	.container{
		
		background-color: blue;
		width: 200px;
		height: 200px;
		
	}
	.container2{
		border: 5px solid blue;
		background-color: blue;
		width: 200px;
		height: 200px;
		
	
</style>
<body>
    <div class="container" id="container"></div>
    <button onclick="changecolor()">s</button>
    </body>
    <div class="container2">
    	
    </div>

<audio id="audio1" src="joker.mp3"></audio>
<audio id="audio2" src="cyclone.mp3"></audio>
<audio id="audio3" src="erternal.mp3"></audio>


    <script>
    	document.addEventListener("keypress",(event)=>{
    		let box =
    	document.getElementById('container')
    	    let audio =
    	document.getElementById('audio1')
    	if (event.key=="v"){
    		audio.play();
    	box.style.backgroundColor = "violet";
    	box.style.borderColor = "black";
    	
    		}
        else if (event.key=="g"){
        document.getElementById('audio2')
        	 .play()
    	box.style.backgroundColor = "green";
    	box.style.borderColor = "black";
            }
             else if (event.key=="y"){
        document.getElementById('audio3')
        	 .play()
    	box.style.backgroundColor = "yellow";
    	box.style.borderColor = "yellow";
            }
    	});
        
    </script>
</body>
</html>