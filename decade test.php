<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kamen Rider Decade</title>
</head>

<body>

<h2>假面骑士 Decade 变身器</h2>

<button onclick="insertCard()">插入 Decade 卡</button>
<button onclick="henshin()" id="henshinBtn" disabled>HENSHIN</button>
<button onclick="attackRide()" id="attackBtn" disabled>Attack Ride</button>

<!-- 音效 -->
<audio id="cardAudio" src="kamenride.mp3"></audio>
<audio id="henshinAudio" src="decade_1.mp3"></audio>
<audio id="attackAudio" src="final attack rider.mp3"></audio>

<script>
let cardInserted = false;
let transformed = false;

function insertCard() {
  if (cardInserted) return;

  document.getElementById("cardAudio").play();
  cardInserted = true;
  document.getElementById("henshinBtn").disabled = false;
}

function henshin() {
  if (!cardInserted || transformed) return;

  document.getElementById("henshinAudio").play();
  transformed = true;
  document.getElementById("attackBtn").disabled = false;
}

function attackRide() {
  if (!transformed) return;

  document.getElementById("attackAudio").play();

  // 重置状态（模拟变身结束）
  setTimeout(() => {
    cardInserted = false;
    transformed = false;
    document.getElementById("henshinBtn").disabled = true;
    document.getElementById("attackBtn").disabled = true;
  }, 3000);
}
</script>

</body>
</html>