<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>君王者变身器</title>
<style>
body{
  background-color:black;
  color:gold;
  text-align:center;
  font-family:Arial Black,sans-serif;
}
h1{ text-shadow:0 0 10px gold; }

#driver{
  width:400px;
  margin:20px auto;
  padding:15px;
  border:3px solid gold;
  border-radius:15px;
  background:black;
  box-shadow:0 0 20px gold;
}

#display{
  margin:10px;
  font-size:22px;
  letter-spacing:6px;
  min-height:30px;
}

#stageDisplay{
  margin:10px 0;
  font-size:18px;
  color:#fff;
}

.password-buttons button,
.action button{
  width:70px;
  padding:12px;
  margin:5px;
  font-weight:bold;
  border:none;
  border-radius:8px;
  background:black;
  border: 3px solid gold;
  box-shadow: 0 0 20px gold;
  color:gold;
  font-size:16px;
}

.action button{
  width:110px;
  background:black;
  color:gold;
}

button:disabled{
  background:#555!important;
  color:#aaa!important;
}

.king-image img{
  width:120px;
  height:180px;
  margin:5px;
  opacity:0.3;
  transition:all .5s;
  border-radius:10px;
  box-shadow:0 0 5px black;
}
#JeramieImg.active{
  opacity: 1;
  box-shadow: 0 0 25px white;
  background-color: white;
  transform:scale(1.1);
}
#GiraImg.active{
  opacity: 1;
  box-shadow: 0 0 25px darkred;
  background-color: darkred;
  transform:scale(1.1);
}
#YanmaImg.active{
  opacity: 1;
  box-shadow: 0 0 25px darkblue;
  background-color: darkblue;
  transform:scale(1.1);
}
#HymenoImg.active{
  opacity: 1;
  box-shadow: 0 0 25px yellow;
  background-color: yellow;
  transform:scale(1.1);
}
#RitaImg.active{
  opacity: 1;
  box-shadow: 0 0 25px grey;
  background-color: grey;
  transform:scale(1.1);
}
#KaguragiImg.active{
  opacity: 1;
  box-shadow: 0 0 25px purple;
  background-color: purple;
  transform:scale(1.1);
}
#GloriaImg.active{
  opacity: 1;
  box-shadow: 0 0 25px silver;
  background-color: silver;
  transform:scale(1.1);
}

</style>
</head>
<body>

<h1>🐞 君王者变身器</h1>

<div id="driver">
  <div id="display" style="display:none;">_____</div>
  <div id="stageDisplay" style="display:none;">Stage: 1 / 5</div>

  <div class="password-buttons">
    <button onclick="press('A')">A</button>
    <button onclick="press('B')">B</button>
    <button onclick="press('C')">C</button>
    <button onclick="press('D')">D</button>
    <button onclick="press('E')">E</button>
    <button onclick="press('F')">F</button>
    <button onclick="press('G')">G</button>
  </div>

  <div class="action">
    <button id="henshinBtn" onclick="henshin()" disabled>HENSHIN</button>
    <button id="resetBtn" onclick="resetSystem()" style="display:none;">重置</button>
  </div>
</div>

<div class="king-image">
  <img id="GiraImg" src="kuwagata.png">
  <img id="YanmaImg" src="tombo.png">
  <img id="HymenoImg" src="kamakiri.png">
  <img id="KaguragiImg" src="papillon.png">
  <img id="RitaImg" src="haichi.png">
  <img id="JeramieImg" src="spider.png">
  <img id="GloriaImg" src="zero.png">
</div>

<audio id="standbyA" src="standby 1.mp3" loop></audio>
<audio id="standbyB" src="standby 2.mp3" loop></audio>
<audio id="standbyC" src="standby 3.mp3" loop></audio>
<audio id="standbyD" src="standby 4.mp3" loop></audio>
<audio id="standbyE" src="standby 5.mp3" loop></audio>

<audio id="standbyF" src="spider standby.mp3" loop></audio>
<audio id="standbyG" src="zero standby.mp3" loop></audio>

<audio id="failSound" src="fail.mp3"></audio>

<audio id="GiraSpecial" src="special kuwagata.mp3"></audio>
<audio id="YanmaSpecial" src="special tombo.mp3"></audio>
<audio id="HymenoSpecial" src="special kamakiri.mp3"></audio>
<audio id="KaguragiSpecial" src="special haici.mp3"></audio>
<audio id="RitaSpecial" src="special papillon.mp3"></audio>
<audio id="JeramieSpecial" src="special spider.mp3"></audio>
<audio id="GloriaSpecial" src="special zero.mp3"></audio>

<audio id="GiraHenshin" src="kuwagata ohger.mp3"></audio>
<audio id="YanmaHenshin" src="tombo ohger.mp3"></audio>
<audio id="HymenoHenshin" src="kamakiri ohger.mp3"></audio>
<audio id="RitaHenshin" src="haici ohger.mp3"></audio>
<audio id="KaguragiHenshin" src="papillon ohger.mp3"></audio>
<audio id="JeramieHenshin" src="spider kumonos 1.mp3"></audio>
<audio id="GloriaHenshin" src="zero ohger.mp3"></audio>

<script>
const passwords={
  Gira:['A','B','C','D','E'],
  Yanma:['B','B','C','D','E'],
  Hymeno:['C','B','C','D','E'],
  Kaguragi:['D','B','C','D','E'],
  Rita:['E','B','C','D','E'],
  Jeramie:['F'],
  Gloria:['G']
};

const buttonMap={A:'Gira', B:'Yanma', C:'Hymeno', D:'Rita', E:'Kaguragi', F:'Jeramie', G:'Gloria'};
const standbyStages=['standbyA','standbyB','standbyC','standbyD','standbyE'];

let currentStage=4;
let input=[];
let unlockedKing=null;
let transformed=false;
let audioPlaying=false;
let currentStandby=null;
let firstClick={Gira:true,Yanma:true,Hymeno:true,Kaguragi:true,Rita:true,Jeramie:true,Gloria:true};
// 启动阶段待机循环
function startStage(audio){
  if(currentStandby) currentStandby.pause();
  currentStandby=audio;
  currentStandby.currentTime=0;
  currentStandby.onended=()=>{ currentStandby.currentTime=0; currentStandby.play(); };
  currentStandby.play();
}



// 初始化 Stage 1 待机
startStage(document.getElementById(standbyStages[0]));

function updateStageDisplay(){ document.getElementById('stageDisplay').textContent='Stage: '+(currentStage+1)+' / 5'; }
function updateDisplay(){ document.getElementById('display').textContent=input.join('').padEnd(5,'_'); }

function press(btn){
  if(transformed || audioPlaying) return;
  audioPlaying=true;

  const king=buttonMap[btn];
  const audioId=firstClick[king]?king+'Special':king+'Special';
  firstClick[king]=false;

  const btnAudio=document.getElementById(audioId);
  btnAudio.currentTime=0;

  if(currentStandby) currentStandby.pause();

  btnAudio.onended=()=>{
    if(btn==='F'){
      input.push('F');
      unlockedKing='Jeramie';
      document.getElementById('henshinBtn').disabled=false;
      const fAudio=document.getElementById('standbyF');
      fAudio.currentTime=0;
      fAudio.play();
      currentStandby=fAudio;
    } else if(btn==='G'){
      input.push('G');
      unlockedKing='Gloria';
      document.getElementById('henshinBtn').disabled=false;
      const gAudio=document.getElementById('standbyG');
      gAudio.currentTime=0;
      gAudio.play();
      currentStandby=gAudio;
    } else {
      input.push(btn);
      currentStage=(currentStage+1)%standbyStages.length;
      updateStageDisplay();
      startStage(document.getElementById(standbyStages[currentStage]));
      if(input.length===5) checkPassword();
    }
    audioPlaying=false;
    updateDisplay();
  };

  btnAudio.play();
}

function checkPassword(){
  unlockedKing=null;
  for(let king in passwords){
    if(input.join('')===passwords[king].join('')){
      unlockedKing=king;
      break;
    }
  }
  if(unlockedKing) document.getElementById('henshinBtn').disabled=false;
  else{
    document.getElementById('failSound').play();
    setTimeout(()=>{ input=[]; updateDisplay(); },800);
  }
}

function henshin(){
  if(transformed || !unlockedKing) return;
  transformed=true;
  if(currentStandby) currentStandby.pause();

  const audio=document.getElementById(unlockedKing+'Henshin');
  audio.play();

  document.querySelectorAll('.king-image img').forEach(img=>img.classList.remove('active'));
  document.getElementById(unlockedKing+'Img').classList.add('active');

  document.getElementById('resetBtn').style.display='inline-block';
  document.getElementById('henshinBtn').disabled=true;
} 
function resetSystem(){
  location.reload();   // ✅ 改成整页刷新
}
</script>

</body>
</html>