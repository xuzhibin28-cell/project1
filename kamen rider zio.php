<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Zi-O Driver - Armor & Grand ArmorTime</title>
<style>
body { background:#0b0b0b; color:white; font-family:Arial; text-align:center; }
h1 { color:gold; }
.row { margin:20px 0; }
button { padding:8px 16px; margin:4px; font-size:14px; border:none; border-radius:6px; cursor:pointer; }
.henshin { background:crimson; color:white; }
button:disabled { background:gray; cursor:not-allowed; }
.container{
  display: grid;
  grid-template-columns: auto auto;
}
</style>
</head>
<body>

<h1>Zi-O Driver - Armor & Grand ArmorTime</h1>

<!-- Zi-O RideWatch -->
<div class="row">
  <p>Zi-O RideWatch</p>
  <img src="zio.jpg" id="zioWatch" 
       data-insert-audio="zio watch.mp3" 
       data-standby-audio="standby.mp3"
       data-henshin-audio="henshin zio.mp3"height="200" width="150">
</div>

<div class="rlow">
  <button class="henshin" id="henshinBtn" disabled>HENSHIN</button>
</div>

<!-- Armor & Grand RideWatch -->
<div class="container">
  <div>
    <img src="build1.jpeg" data-name="Build Armor" data-insert-audio="build.mp3"  data-standby-audio="standby.mp3"data-henshin-audio="amor build.mp3" class="armorWatch"height="200" width="150">
  </div>
  <div>
    <img src="decade.jpg" data-name="Decade Armor" data-insert-audio="decade watch.mp3" data-henshin-audio="decade 2.mp3" class="armorWatch" data-standby-audio="standby.mp3"height="200" width="150">
  </div>
  <div>
    <img src="exaid_watch.png" data-name="Ex-Aid Armor" data-insert-audio="armor_exaid_insert.mp3" data-henshin-audio="armor_exaid_henshin.mp3" class="armorWatch"height="200" width="150">
  </div>
  <div>
    <img src="ghost.jpeg" data-name="Ghost Armor" data-insert-audio="ghost standby.mp3" data-henshin-audio="amor ghost.mp3" class="armorWatch"height="200" width="150" data-standby-audio="standby.mp3">
  </div>
   <div>
    <img src="grand zio.jpeg" data-name="Grand Armor" data-insert-audio="grand_zio.mp3"  data-standby-audio="grand zio standby.mp3"data-henshin-audio="zio3.mp3" class="armorWatch" height="200" width="150">
  </div>
</div>

<script>
// ---------------- 状态 ----------------
let zioInserted = false;
let firstHenshinDone = false;
let insertedWatch = null;
let insertedHenshinAudio = null;
let standbyAudio = null;

// 元素
const zioWatch = document.getElementById("zioWatch");
const henshinBtn = document.getElementById("henshinBtn");

// ---------------- 播放插入音效 → 待机音效 ----------------
function playInsertThenStandby(insertSrc, standbySrc) {
  if (standbyAudio) standbyAudio.pause(); // 停掉旧待机音效
  const insertAudio = new Audio(insertSrc);
  insertAudio.currentTime = 0;
  insertAudio.play();

  insertAudio.onended = () => {
    if (standbySrc) {
      standbyAudio = new Audio(standbySrc);
      standbyAudio.loop = true;
      standbyAudio.currentTime = 0;
      standbyAudio.play();
    }
  };
}

// ---------------- Zi-O RideWatch 插入 ----------------
zioWatch.onclick = () => {
  if (zioInserted) return;
  zioInserted = true;
  henshinBtn.disabled = false;

  const insertSrc = zioWatch.dataset.insertAudio;
  const standbySrc = zioWatch.dataset.standbyAudio;

  playInsertThenStandby(insertSrc, standbySrc);

  document.querySelectorAll(".armorWatch").forEach(img => img.style.cursor = "pointer");
  alert("Zi-O RideWatch 插入完成，可以自由插入 Armor / Grand！");
};

// ---------------- Armor / Grand RideWatch 插入 ----------------
document.querySelectorAll(".armorWatch").forEach(img => {
  img.onclick = () => {
    if (!zioInserted) return;
    const insertSrc = img.dataset.insertAudio;
    const henshinSrc = img.dataset.henshinAudio;
    const standbySrc = img.dataset.standbyAudio || "zio_standby.mp3";
    const name = img.dataset.name;

    insertedWatch = name;
    insertedHenshinAudio = new Audio(henshinSrc);

    playInsertThenStandby(insertSrc, standbySrc);
    alert(`${name} 已插入，可以 HENSHIN！`);
  };
});

// ---------------- HENSHIN 按钮 ----------------
henshinBtn.onclick = () => {
  if (!zioInserted) return;

  if (!firstHenshinDone) {
    firstHenshinDone = true;
    if (standbyAudio) standbyAudio.pause();

    const henshinSrc = zioWatch.dataset.henshinAudio || "zio_henshin.mp3";
    const zioHenshin = new Audio(henshinSrc);
    zioHenshin.currentTime = 0;
    zioHenshin.play();

    alert("HENSHIN 完成，普通 Zi-O！");
  } else if (insertedWatch && insertedHenshinAudio) {
    if (standbyAudio) standbyAudio.pause();
    insertedHenshinAudio.currentTime = 0;
    insertedHenshinAudio.play();

    alert(`HENSHIN 完成，${insertedWatch}！`);
    insertedWatch = null;
    insertedHenshinAudio = null;
    standbyAudio = null;
  } else {
    alert("请先插入 Armor / Grand 再 HENSHIN！");
  }
};
</script>

</body>
</html>