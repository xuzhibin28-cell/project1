<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
	<style>
	.navbar{
	background-color: blue;
	overflow: hidden;
	display: flex;
	color: white;
	justify-content: space-between;
	align-items: center;
	padding: 14px 15px;
}
.navbar a {
	color: white;
	padding: 14px 20px;
	text-decoration: none;
	text-align: center;
}
.navbar ul{
	list-style-type: none;
	display: flex;
	align-items: right;
	margin: 0;
	padding:0 ;
}

	
.div1{
	background-color: black;
	color: white;
	}

.container{
	max-width: 1200px;
	margin: 20px auto;
	padding: 20px;
	text-align: center;

	/*background-image: (to right,green,blue);*/
	background-image: url(wallpaper.jpg);
	border-radius: 8px;   
}
.image-gallery{
	display: flex;
	flex-wrap: wrap;
	gap: 10px;
	justify-content: center;
}
.image{
	flex: 1 1 calc(33.333% - 40px);
	border-radius: 3px;
	box-sizing: border-box;
	width: 300;
	height: 200;
}
.image img{
	width: 100%;
	height: auto;
	display: block;
	border-radius: 3px;
}
.footer{
	background-color: blue;
	color: white;
	text-align: center;
	padding: 10px;
	position:fixed;
	left:0;
	bottom:0;
	width: 100%;

}
p{
	color: black;
}
h3{
	color: white;
}
body{
	background-image: url(928.jpg);
	background-size: 115%;
}
#about .container-grid{
	display: grid;
	grid-template-areas:
	"opening location"
	"show-detail show-detail";
	grid-template-columns: 1fr 1fr;
	gap: 10px;
}
#about .container-grid div{
	padding: 20px;
	background-color: white;
	border-radius: 8px;
	border: 2px solid green;
}
#about .open-time{
	grid-area: opening;
	text-align: center;
} 
#about .location{
 grid-area: location;
 text-align: center;
}
#about .show-detail{
	grid-area: show-detail;
}
.show-detail .price-list{
	display: flex;
	justify-content: space-around;
	margin-top: 15px;
	text-align: left;
	gap: 20px;
	flex-wrap: wrap;
}
.show-detail .pricing{
	background: linear-gradient(135deg,0%,50%,100%);
	border: 3px dashed white;
	border-radius: 8px;
	padding: 25px;
	color: white;
	flex: 1;
	min-width: 220px;
	box-shadow: 0 8px 15px black;

}
.show-detail .pricing::before{
  content: ;
  position: absolute;
  right: 0;
	top: 50%;
	transform: translateY(-50%);
	width: 30px;
	height: 50px;
	background: #f0f8ff;
	border-radius: 10px 0 0 10px;
}
.show-detail.pricing p{
	font-size: 18px;
	font-weight: bold;
	margin: 0 0 15px 15px;
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}
.show-detail.pricing ul{
	margin:  0 0 0 45px;
	padding: 0;
	list-style: none;
}
.show-detail.pricing li{
	font-size: 14px;
	margin: 8px 0;
	padding-left: 20px;
	position: relative;
}
.show-detail.pricing li::before{
   content: true;
   position: absolute;
   left: 0;
   color: black;
   font-weight: bold;
}
</style>
<body>
<div class="navbar">
	<h1>shopping website</h1>	
   <ul>
     <li><a href="file1.html">Home</a></li>
     <li><a href="about.html">About</a></li>
     <li><a href="services.html">Services</a></li>
     <li><a href="contact.html">Contact</a></li>
   </ul>
   	<ul>
   		<div id="user-info">
   	<a href="login1.php">logout</a>	
   	<a href="register1.html"></a>
   </div>
   </ul>
  </div>
   <section id="ticket">
   	<div class="container">
   		<div class="qr-image">
   			<img src="" alt="QR Code for Ticket" width="200" height="200">
   		</div>
   		<div class="show-detail">
   			<h2 id="ticket-type"></h2>
   			<p id="ticket-price"></p>
   			<ul id="ticket-benefits"></ul>
   		</ul>
   
   		</div>
   	</div>
   </section>




















      <div class="footer">
   <p>&copy;2024 My Website. All rights reserved.</p>
 </div>
 <script>
        document.addEventListener("DOMContentLoaded", function() {
            const getTicketDetail=localStorage.getItem("ticketinfo");
            if(getTicketDetail){
                const ticketDetail=JSON.parse(getTicketDetail);
                document.getElementById("ticket-type").innerText=ticketDetail.type;
                document.getElementById("ticket-price").innerText="Price: $"+ticketDetail.price;
                const benefitsList=document.getElementById("ticket-benefits");
                ticketDetail.benefits.forEach(benefit=>{
                    const li=document.createElement("li");
                    li.innerText=benefit;
                    benefitsList.appendChild(li);
                });
            }
        });
 </script>

</body>
</html>