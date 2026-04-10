<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Decade Driver 横列叠牌 + 锁卡</title>

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

#driver.attack{
  animation:flash 0.3s alternate 6;
}

@keyframes flash{
  from{box-shadow:0 0 20px purple;}
  to{box-shadow:0 0 60px violet;}
}

/* ================= 横向叠牌 ================= */

.container{
  position:relative;
  height:170px;
  margin:60px 0;
}

.riderCard{
  width:100px;
  position:absolute;
  cursor:pointer;
  transition:0.4s cubic-bezier(.25,.8,.25,1);
  transform:scale(1);
}

/* Hover 抬起 */
.riderCard:hover:not(.locked){
  transform:translateY(-20px) scale(1.1);
  z-index:500;
}

/* 中间卡 */
.riderCard.center{
  transform:translateY(-30px) scale(1.3);
  z-index:1000;
  box-shadow:0 0 25px #ff00ff;
}

/* 锁住的卡 */
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
  opacity:0.6;
}
</style>
</head>
<body>

<h1>Decade Driver + 横列叠牌（锁卡）</h1>

<div id="driver"></div>

<h2>骑士卡片</h2>

<div class="container" id="cardContainer">
  <img src="kuuga form.webp" class="riderCard locked" data-rider="kuuga">
  <img src="agito form.webp" class="riderCard locked" data-rider="agito">
  <img src="ryuki form.webp" class="riderCard locked" data-rider="ryuki">
  <img src="faiz form.webp" class="riderCard locked" data-rider="faiz">
  <img src="blade form.webp" class="riderCard locked" data-rider="blade">
  <img src="hibiki form.webp" class="riderCard locked" data-rider="hibiki">
  <img src="kabuto form.webp" class="riderCard locked" data-rider="kabuto">
  <img src="den o form.webp" class="riderCard locked" data-rider="den-o">
  <img src="kiva form.webp" class="riderCard locked" data-rider="kiva">
  <img src="decade.webp" class="riderCard" data-rider="decade">
  <img src="w.webp" class="riderCard locked" data-rider="w">
  <img src="ooo.webp" class="riderCard locked" data-rider="ooo">
  <img src="fourze.webp" class="riderCard locked" data-rider="fourze">
  <img src="wizard.webp" class="riderCard locked" data-rider="wizard">
  <img src="gaim.webp" class="riderCard locked" data-rider="gaim">
  <img src="drive.webp" class="riderCard locked" data-rider="drive">
  <img src="ghost.webp" class="riderCard locked" data-rider="ghost">
  <img src="ex-aid.webp" class="riderCard locked" data-rider="ex-aid">
  <img src="build.webp" class="riderCard locked" data-rider="build">
  <img src="zio.webp" class="riderCard locked" data-rider="zi-o">
</div>

<br>
<button id="henshinBtn">HENSHIN</button>
<button id="attackRideBtn" class="lockedBtn">ATTACK RIDE</button>

<audio id="clickSound" src="kamen ride.mp3"></audio>
<audio id="standbySound" src="standby decade.mp3" loop></audio>
<audio id="henshinSound" src="decade.mp3"></audio>
<audio id="transformSound"></audio>

<script>
let isPlaying=false, currentRider=null, transformed=false;

const clickSound=document.getElementById("clickSound");
const standbySound=document.getElementById("standbySound");
const henshinBtn=document.getElementById("henshinBtn");
const attackRideBtn=document.getElementById("attackRideBtn");
const driver=document.getElementById("driver");
const transformSound=document.getElementById("transformSound");
const riderCards=document.querySelectorAll(".riderCard");

const riderTransformSounds={
  "kuuga":"kuuga.mp3","agito":"agito.mp3","ryuki":"ryuki.mp3",
  "faiz":"faiz.mp3","blade":"blade.mp3","hibiki":"hibiki.mp3",
  "kabuto":"kabuto.mp3","den-o":"den o.mp3","kiva":"kiva.mp3",
  "wizard":"wizard.mp3","gaim":"gaim.mp3","drive":"drive.mp3",
  "ghost":"ghost.mp3","ex-aid":"exaid.mp3","build":"b.mp3",
  "zi-o":"zio.mp3","w":"w.mp3","ooo":"ooo.mp3","fourze":"fourze.mp3"
};

/* ================= 横列叠牌排列 ================= */

function arrange(centerIndex=-1){
  const gap=45;
  const totalWidth=(riderCards.length-1)*gap;
  const start=(window.innerWidth/2)-(totalWidth/2)-50;

  riderCards.forEach((card,i)=>{
    card.style.left=(start + i*gap)+"px";
  });

  if(centerIndex>=0){
    riderCards[centerIndex].style.left="50%";
  }
}

arrange();

/* 点击卡片 */
riderCards.forEach((card,index)=>{
  card.addEventListener("click",function(){
    if(isPlaying || card.classList.contains("locked")) return;
    isPlaying=true;

    riderCards.forEach(c=>c.classList.remove("center"));
    card.classList.add("center");

    arrange(index);

    currentRider=card.dataset.rider;

    standbySound.pause();
    standbySound.currentTime=0;

    clickSound.currentTime=0;
    clickSound.play();

    driver.classList.remove("attack");
    void driver.offsetWidth;
    driver.classList.add("attack");

    clickSound.onended=function(){
      standbySound.play();
      isPlaying=false;
    };
  });
});

/* HENSHIN */
henshinBtn.addEventListener("click",function(){
  if(isPlaying || !currentRider) return;
  isPlaying=true;

  standbySound.pause();
  standbySound.currentTime=0;

  driver.classList.add("open");

  if(currentRider==="decade"){
    henshinSound.play();
    henshinSound.onended=()=>{
      isPlaying=false;
      transformed=true;

      // 解锁其他骑士卡
      riderCards.forEach(c=>{
        if(c.dataset.rider!=="decade") c.classList.remove("locked");
      });

      // 解锁 Attack Ride
      attackRideBtn.classList.remove("lockedBtn");
    }
  }else{
    transformSound.src=riderTransformSounds[currentRider];
    transformSound.play();
    transformSound.onended=()=>isPlaying=false;
  }
});
</script>

</body>
</html>