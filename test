<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>君王者变身器</title>

<style>
body{
  background:#000;
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
  background:#111;
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
  background:#333;
  color:gold;
  font-size:16px;
}

.action button{
  width:110px;
  background:gold;
  color:black;
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

.king-image img.active{
  opacity:1;
  box-shadow:0 0 25px gold;
  transform:scale(1.1);
}
</style>
</head>

<body>

<h1>🐞 君王者变身器</h1>

<div id="driver">
  <div id="display">_____</div>
  <div id="stageDisplay">Stage: 1 / 5</div>

  <div class="password-buttons">
    <button onclick="press('A')">A</button>
    <button onclick="press('B')">B</button>
    <button onclick="press('C')">C</button>
    <button onclick="press('D')">D</button>
    <button onclick="press('E')">E</button>
    
  </div>

  <div class="action">
    <button id="henshinBtn" onclick="henshin()" disabled>HENSHIN</button>
    <button id="resetBtn" onclick="resetSystem()" style="display:none;">重置</button>
  </div>
</div>

<div class="king-image">
  <img id="GiraImg" src="kuwagata.jpeg">
  <img id="YanmaImg" src="tombo.jpeg">
  <img id="HymenoImg" src="kamakiri.jpeg">
  <img id="KaguragiImg" src="papillon.jpeg">
  <img id="RitaImg" src="haichi.jpeg">  
</div>

<!-- 待机音 -->
<audio id="standbyA" src="standby 1.mp3"></audio>
<audio id="standbyB" src="standby 2.mp3"></audio>
<audio id="standbyC" src="standby 3.mp3"></audio>
<audio id="standbyD" src="standby 4.mp3"></audio>
<audio id="standbyE" src="standby 5.mp3"></audio>

<!-- 失败音 -->
<audio id="failSound" src="fail.mp3"></audio>

<!-- 按钮音 -->
<audio id="GiraSpecial" src="special kuwagata.mp3"></audio>
<audio id="GiraNormal" src="special kuwagata.mp3"></audio>

<audio id="YanmaSpecial" src="special tombo.mp3"></audio>
<audio id="YanmaNormal" src="special tombo.mp3"></audio>

<audio id="HymenoSpecial" src="special kamakiri.mp3"></audio>
<audio id="HymenoNormal" src="special kamakiri btn.mp3"></audio>

<audio id="KaguragiSpecial" src="special haici.mp3"></audio>
<audio id="KaguragiNormal" src="special haici.mp3"></audio>

<audio id="RitaSpecial" src="special papillon.mp3"></audio>
<audio id="RitaNormal" src="special papillon.mp3"></audio>

<!-- HENSHIN -->
<audio id="GiraHenshin" src="kuwagata ohger.mp3"></audio>
<audio id="YanmaHenshin" src="tombo ohger.mp3"></audio>
<audio id="HymenoHenshin" src="kamakiri ohger.mp3"></audio>
<audio id="RitaHenshin" src="haici ohger.mp3"></audio>
<audio id="KaguragiHenshin" src="papillon ohger.mp3"></audio>

<script>
const passwords={
  Gira:['A','B','C','D','E'],
  Yanma:['B','B','C','D','E'],
  Hymeno:['C','B','C','D','E'],
  Kaguragi:['D','B','C','D','E'],
  Rita:['E','B','C','D','E']
};

const buttonMap={
  A:'Gira',B:'Yanma',C:'Hymeno',D:'Rita',E:'Kaguragi'
};

const standbyStages=['standbyA','standbyB','standbyC','standbyD','standbyE'];

let currentStage=5;
let currentStandby;
let input=[];
let unlockedKing=null;
let transformed=false;
let audioPlaying=false;

let firstClick={Gira:true,Yanma:true,Hymeno:true,Kaguragi:true,Rita:true};

/* ====== 待机音控制 ====== */
function stopAllStandby(){
  standbyStages.forEach(id=>{
    const a=document.getElementById(id);
    a.pause();
    a.currentTime=0;
    a.removeEventListener('ended', a._loopHandler);
  });
}

function startStandby(){
  //if(audioPlaying) return;
  stopAllStandby();

  currentStandby = document.getElementById(standbyStages[currentStage]);
  currentStandby.currentTime = 0;

  // 循环播放
  currentStandby._loopHandler = () => {
    currentStandby.currentTime = 0;
    currentStandby.play();
  };
  currentStandby.addEventListener('ended', currentStandby._loopHandler);

  currentStandby.play();
  updateStageDisplay();
}

/* ====== 阶段显示 ====== */
function updateStageDisplay(){
  document.getElementById('stageDisplay').textContent = `Stage: ${currentStage+1} / 5`;
}

/* ====== 阶段推进 ====== */
function nextStage(){
  currentStage++;
  if(currentStage >= standbyStages.length){
    currentStage = 0; // 最后一阶段循环回第一阶段
  }
  startStandby();
}

/* ====== 显示更新 ====== */
function updateDisplay(){
  document.getElementById('display').textContent=input.join('').padEnd(5,'_');
}

/* ====== 按钮点击 ====== */
function press(btn){
  if(transformed || audioPlaying) return;

  audioPlaying = true;
  stopAllStandby(); // 点击按钮停止当前待机音

  const king = buttonMap[btn];
  const audioId = firstClick[king] ? king+'Special' : king+'Normal';
  const audio = document.getElementById(audioId);
  firstClick[king] = false;

  audio.currentTime = 0;
  audio.removeEventListener('ended', audio._handleEnd);
  audio._handleEnd = () => {
    input.push(btn);
    updateDisplay();

    nextStage();

    if(input.length === 5){
      checkPassword();
    }

    audioPlaying = false;
  };
  audio.addEventListener('ended', audio._handleEnd);

  audio.play();
}

/* ====== 密码判断 ====== */
function checkPassword(){
  unlockedKing=null;

  for(let king in passwords){
    if(input.join('')===passwords[king].join('')){
      unlockedKing=king;
      break;
    }
  }

  if(unlockedKing){
    document.getElementById('henshinBtn').disabled=false;
  }else{
    document.getElementById('failSound').play();
    setTimeout(()=>{
      input=[];
      updateDisplay();
    },800);
  }
}

/* ====== 变身 ====== */
function henshin(){
  if(transformed || !unlockedKing) return;

  transformed = true;
  stopAllStandby();

  const audio = document.getElementById(unlockedKing+'Henshin');
  audio.currentTime = 0;
  audio.play();

  document.querySelectorAll('.king-image img').forEach(img => img.classList.remove('active'));
  document.getElementById(unlockedKing+'Img').classList.add('active');

  document.getElementById('resetBtn').style.display='inline-block';
  document.getElementById('henshinBtn').disabled=true;
}

/* ====== 重置 ====== */
function resetSystem(){
  input=[];
  unlockedKing=null;
  transformed=false;
  currentStage=0;
  audioPlaying=false;

  firstClick={Gira:true,Yanma:true,Hymeno:true,Kaguragi:true,Rita:true};

  document.querySelectorAll('.king-image img').forEach(img => img.classList.remove('active'));

  document.getElementById('henshinBtn').disabled=true;
  document.getElementById('resetBtn').style.display='none';

  updateDisplay();
  startStandby();
}

// 初始化
startStandby();
</script>
</body>
</html>