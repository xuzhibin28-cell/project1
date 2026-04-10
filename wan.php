<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>变身模拟器</title>  

  <style>
    .container {
      display: grid;
      grid-template-columns: auto auto;
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
    <button id="ultimateBtn" disabled>fang striker</button> 
  </div>

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

  <div>
    <img src="fang.jpeg" width="200" height="150">
    <button onclick="insertLeft('fang')">Fang</button>
    <button onclick="play(4)">click</button>
  </div>
</div>

<div style="text-align:center;">
  <button id="henshinBtn">Henshin</button>
</div>

<!-- Henshin sound -->
<audio id="henshinSound" src="henshin.mp3"></audio>

<!-- Henshin combo sounds -->
<audio id="cyclone_joker" src="3_.mp3"></audio>
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

<!-- Button sounds -->
<audio id="btnSound" src="memory click.mp3"></audio>

<!-- Fang click and Ultimate sounds -->
<audio id="btnSound_fang_click" src="fang click new.mp3"></audio>
<audio id="audio1" src="arm_fang_next.mp3"></audio>
<audio id="audio2" src="shoulder_fang_next2.mp3"></audio>
<audio id="audio3" src="ultimate last.mp3"></audio>

<audio id="audio8" src="btn cyclone.mp3"></audio>
<audio id="audio9" src="btn heat.mp3"></audio>
<audio id="audio10" src="btn_luna.mp3"></audio>
<audio id="audio4" src="btn fang.mp3"></audio>
<audio id="audio5" src="btn joker.mp3"></audio>
<audio id="audio6" src="btn metal.mp3"></audio>
<audio id="audio7" src="btn trigger.mp3"></audio>

<script>
  let leftMemory = null;
  let rightMemory = null;
  let henshinClicked = false;

  // 每个记忆对应的独特音效
  const memorySounds = {
    cyclone: "1.m4a",    // Cyclone的插入音效
    joker: "2.m4a",        // Joker的插入音效
    heat: "heat_insert.mp3",          // Heat的插入音效
    metal: "metal_insert.mp3",        // Metal的插入音效
    luna: "luna_insert.mp3",          // Luna的插入音效
    trigger: "trigger_insert.mp3",    // Trigger的插入音效
    fang: "fang_insert.mp3"           // Fang的插入音效
  };

  // 插入左边的记忆并播放对应的音效
  function insertLeft(type) {
    leftMemory = type;
    playMemorySound(type);  // 播放左边记忆的独特音效
    checkUltimateButtonVisibility();
  }

  // 插入右边的记忆并播放对应的音效
  function insertRight(type) {
    rightMemory = type;
    playMemorySound(type);  // 播放右边记忆的独特音效
    checkUltimateButtonVisibility();
  }

  // 根据记忆类型播放对应的音效
  function playMemorySound(type) {
    const soundFile = memorySounds[type];
    if (soundFile) {
      const audio = new Audio(soundFile);
      audio.play();
    }
  }

  // 检查 Ultimate 按钮是否可以解锁
  function checkUltimateButtonVisibility() {
    if (henshinClicked && ((leftMemory === 'fang' && rightMemory === 'joker') || (leftMemory === 'joker' && rightMemory === 'fang'))) {
      document.getElementById("ultimateBtn").disabled = false; // 解锁 Ultimate 按钮
    } else {
      document.getElementById("ultimateBtn").disabled = true; // 禁用 Ultimate 按钮
    }
  }

  // Henshin 按钮点击事件
  document.getElementById("henshinBtn").onclick = function () {
    if (!leftMemory || !rightMemory) {
      alert("错误：请选择两个记忆！");
      return;
    }

    document.getElementById("henshinSound").play();  // 播放 Henshin 音效
    henshinClicked = true;  // 设置 Henshin 已点击
    checkUltimateButtonVisibility();  // 检查 Ultimate 按钮是否解锁

    const combos = {
      "cyclone_joker": "3_.mp3",
      "heat_joker": "heat_joker.mp3",
      "cyclone_metal": "cyclone_metal.mp3",
      "cyclone_trigger": "cyclone_trigger.mp3",
      "fang_joker": "fang_joker.mp3",
      "fang_trigger": "fang_trigger.mp3",
      "fang_metal": "fang_metal.mp3",
      "heat_metal": "heat_metal_1.mp3",
      "heat_trigger": "heat_trigger.mp3",
      "luna_joker": "luna_joker.mp3",
      "luna_metal": "luna_metal.mp3",
      "luna_trigger": "luna_trigger.mp3"
    };

    let combo = leftMemory + "_" + rightMemory;
    if (!combos[combo]) combo = rightMemory + "_" + leftMemory;

    const soundSrc = combos[combo];
    if (soundSrc) {
      const audio = new Audio(soundSrc);
      audio.play();
    } else {
      alert("此记忆没有音效！");
    }
  };

  // Ultimate 按钮点击事件
  document.getElementById("ultimateBtn").onclick = function () {
    // 播放 Fang 点击音效
    const fangClickAudio = document.getElementById("btnSound_fang_click");
    if (!fangClickAudio.paused) {
      return;
    }
    fangClickAudio.play();

    // 播放 Ultimate 序列
    fangClickAudio.onended = function() {
      if (ultimateStage === 0) {
        playUltimateAudio(1);
        ultimateStage = 1;
        ultimateClickCount = 0;
        return;
      }

      if (ultimateStage === 1) {
        ultimateClickCount++;
        if (ultimateClickCount >= 2) {
          playUltimateAudio(2);
          ultimateStage = 2;
          ultimateClickCount = 0;
        }
        return;
      }

      if (ultimateStage === 2) {
        ultimateClickCount++;
        if (ultimateClickCount >= 3) {
          playUltimateAudio(3);
          ultimateStage = 0;
          ultimateClickCount = 0;
          // 重新禁用 Ultimate 按钮
          document.getElementById("ultimateBtn").disabled = true;
        }
        return;
      }
    };
  };

  // 播放 Ultimate 音效
  function playUltimateAudio(num) {
    // 停止所有的 Ultimate 音效
    stopAllUltimateAudio();

    // 播放当前阶段的音效
    const audio = document.getElementById("audio" + num);
    audio.currentTime = 0;
    audio.play();
  }

  // 停止所有的 Ultimate 音效
  function stopAllUltimateAudio() {
    document.getElementById("audio1").pause();
    document.getElementById("audio2").pause();
    document.getElementById("audio3").pause();
  }
</script>

</body>
</html>
