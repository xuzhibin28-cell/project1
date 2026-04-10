<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>logon page</title>
</head>
<body>
  <style>
    .alert-box{
    display: none;
    position: absolute;
    top: 0;
    left: 35%;
    width: 300px;
    margin: 20px auto;
    padding: 15px;
    border: 2px solid red;
    background-color: white;
    color: darkred;
    border-radius: 5px;
    animation: slideDown 0.5 ease-out;
  }
  @keyframes slideDown{
    0%{
      transform: translateY(-100%);
      opacity: 0;
    }
    100% {
      transform: translateY(0);
      opacity: 1;
    }
    
  }  
  </style>
  <style>
    body{
      background-image: url(Muelsyse.jpg);
      background-size: 115%;
  </style>
  <link rel="stylesheet" href="login.css">
   <div class="container">
    <div style="text-align: center;">
    <label for="username">login page:</label>
    <br>
     <label for="email">email</label>
     <br>
     <input type="email" id="email" name="email">
     <br>
     <label for="password">password:</label>
     <br>
     <input type="password" id="password" placeholder="password" onmouseenter="showhiddenpassword()" onmouseout="showhiddenpassword()">
</div>
     <br>
     <br>
     <div style="text-align:center;">
     <button type="button">login</button>
   </div>
     <br>
     <a href="register.html">do the account now!</a>
   </div>

   <div class="alert-box">
       <h3 class="alert-tittle">alert tittle</h3>
       <p class="alert-message">alert message</p>
     </div>

   <script>
     const button=document.querySelector("button");
     button.addEventListener("click",()=>{
      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;

      

       if(email=== localStorage.getItem("email") && password === localStorage.getItem("password")){
        showalertbox('success message','login successful','green');
        window.location.href='file.php'
         //redirect to another page or perform other actions
       } else {      
          showalertbox('fail','invalid email or password','red');
       }
     });

       function showhiddenpassword (){
        const passwordInput = document.getElementById("password");
        if(passwordInput.type === "password"){
             passwordInput.type = "text";
        } else{
             passwordInput.type = "password";
        }
      }
      function showalertbox(tittle,message,color){
        const alertBox = document.querySelector(".alert-box");
        const alertTittle = document.querySelector(".alert-tittle");
        const alertMessage = document.querySelector(".alert-message");
        alertBox.style.borderColor = color;
        alertBox.style.color = color;
        alertTittle.textContent = tittle;
        alertMessage.textContent = message;

        alertBox.style.display = "block";
        

       
       </script>
</body>
</html>