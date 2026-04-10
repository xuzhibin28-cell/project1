<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kamen Rider W</title>
<style>
  .container {
    display: flex;
    gap: 10px;
    text-align: center;
    margin-bottom: 20px;
  }
</style>
</head>
<body>

<div class="container">
  <div>
    <img src="cyclone.webp" width="200" height="150">
    <button onclick="insertLeft('cyclone')">Cyclone</button>
    <button onclick="play(8)">click</button>
  </div>
  <div>
    <img src="joker.jpeg" width="200" height="150">
    <button onclick="insertRight('joker')">Joker</button>
    <button onclick="play(5)">click</button>
  </div>
  <div>
    <img src="xtreme.webp" width="200" height="150">
    <button id="xtremeBtn" disabled>Xtreme</button>
  </div>
</div>

<div class="container">
  <div>
    <img src="heat.jpeg" width="200" height="150">
    <button onclick="insertLeft('heat')">Heat</button>
    <button onclick="play(9)">click</button>
  </div>
  <div>
    <img src="metal.jpg" width="200" height="150">
    <button onclick="insertRight('metal')">Metal</button>
    <button onclick="play(6)">click</button>
  </div>
</div>

<div class="container">
  <div>
    <img src="luna.jpg" width="200" height="150">
    <button onclick="insertLeft('luna')">Luna</button>
    <button onclick="play(10)">click</button>
  </div>
  <div>
    <img src="trigger.jpg" width="200" height="150">
    <button onclick="insertRight('trigger')">Trigger</button>
    <button onclick="play(7)">click</button>
  </div>
</div>

<div class="container">
  <div>
    <img src="fang.jpeg" width="200" height="150">
    <button onclick="insertLeft('fang')">Fang</button>
    <button onclick="play(4)">click</button>
    <button id="ultimateBtn" disabled>fang maximum drive</button>
  </div>
</div>

<div style="text-align:center;margin-top:10px;">
  <button id="henshinBtn">Henshin</button>
</div>


<!-- ===== 音效 ===== -->
<audio id="henshinSound" src="henshin.mp3"></audio>

<audio id="insert_cyclone" src="memory click.mp3"></audio>
<audio id="insert_joker" src="memory click.mp3"></audio>
<audio id="insert_heat" src="memory click.mp3"></audio>
<audio id="insert_metal" src="memory click.mp3"></audio>
<audio id="insert_luna" src="memory click.mp3"></audio>
<audio id="insert_trigger" src="memory click.mp3"></audio>
<audio id="insert_fang" src="memory click.mp3"></audio>

<audio id="btnSound" src="memory click.mp3"></audio>

<!-- 共用待机 -->
<audio id="standbySound" src="standby w.mp3" loop></audio>

<audio id="cyclone_joker" src="cyclone_joker.mp3"></audio>
<audio id="heat_joker" src="heat_joker.mp3"></audio>
<audio id="cyclone_metal" src="cyclone_metal.mp3"></audio>
<audio id="cyclone_trigger" src="cyclone_trigger.mp3"></audio>
<audio id="fang_joker" src="fang_joker.mp3"></audio>
<audio id="fang_trigger" src="fang_trigger.mp3"></audio>
<audio id="fang_metal" src="fang_metal.mp3"></audio>
<audio id="heat_metal" src="heat_metal_1.mp3"></audio>
<audio id="heat_trigger" src="heat_trigger.mp3"></audio>
<audio id="luna_joker" src="luna_joker.mp3"></audio>
<audio id="luna_metal" src="luna_metal.mp3"></audio>
<audio id="luna_trigger" src="luna_trigger.mp3"></audio>

<!-- Fang Ultimate -->
<audio id="btnSound_fang_click" src="fang click new.mp3"></audio>
<audio id="audio1" src="arm_fang_next.mp3"></audio>
<audio id="audio2" src="shoulder_fang_next2.mp3"></audio>
<audio id="audio3" src="ultimate_last.mp3"></audio>

<!-- 单独 click -->
<audio id="audio4" src="btn fang.mp3"></audio>
<audio id="audio5" src="btn joker.mp3"></audio>
<audio id="audio6" src="btn metal.mp3"></audio>
<audio id="audio7" src="btn trigger.mp3"></audio>
<audio id="audio8" src="btn cyclone.mp3"></audio>
<audio id="audio9" src="btn heat.mp3"></audio>
<audio id="audio10" src="btn_luna.mp3"></audio>

<!-- Xtreme -->
<audio id="xtremeInsert" src="xtreme plug.mp3"></audio>
<audio id="xtremeHenshin" src="xtreme.mp3"></audio>

<script>
let leftMemory=null;
let rightMemory=null;
let henshinClicked=false;

let ultimateStage=0;
let ultimateClickCount=0;

let xtremeStage=0;
let xtremeUsed=false;

let standby=document.getElementById("standbySound");

/* 停止待机 */
function stopStandby(){
  standby.pause();
  standby.currentTime=0;
}

/* click */
function play(num){
  const a=document.getElementById("audio"+num);
  if(a){a.currentTime=0;a.play();}
}

/* 插入记忆体 */
function playMemoryInsert(type){

  stopStandby();

  const insertAudio=document.getElementById("insert_"+type);

  if(insertAudio){
    insertAudio.currentTime=0;
    insertAudio.play();

    insertAudio.onended=function(){
      standby.currentTime=0;
      standby.play();
    };

  }else{
    btnSound.currentTime=0;
    btnSound.play();

    btnSound.onended=function(){
      standby.currentTime=0;
      standby.play();
    };
  }
}

function insertLeft(type){
  leftMemory=type;
  playMemoryInsert(type);
  resetXtreme();
  checkUltimate();
  checkXtreme();
}

function insertRight(type){
  rightMemory=type;
  playMemoryInsert(type);
  resetXtreme();
  checkUltimate();
  checkXtreme();
}

/* Fang Ultimate */
function checkUltimate(){
  ultimateBtn.disabled = !(
    henshinClicked &&
    leftMemory==="fang" &&
    rightMemory==="joker"
  );
}

ultimateBtn.onclick=function(){
  btnSound_fang_click.play();
  btnSound_fang_click.onended=function(){
    if(ultimateStage===0){audio1.play();ultimateStage=1;ultimateClickCount=0;return;}
    if(ultimateStage===1){ultimateClickCount++;if(ultimateClickCount>=2){audio2.play();ultimateStage=2;ultimateClickCount=0;}return;}
    if(ultimateStage===2){ultimateClickCount++;if(ultimateClickCount>=3){audio3.play();ultimateStage=0;ultimateBtn.disabled=true;}}
  };
};

/* Henshin */
henshinBtn.onclick=function(){
  if(!leftMemory||!rightMemory){
    alert("请选择两个记忆");
    return;
  }

  stopStandby();

  henshinSound.play();
  henshinClicked=true;
  checkUltimate();
  checkXtreme();

  let key=leftMemory+"_"+rightMemory;
  let audio=document.getElementById(key)
        ||document.getElementById(rightMemory+"_"+leftMemory);

  if(audio) audio.play();
};

/* Xtreme */
function resetXtreme(){
  xtremeStage=0;
  xtremeUsed=false;
}

function checkXtreme(){
  xtremeBtn.disabled = !(
    henshinClicked &&
    !xtremeUsed &&
    (
      (leftMemory==="cyclone"&&rightMemory==="joker")||
      (leftMemory==="joker"&&rightMemory==="cyclone")
    )
  );
}

xtremeBtn.onclick=function(){
  if(xtremeUsed) return;

  if(xtremeStage===0){
    xtremeInsert.play();
    xtremeStage=1;
    return;
  }
  if(xtremeStage===1){
    xtremeHenshin.play();
    xtremeUsed=true;
    xtremeStage=0;
    xtremeBtn.disabled=true;
  }
};
</script>

</body>
</html>