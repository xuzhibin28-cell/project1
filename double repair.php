<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>假面骑士W 变身模拟</title>  
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
    <div class="memory">
      <img src="cyclone.webp" width="100" height="150">
      <button class="btn" onclick="insertMemory('left', 'cyclone')">Cyclone</button>
    </div>

    <div class="memory">
      <img src="joker.jpeg" width="100" height="150">
      <button class="btn" onclick="insertMemory('right', 'joker')">Joker</button> 
    </div>

    <div class="memory">
      <img src="heat.jpeg" width="100" height="150">
      <button class="btn" onclick="insertMemory('left', 'heat')">Heat</button>
    </div>

    <div class="memory">
      <img src="metal.jpg" width="100" height="150">
      <button class="btn" onclick="insertMemory('right', 'metal')">Metal</button> 
    </div>
  </div>
<div class="container">
    <div class="memory">
      <img src="luna.jpg" width="100" height="150">
      <button class="btn" onclick="insertMemory('left', 'luna')">Luna</button>
    </div>

    <div class="memory">
      <img src="trigger.jpg" width="100" height="150">
      <button class="btn" onclick="insertMemory('right', 'trigger')">Trigger</button> 
    </div>

    <div class="memory">
      <img src="fang.jpeg" width="100" height="150">
      <button class="btn" onclick="insertMemory('left', 'fang')">Fang</button>
    </div>
  </div>
</div>

  <div class="henshin-container">
    <button class="btn" id="henshinBtn" onclick="henshin()">Henshin!</button>
    <div class="henshin" id="henshinText">Henshin!!</div>
  </div>
</div>

<!-- Henshin sound -->
<audio id="henshinSound" src="henshin.mp3"></audio>

<!-- Custom memory insertion sounds -->
<audio id="cycloneSound" src="cyclone_insert.mp3"></audio>
<audio id="jokerSound" src="joker_insert.mp3"></audio>
<audio id="heatSound" src="heat_insert.mp3"></audio>
<audio id="metalSound" src="metal_insert.mp3"></audio>
<audio id="lunaSound" src="luna_insert.mp3"></audio>
<audio id="triggerSound" src="trigger_insert.mp3"></audio>
<audio id="fangSound" src="fang_insert.mp3"></audio>

<!-- Combo sound effects -->
<audio id="comboCycloneJoker" src="cyclone_joker.mp3"></audio>
<audio id="comboHeatJoker" src="heat_joker.mp3"></audio>
<audio id="comboCycloneMetal" src="cyclone_metal.mp3"></audio>
<audio id="comboCycloneTrigger" src="cyclone_trigger.mp3"></audio>
<audio id="comboFangJoker" src="fang_joker.mp3"></audio>
<audio id="comboFangTrigger" src="fang_trigger.mp3"></audio>
<audio id="comboFangMetal" src="fang+metal.mp3"></audio>
<audio id="comboHeatMetal" src="heat_metal_1.mp3"></audio>
<audio id="comboHeatTrigger" src="heat_trigger.mp3"></audio>
<audio id="comboLunaMetal" src="luna_metal.mp3"></audio>
<audio id="comboLunaTrigger" src="luna_trigger.mp3"></audio>

<!-- Button sounds -->
<audio id="btnSound" src="memory_click.mp3"></audio>

<script>
  let leftMemory = null;
  let rightMemory = null;
  let henshinClicked = false;  // Track if Henshin button has been clicked

  // Audio references
  const cycloneSound = document.getElementById("cycloneSound");
  const jokerSound = document.getElementById("jokerSound");
  const heatSound = document.getElementById("heatSound");
  const metalSound = document.getElementById("metalSound");
  const lunaSound = document.getElementById("lunaSound");
  const triggerSound = document.getElementById("triggerSound");
  const fangSound = document.getElementById("fangSound");
  const henshinSound = document.getElementById("henshinSound");
  const comboCycloneJoker = document.getElementById("comboCycloneJoker");
  const comboHeatJoker = document.getElementById("comboHeatJoker");
  const comboCycloneMetal = document.getElementById("comboCycloneMetal");
  const comboCycloneTrigger = document.getElementById("comboCycloneTrigger");
  const comboFangJoker = document.getElementById("comboFangJoker");
  const comboFangTrigger = document.getElementById("comboFangTrigger");
  const comboFangMetal = document.getElementById("comboFangMetal");
  const comboHeatMetal = document.getElementById("comboHeatMetal");
  const comboHeatTrigger = document.getElementById("comboHeatTrigger");
  const comboLunaMetal = document.getElementById("comboLunaMetal");
  const comboLunaTrigger = document.getElementById("comboLunaTrigger");
  const btnSound = document.getElementById("btnSound");

  // Play button click sound
  function playClick() {
    btnSound.currentTime = 0;
    btnSound.play();
  }

  // Insert memory into left or right
  function insertMemory(side, type) {
    playClick();

    // Insert memory into appropriate side
    if (side === 'left') {
      leftMemory = type;
    } else if (side === 'right') {
      rightMemory = type;
    }

    playMemoryInsertSound(type); // Play sound for the inserted memory
    checkHenshinButtonVisibility();
  }

  // Play memory-specific sound effects
  function playMemoryInsertSound(type) {
    switch (type) {
      case 'cyclone':
        cycloneSound.play();
        break;
      case 'joker':
        jokerSound.play();
        break;
      case 'heat':
        heatSound.play();
        break;
      case 'metal':
        metalSound.play();
        break;
      case 'luna':
        lunaSound.play();
        break;
      case 'trigger':
        triggerSound.play();
        break;
      case 'fang':
        fangSound.play();
        break;
      default:
        console.log("Unknown memory type!");
    }
  }

  // Check if the Henshin button can be clicked
  function checkHenshinButtonVisibility() {
    if (leftMemory && rightMemory) {
      document.getElementById("henshinBtn").disabled = false;
    } else {
      document.getElementById("henshinBtn").disabled = true;
    }
  }

  // Henshin button click event
  function henshin() {
    if (!leftMemory || !rightMemory) {
      alert("错误：请选择两个记忆！");
      return;
    }

    henshinSound.play(); // Play henshin sound
    document.getElementById("henshinText").style.display = "block";  // Show Henshin text
    document.getElementById("henshinText").classList.add("henshin-animation"); // Add animation class

    // Play the combo sound based on the memory combination
    playComboSound(leftMemory, rightMemory);

    // Show transformation text for 2 seconds and then hide it
    setTimeout(() => {
      document.getElementById("henshinText").style.display = "none";
      document.getElementById("henshinText").classList.remove("henshin-animation");
    }, 2000);

    // Reset memories after transformation
    leftMemory = null;
    rightMemory = null;
    checkHenshinButtonVisibility();
  }

  // Play combo sound based on memory combination
  function playComboSound(left, right) {
    if (left === 'cyclone' && right === 'joker') {
      comboCycloneJoker.play();
    } else if (left === 'heat' && right === 'joker') {
      comboHeatJoker.play();
    } else if (left === 'cyclone' && right === 'metal') {
      comboCycloneMetal.play();
    } else if (left === 'cyclone' && right === 'trigger') {
      comboCycloneTrigger.play();
    } else if (left === 'fang' && right === 'joker') {
      comboFangJoker.play();
    } else if (left === 'fang' && right === 'trigger') {
      comboFangTrigger.play();
    } else if (left === 'fang' && right === 'metal') {
      comboFangMetal.play();
    } else if (left === 'heat' && right === 'metal') {
      comboHeatMetal.play();
    } else if (left === 'heat' && right === 'trigger') {
      comboHeatTrigger.play();
    } else if (left === 'luna' && right === 'metal') {
      comboLunaMetal.play();
    } else if (left === 'luna' && right === 'trigger') {
      comboLunaTrigger.play();
    } else {
      console.log("没有这个组合的音效");
    }
  }
</script>

</body>
</html>
