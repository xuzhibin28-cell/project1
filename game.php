<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>6v6 回合制 - 已选角色布阵</title>
<style>
body{ background:black; color:white; font-family:Arial; text-align:center; }
.character, .position-slot{ width:90px; height:90px; border:2px solid white; display:flex; align-items:center; justify-content:center; cursor:pointer; margin:2px; position:relative; }
.character img{ width:80px; height:80px; object-fit:cover; }
.position-slot.occupied{ border-color:yellow; }
.front{ border-color:red; }
.back{ border-color:blue; }
.dead{ opacity:0.3; filter:grayscale(100%); pointer-events:none; }
.position-grid{ display:grid; grid-template-columns:90px 90px; gap:10px; justify-content:center; margin-bottom:15px; }
button{ margin:5px; padding:6px 12px; }
</style>
</head>
<body>
<h1>已选角色布阵 - 拖放交换位置</h1>

<div id="positionSelect">
  <h2>布阵：左列后前</h2>
  <div class="position-grid" id="playerPositions">
    <div class="position-slot" data-pos="back1"></div>
    <div class="position-slot" data-pos="front1"></div>
    <div class="position-slot" data-pos="back2"></div>
    <div class="position-slot" data-pos="front2"></div>
    <div class="position-slot" data-pos="back3"></div>
    <div class="position-slot" data-pos="front3"></div>
  </div>
  <button id="confirmPositionsBtn">确认阵型开始战斗</button>
</div>

<div class="battlefield" style="display:none;">
  <h2>战斗阵容</h2>
  <div class="team" id="playerTeamDiv"></div>
</div>

<script>
// --- 已选择角色 ---
const selectedCards=[
  {name:"铁卫",hp:140,img:"https://i.imgur.com/8QfQFQH.png"},
  {name:"射手",hp:80,img:"https://i.imgur.com/8QfQFQH.png"},
  {name:"医生",hp:90,img:"https://i.imgur.com/8QfQFQH.png"},
  {name:"战士",hp:100,img:"https://i.imgur.com/8QfQFQH.png"},
  {name:"刺客",hp:50,img:"https://i.imgur.com/8QfQFQH.png"},
  {name:"法师",hp:20,img:"https://i.imgur.com/8QfQFQH.png"}
];

let draggedCharacter = null;

// --- 渲染布阵阶段 ---
const slots = document.querySelectorAll('.position-slot');
selectedCards.forEach((card,i)=>{
  const slot = slots[i];
  slot.innerHTML = `<div class="character" draggable="true"><img src="${card.img}"><div>${card.name}</div></div>`;
  slot.classList.add('occupied');
  slot.dataset.index = i;
});

// 拖放交换位置
slots.forEach(slot=>{
  slot.ondragover = e=>e.preventDefault();
  slot.ondrop = e=>{
    if(draggedCharacter){
      const sourceSlot = draggedCharacter.parentElement;
      const targetSlot = slot;

      // 交换内容和索引
      const tempHTML = targetSlot.innerHTML;
      const tempIndex = targetSlot.dataset.index;

      targetSlot.innerHTML = draggedCharacter.outerHTML;
      targetSlot.dataset.index = draggedCharacter.dataset.index;

      sourceSlot.innerHTML = tempHTML;
      sourceSlot.dataset.index = tempIndex;

      addDragListeners(); // 更新事件
      draggedCharacter = null;
    }
  };
});

// 添加拖拽事件
function addDragListeners(){
  const chars = document.querySelectorAll('.character');
  chars.forEach(c=>{
    c.draggable = true;
    c.ondragstart = e=>{ draggedCharacter = c; c.dataset.index = [...slots].findIndex(s=>s.contains(c)); }
  });
}
addDragListeners();

// 确认开始战斗
document.getElementById('confirmPositionsBtn').onclick=function(){
  const playerTeamDiv = document.getElementById('playerTeamDiv');
  playerTeamDiv.innerHTML = '';
  slots.forEach(slot=>{
    if(slot.dataset.index!==undefined){
      playerTeamDiv.innerHTML += slot.innerHTML;
    }
  });
  document.getElementById('positionSelect').style.display='none';
  document.querySelector('.battlefield').style.display='block';
};
</script>
</body>
</html>