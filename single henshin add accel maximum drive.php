<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kamen Rider Memory</title>

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
      <img src="skull.jpg" width="200" height="150">
      <button onclick="insertMemory('skull')">skull</button>
      <button onclick="play(1)">click</button>
    </div>
    <div>
      <img src="joker.jpeg" width="200" height="150">
      <button onclick="insertMemory('joker')">Joker</button>
      <button onclick="play(2)">click</button>
    </div>
    <div>
      <img src="ertanal.jpg" width="200" height="150">
      <button onclick="insertMemory('erternal')">eternal</button>
      <button onclick="play(3)">click</button>
    </div>
    <div>
      <img src="accel.jpeg" width="200" height="150">
      <button onclick="insertMemory('axcel')">accel</button>
      <button onclick="play(5)">click</button>
    </div>
    <div>
      <img src="cyclone.webp" width="200" height="150">
      <button onclick="insertMemory('cyclone')">cyclone</button>
      <button onclick="play(4)">click</button>
    </div>
  </div>

  <div style="text-align:center;">
    <button id="henshinBtn">Henshin</button>
    <!-- ✅ 新增：Accel Maximum Drive（不影响原按钮） -->
    <button id="accelMaxBtn" disabled onclick="accelMaximumDrive()">
      Accel Maximum Drive
    </button>
  </div>

  <!-- Henshin sounds -->
  <audio id="skull_joker" src="skull.mp3"></audio>
  <audio id="joker_joker" src="joker.mp3"></audio>
  <audio id="erternal_joker" src="erternal.mp3"></audio>
  <audio id="axcel_joker" src="axcel.mp3"></audio>
  <audio id="cyclone_joker" src="cyclone.mp3"></audio>

  <!-- Button click sound -->
  <audio id="btnSound" src="memory click.mp3"></audio>
  <audio id="btnSound_axcel" src="acxel plug.mp3"></audio>

  <audio id="audio1" src="btn_skull.mp3"></audio>
  <audio id="audio2" src="btn joker.mp3"></audio>
  <audio id="audio3" src="btn_eternal.mp3"></audio>
  <audio id="audio4" src="btn cyclone.mp3"></audio>
  <audio id="audio5" src="btn accel.mp3"></audio>

  <!-- 记忆体专属插入音效 -->
  <audio id="insert_skull" src="btn skull click.mp3"></audio>
  <audio id="insert_joker" src="btn joker click.mp3"></audio>
  <audio id="insert_erternal" src="btn eternal click.mp3"></audio>
  <audio id="insert_axcel" src=" btn accel click.mp3"></audio>
  <audio id="insert_cyclone" src="btn cyclone click.mp3"></audio>

  <!-- ✅ 新增：Accel Maximum Drive 音效 -->
  <audio id="accel_max" src="accel_maximum_drive.mp3"></audio>

  <script>
    let memory = null; // 原有逻辑

    /* ===== Accel 专用状态（新增，不影响原逻辑）===== */
    let accelTransformed = false;
    let accelMaxUsed = false;

    // 插入记忆体（原函数 + 追加）
    function insertMemory(type) {
      memory = type;

      const insertAudio = document.getElementById("insert_" + type);
      if (insertAudio) {
        insertAudio.currentTime = 0;
        insertAudio.play();
      } else {
        const btnSound = document.getElementById("btnSound");
        btnSound.currentTime = 0;
        btnSound.play();
      }

      /* ✅ 如果插的是 accel，重置 Maximum Drive */
      if (type === "axcel") {
        accelTransformed = false;
        accelMaxUsed = false;
        document.getElementById("accelMaxBtn").disabled = true;
      }

      console.log("Memory inserted:", type);
    }

    // 按钮点击音效（原有）
    function play(num) {
      const audio = document.getElementById("audio" + num);
      if (audio) {
        audio.currentTime = 0;
        audio.play();
      }
    }

    // Henshin 按钮逻辑（原逻辑 + 追加）
    document.getElementById("henshinBtn").onclick = function () {
      if (!memory) {
        alert("Error: select a memory!");
        return;
      }

      const combo = memory + "_joker";
      const audio = document.getElementById(combo);

      if (audio) {
        audio.currentTime = 0;
        audio.play();

        /* ✅ Accel 变身完成，解锁 Maximum Drive */
        if (memory === "axcel") {
          accelTransformed = true;
          accelMaxUsed = false;
          document.getElementById("accelMaxBtn").disabled = false;
        }
      } else {
        alert("This memory has no sound!");
      }
    };

    /* ===== Accel Maximum Drive（新增）===== */
    function accelMaximumDrive() {
      if (!accelTransformed || accelMaxUsed) return;

      accelMaxUsed = true;
      document.getElementById("accel_max").currentTime = 0;
      document.getElementById("accel_max").play();

      // 用完锁死，必须重新插 accel 再变身
      document.getElementById("accelMaxBtn").disabled = true;
      accelTransformed = false;
    }
  </script>
</body>
</html>