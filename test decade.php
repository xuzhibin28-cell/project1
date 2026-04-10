<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Decade Driver - 完整语音逻辑</title>
<style>
body{
  background:black;
  color:white;
  text-align:center;
  font-family:Arial Black,sans-serif;
}
h1{
  color:#ff66cc;
  text-shadow:0 0 20px #ff0099;
}
#driver{
  width:320px;
  height:120px;
  margin:20px auto;
  background:linear-gradient(to right,#222,#444,#222);
  border:5px solid silver;
  border-radius:20px;
  box-shadow:0 0 20px #ff0099;
  transition:0.4s;
  display: none;
}
#driver.open{
  box-shadow:0 0 40px #ff00ff;
  transform:scale(1.05);
}
.container{
  position:relative;
  height:180px;
  margin:60px 0;
}
.riderCard{
  width:100px;
  position:absolute;
  cursor:pointer;
  transition:transform 0.6s;
  transform-style: preserve-3d;
}
.riderCard.center{
  transform:translateY(0px) scale(1.3);
  z-index:1000;
  box-shadow:0 0 25px #ff00ff;
}
.riderCard.flip{
  transform: rotateY(180deg) scale(1.3);

}
.riderCard.locked{
  filter:grayscale(100%) brightness(40%);
  pointer-events:none;
  opacity:0.6;
}
button{
  margin:8px;
  padding:10px 18px;
  font-size:16px;
  background:#ff0080;
  color:white;
  border:none;
  border-radius:10px;
  transition:0.3s;
}
button:hover{background:#ff66cc;}
.lockedBtn{
  filter:grayscale(100%) brightness(40%);
  pointer-events:none;
  opacity:0.3
}

</style>
</head>
<body>
<h1>Decade Driver - 拿卡→翻卡→HENSHIN</h1>
<div id="driver"></div>
<div class="container" id="cardContainer">
  <!-- 所有骑士卡片 -->
  <img src="kuuga.webp" class="riderCard locked" data-rider="kuuga" data-front="kuuga.webp"data-back="kuuga back.jpg">
  <img src="agito.webp" class="riderCard locked" data-rider="agito" data-front="agito.webp" data-back="agito back.jpg">
  <img src="ryuki.webp" class="riderCard locked" data-rider="ryuki" data-front="ryuki.webp" data-back="ryuki back.jpg">
  <img src="faiz.webp" class="riderCard locked" data-rider="faiz" data-front="faiz.webp" data-back="faiz back.jpg">
  <img src="blade.webp" class="riderCard locked" data-rider="blade" data-front="blade.webp" data-back="blade back.jpg">
  <img src="hibiki.webp" class="riderCard locked" data-rider="hibiki" data-front="hibiki.webp" data-back="hibiki back.jpg">
  <img src="kabuto.webp" class="riderCard locked" data-rider="kabuto" data-front="kabuto.webp" data-back="kabuto back.jpg">
  <img src="den o.webp" class="riderCard locked" data-rider="den-o" data-front="den o.webp" data-back="den o back.jpg">
  <img src="kiva.webp" class="riderCard locked" data-rider="kiva" data-front="kiva.webp" data-back="kiva back.jpg">
  <img src="decade.webp" class="riderCard" data-rider="decade" data-front="decade.webp" data-back="decade back.jpg">
  <img src="w.webp" class="riderCard locked" data-rider="w" data-front="w.webp" data-back="w back.jpg">
  <img src="ooo.webp" class="riderCard locked" data-rider="ooo" data-front="ooo.webp" data-back="ooo back.jpg">
  <img src="fourze.webp" class="riderCard locked" data-rider="fourze" data-front="fourze.webp" data-back="fourze back.jpg">
  <img src="wizard.webp" class="riderCard locked" data-rider="wizard" data-front="wizard.webp" data-back="wizard back.jpg">
  <img src="gaim.webp" class="riderCard locked" data-rider="gaim" data-front="gaim.webp" data-back="gaim back.jpg">
  <img src="drive.webp" class="riderCard locked" data-rider="drive" data-front="drive.webp" data-back="drive back.jpg">
  <img src="ghost.webp" class="riderCard locked" data-rider="ghost" data-front="ghost.webp" data-back="ghost back.jpg">
  <img src="ex-aid.webp" class="riderCard locked" data-rider="ex-aid" data-front="ex-aid.webp" data-back="exaid back.jpg">
  <img src="build.webp" class="riderCard locked" data-rider="build" data-front="build.webp" data-back="build back.jpg">
  <img src="zio.webp" class="riderCard locked" data-rider="zi-o" data-front="zio.webp" data-back="zio back.jpg">
</div>

<br>
<button id="henshinBtn">HENSHIN</button>
<button id="attackRideBtn" class="lockedBtn">ATTACK RIDE</button>

<!-- 音效 -->
<audio id="pickSound"></audio>
<audio id="flipSound"></audio>
<audio id="standbySound" loop></audio>
<audio id="transformSound"></audio>
<audio id="henshinSound"></audio>

<script>
let isPlaying=false;
let currentRider=null;
let pickedCard=null;

const pickSound=document.getElementById("pickSound");
const flipSound=document.getElementById("flipSound");
const standbySound=document.getElementById("standbySound");
const transformSound=document.getElementById("transformSound");
const henshinBtn=document.getElementById("henshinBtn");
const attackRideBtn=document.getElementById("attackRideBtn");
const driver=document.getElementById("driver");
const henshinSound=document.getElementById("henshinSound");
const riderCards=document.querySelectorAll(".riderCard");

/* 音效路径 - 全部统一拿卡音为 take_card.mp3，翻卡音统一为 kamen_ride.mp3 */
const riderPickSounds={
  "kuuga":"take_card.mp3","agito":"take_card.mp3","ryuki":"take_card.mp3","faiz":"take_card.mp3","blade":"take_card.mp3",
  "hibiki":"take_card.mp3","kabuto":"take_card.mp3","den-o":"take_card.mp3","kiva":"take_card.mp3",
  "decade":"take_card.mp3","w":"take_card.mp3","ooo":"take_card.mp3","fourze":"take_card.mp3","wizard":"take_card.mp3",
  "gaim":"take_card.mp3","drive":"take_card.mp3","ghost":"take_card.mp3","ex-aid":"take_card.mp3","build":"take_card.mp3","zi-o":"take_card.mp3"
};
const riderFlipSounds={
  "kuuga":"kamen_ride.mp3","agito":"kamen_ride.mp3","ryuki":"kamen_ride.mp3","faiz":"kamen_ride.mp3","blade":"kamen_ride.mp3",
  "hibiki":"kamen_ride.mp3","kabuto":"kamen_ride.mp3","den-o":"kamen_ride.mp3","kiva":"kamen_ride.mp3",
  "decade":"kamen_ride.mp3","w":"kamen_ride.mp3","ooo":"kamen_ride.mp3","fourze":"kamen_ride.mp3","wizard":"kamen_ride.mp3",
  "gaim":"kamen_ride.mp3","drive":"kamen_ride.mp3","ghost":"kamen_ride.mp3","ex-aid":"kamen_ride.mp3","build":"kamen_ride.mp3","zi-o":"kamen_ride.mp3"
};
const riderTransformSounds={
  "kuuga":"kuuga.mp3","agito":"agito.mp3","ryuki":"ryuki.mp3","faiz":"faiz.mp3","blade":"blade.mp3","hibiki":"hibiki.mp3",
  "kabuto":"kabuto.mp3","den-o":"den o.mp3","kiva":"kiva.mp3","decade":"decade.mp3","w":"w.mp3","ooo":"ooo.mp3","fourze":"fourze.mp3",
  "wizard":"wizard.mp3","gaim":"gaim.mp3","drive":"drive.mp3","ghost":"ghost.mp3","ex-aid":"exaid.mp3","build":"b.mp3","zi-o":"zio.mp3"
};

/* 横列叠牌 */
function arrange(centerIndex=-1){
  const gap=45;
  const totalWidth=(riderCards.length-1)*gap;
  const start=(window.innerWidth/2)-(totalWidth/2)-50;
  riderCards.forEach((card,i)=>{
    card.style.left=(start+i*gap)+"px";
    card.classList.remove("center");
  });
  if(centerIndex>=0) riderCards[centerIndex].classList.add("center");
}
arrange();
window.addEventListener("resize", ()=>arrange([...riderCards].indexOf(pickedCard)));

/* 点击卡片逻辑 - 拿卡→翻卡→待机音，收回翻回正面 */
riderCards.forEach((card, index) => {
  card.dataset.flipped = "false";

  card.addEventListener("click", () => {
    if(isPlaying || card.classList.contains("locked")) return;

    // 收回所有翻开的卡片（除当前点击卡）
    riderCards.forEach(c=>{
      if(c !== card && c.dataset.flipped==="true"){
        c.classList.remove("flip");
        c.src = c.dataset.front;  // 翻回正面
        c.dataset.flipped="false";
      }
    });

    // 第一次点击：选中卡片，播放拿卡音
    if(pickedCard !== card){
      pickedCard = card;
      currentRider = card.dataset.rider;
      arrange(index);
      if(riderPickSounds[currentRider]){
        pickSound.src = riderPickSounds[currentRider];
        pickSound.currentTime=0;
        pickSound.play();
      }
      return;
    }

    // 翻卡一次
    if(card.dataset.flipped==="false"){
      card.classList.add("flip");
      card.src=card.dataset.back;
      card.dataset.flipped="true";

      if(riderFlipSounds[currentRider]){
        flipSound.src = riderFlipSounds[currentRider];
        flipSound.currentTime = 0;
        flipSound.play();

        // 翻卡语音播放完再播放待机音
        flipSound.onended = () => {
          standbySound.src = "standby decade.mp3"; 
          standbySound.currentTime = 0;
          standbySound.play();
        };
      }
    }
  });
});

/* HENSHIN逻辑 */
henshinBtn.addEventListener("click", ()=>{
  if(isPlaying || !currentRider || pickedCard.dataset.flipped!=="true") return;
  isPlaying=true;
  standbySound.pause();
  standbySound.currentTime=0;
  driver.style.display="block";
  driver.classList.add("open");

  transformSound.src=riderTransformSounds[currentRider];
  transformSound.currentTime=0;
  transformSound.play();

  transformSound.onended=()=>{
    isPlaying=false;
    if(currentRider==="decade"){
      riderCards.forEach(c=>{
        if(c.dataset.rider!=="decade") c.classList.remove("locked");
      });
      attackRideBtn.classList.remove("lockedBtn");
    }
  };
});

</script>
</body>
</html>