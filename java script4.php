<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>java script basics- if else and switch statement</h1>
	<label for="ageInput">enter your age</label>
	<input type="number" id="age input">
	<button type="button" onclick="checkAge()">checkAge</button>

	<script>
		let age=20;
        if(age<20){
        	//-num17
        	console.log("You are a minor");
        }else if(age==20){
        	//18
        	console.log("You are just an adult");
        }else{
        	//19+
        	console.log("You are an adult");
        }

        let name="pig";
        if(name==="pig"){
        	//string example abc123 and intiger example 123
        	//type and value
        	console.log("Hello DOG.");
        }else{
        	console.log("You are not DOG.");
        }

        function checkAge(){
        	age=parseInt(document.getElementById("ageInput").value);
        	const h1=document.createElement("h1");
        switch(true){
        case age>=1 && age<=12:
        	console.log("child");
        	h1.innerText="You are a child"
        	document.body.appendChild(h1);
        	break;
        case  age>=13 && age<=17:
        	console.log("teenager");
        	h1.innerText="You are a teenager";
        	document.body.appendChild(h1);
        	break;
        case age>=18 && age<30:
        	console.log("You are adult now");
        	h1.innerText="You are an adult";
        	document.body.appendChild(h1);
        	break;
        default:
            h1.innerText="You are an adult";
            document.body.appendChild(h1);
            console.log("you are above 30 years old");
        }
       }
	</script>

</body>
</html>