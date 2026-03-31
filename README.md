<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GARUDA FUTSALL ARENA — Tags</title>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700;900&family=Rajdhani:wght@600;700&display=swap" rel="stylesheet">
<style>
  *{margin:0;padding:0;box-sizing:border-box}
  body{background:#0a0a12;min-height:100vh;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:24px;padding:60px 20px;font-family:'Rajdhani',sans-serif;overflow-x:hidden}
  canvas#particles{position:fixed;top:0;left:0;width:100%;height:100%;z-index:0;pointer-events:none}

  .tags-wrap{position:relative;z-index:1;display:flex;flex-wrap:wrap;gap:14px;justify-content:center;max-width:780px}

  .tag{
    position:relative;display:inline-flex;align-items:center;gap:8px;
    padding:9px 20px;border-radius:6px;font-size:13px;font-weight:700;
    letter-spacing:1.5px;text-transform:uppercase;cursor:default;
    overflow:hidden;white-space:nowrap;
    transition:transform .2s ease,box-shadow .2s ease;
  }
  .tag:hover{transform:translateY(-4px) scale(1.06)}

  .t-red{background:#0f0006;color:#ff2952;border:1.5px solid #ff2952;box-shadow:0 0 8px #ff295488,inset 0 0 8px #ff29520d;animation:pulseRed 2.8s ease-in-out infinite}
  @keyframes pulseRed{0%,100%{box-shadow:0 0 8px #ff295488,inset 0 0 8px #ff29520d}50%{box-shadow:0 0 22px #ff2952cc,0 0 40px #ff295444,inset 0 0 14px #ff29521a}}

  .t-cyan{background:#00060f;color:#00e5ff;border:1.5px solid #00e5ff;box-shadow:0 0 8px #00e5ff88,inset 0 0 8px #00e5ff0d;animation:pulseCyan 3.1s ease-in-out infinite}
  @keyframes pulseCyan{0%,100%{box-shadow:0 0 8px #00e5ff88,inset 0 0 8px #00e5ff0d}50%{box-shadow:0 0 22px #00e5ffcc,0 0 40px #00e5ff44,inset 0 0 14px #00e5ff1a}}

  .t-green{background:#000f04;color:#39ff6e;border:1.5px solid #39ff6e;box-shadow:0 0 8px #39ff6e88,inset 0 0 8px #39ff6e0d;animation:pulseGreen 2.5s ease-in-out infinite}
  @keyframes pulseGreen{0%,100%{box-shadow:0 0 8px #39ff6e88,inset 0 0 8px #39ff6e0d}50%{box-shadow:0 0 22px #39ff6ecc,0 0 40px #39ff6e44,inset 0 0 14px #39ff6e1a}}

  .t-gold{background:#0f0a00;color:#ffd000;border:1.5px solid #ffd000;box-shadow:0 0 8px #ffd00088,inset 0 0 8px #ffd0000d;animation:pulseGold 3.4s ease-in-out infinite}
  @keyframes pulseGold{0%,100%{box-shadow:0 0 8px #ffd00088,inset 0 0 8px #ffd0000d}50%{box-shadow:0 0 22px #ffd000cc,0 0 40px #ffd00044,inset 0 0 14px #ffd0001a}}

  .t-purple{background:#07000f;color:#bf5fff;border:1.5px solid #bf5fff;box-shadow:0 0 8px #bf5fff88,inset 0 0 8px #bf5fff0d;animation:pulsePurple 2.2s ease-in-out infinite}
  @keyframes pulsePurple{0%,100%{box-shadow:0 0 8px #bf5fff88,inset 0 0 8px #bf5fff0d}50%{box-shadow:0 0 22px #bf5fffcc,0 0 40px #bf5fff44,inset 0 0 14px #bf5fff1a}}

  .t-orange{background:#0f0600;color:#ff7a00;border:1.5px solid #ff7a00;box-shadow:0 0 8px #ff7a0088,inset 0 0 8px #ff7a000d;animation:pulseOrange 3s ease-in-out infinite}
  @keyframes pulseOrange{0%,100%{box-shadow:0 0 8px #ff7a0088,inset 0 0 8px #ff7a000d}50%{box-shadow:0 0 22px #ff7a00cc,0 0 40px #ff7a0044,inset 0 0 14px #ff7a001a}}

  .tag::before{content:'';position:absolute;top:0;left:-100%;width:60%;height:100%;background:linear-gradient(90deg,transparent,rgba(255,255,255,.07),transparent);animation:sweep 3.5s linear infinite}
  @keyframes sweep{0%{left:-80%}100%{left:180%}}

  .t-title{font-family:'Orbitron',monospace;font-size:15px;letter-spacing:3px;padding:14px 32px;border-radius:4px;background:#0a0a12;border:2px solid transparent;position:relative;color:#fff;box-shadow:0 0 30px #bf5fff55,0 0 60px #ff295522;animation:titleGlow 2s ease-in-out infinite alternate}
  .t-title::after{content:'';position:absolute;inset:-2px;border-radius:6px;background:linear-gradient(135deg,#ff2952,#bf5fff,#00e5ff,#39ff6e,#ffd000,#ff2952);background-size:400% 400%;animation:borderRain 3s linear infinite;z-index:-1}
  @keyframes borderRain{0%{background-position:0% 50%}100%{background-position:400% 50%}}
  @keyframes titleGlow{from{text-shadow:0 0 10px #ffffff88}to{text-shadow:0 0 20px #ffffffbb,0 0 40px #bf5fff88}}

  .dot{display:inline-block;width:7px;height:7px;border-radius:50%;animation:blink 1.2s ease-in-out infinite}
  .dot.r{background:#ff2952;animation-delay:0s}
  .dot.g{background:#39ff6e;animation-delay:.4s}
  .dot.b{background:#00e5ff;animation-delay:.8s}
  @keyframes blink{0%,100%{opacity:.2;transform:scale(.7)}50%{opacity:1;transform:scale(1)}}

  .ico{font-size:15px;line-height:1}
  .section-lbl{font-family:'Orbitron',monospace;font-size:10px;letter-spacing:3px;color:#ffffff33;text-transform:uppercase;width:100%;text-align:center;margin-bottom:-4px}

  .scanline{position:fixed;top:0;left:0;width:100%;height:3px;background:linear-gradient(90deg,transparent,#00e5ff44,#bf5fff66,#00e5ff44,transparent);animation:scanMove 4s linear infinite;z-index:2;pointer-events:none}
  @keyframes scanMove{0%{top:-3px}100%{top:100vh}}

  .t-glitch{animation:pulseRed 2.8s ease-in-out infinite,glitch 6s steps(1) infinite}
  @keyframes glitch{0%,95%,100%{transform:none;filter:none}96%{transform:translate(-2px,1px);filter:hue-rotate(90deg)}97%{transform:translate(2px,-1px);filter:hue-rotate(-90deg)}98%{transform:none;filter:none}}

  .corner{position:fixed;width:50px;height:50px;opacity:.3;z-index:1}
  .corner.tl{top:16px;left:16px;border-top:2px solid #00e5ff;border-left:2px solid #00e5ff}
  .corner.tr{top:16px;right:16px;border-top:2px solid #ff2952;border-right:2px solid #ff2952}
  .corner.bl{bottom:16px;left:16px;border-bottom:2px solid #39ff6e;border-left:2px solid #39ff6e}
  .corner.br{bottom:16px;right:16px;border-bottom:2px solid #ffd000;border-right:2px solid #ffd000}
</style>
</head>
<body>
<canvas id="particles"></canvas>
<div class="scanline"></div>
<div class="corner tl"></div>
<div class="corner tr"></div>
<div class="corner bl"></div>
<div class="corner br"></div>

<div class="tags-wrap">
  <div class="section-lbl">— System Tags —</div>

  <div class="tag t-title" style="width:100%;justify-content:center;gap:12px">
    <div class="dot r"></div><div class="dot g"></div><div class="dot b"></div>
    <span>GARUDA FUTSALL ARENA</span>
    <div class="dot b"></div><div class="dot g"></div><div class="dot r"></div>
  </div>

  <div class="section-lbl" style="margin-top:8px">— Tech Stack —</div>
  <span class="tag t-cyan"><span class="ico">⚡</span> Laravel 13</span>
  <span class="tag t-purple"><span class="ico">🎨</span> Tailwind CSS</span>
  <span class="tag t-green"><span class="ico">🔥</span> PHP 8.3+</span>
  <span class="tag t-gold"><span class="ico">🗄</span> MySQL</span>
  <span class="tag t-orange"><span class="ico">📦</span> Node.js & NPM</span>
  <span class="tag t-red"><span class="ico">🧩</span> Composer</span>

  <div class="section-lbl" style="margin-top:8px">— Status —</div>
  <span class="tag t-green" style="animation-delay:.3s"><span class="dot g" style="width:9px;height:9px;box-shadow:0 0 6px #39ff6e"></span> Live Production</span>
  <span class="tag t-cyan"><span class="ico">🔒</span> MIT License</span>
  <span class="tag t-glitch t-red"><span class="ico">⚡</span> Build Passing</span>

  <div class="section-lbl" style="margin-top:8px">— Features —</div>
  <span class="tag t-purple"><span class="ico">📊</span> Dashboard Real-time</span>
  <span class="tag t-cyan"><span class="ico">📅</span> Manajemen Booking</span>
  <span class="tag t-green"><span class="ico">📋</span> Export CSV</span>
  <span class="tag t-gold"><span class="ico">📈</span> Laporan Performa</span>
  <span class="tag t-orange"><span class="ico">🏟</span> Indoor / Outdoor</span>
  <span class="tag t-red"><span class="ico">👥</span> Multi Admin</span>
  <span class="tag t-purple"><span class="ico">💎</span> Glassmorphism UI</span>

  <div class="section-lbl" style="margin-top:8px">— Team —</div>
  <span class="tag t-red"><span class="ico">🦅</span> Shac1x</span>
  <span class="tag t-cyan"><span class="ico">🚀</span> Firza Aditiya</span>
  <span class="tag t-gold"><span class="ico">⭐</span> Manap01</span>

  <div class="section-lbl" style="margin-top:8px">— Version —</div>
  <span class="tag t-green">v1.0.0</span>
  <span class="tag t-purple"><span class="ico">⚙</span> Stable</span>
  <span class="tag t-cyan"><span class="ico">🌐</span> Web App</span>
</div>

<script>
const canvas=document.getElementById('particles'),ctx=canvas.getContext('2d');
let W,H,pts=[];
const colors=['#ff2952','#00e5ff','#39ff6e','#ffd000','#bf5fff','#ff7a00'];
function resize(){W=canvas.width=window.innerWidth;H=canvas.height=window.innerHeight}
resize();window.addEventListener('resize',resize);
for(let i=0;i<80;i++)pts.push({
  x:Math.random()*W,y:Math.random()*H,
  vx:(Math.random()-.5)*.4,vy:(Math.random()-.5)*.4,
  r:Math.random()*1.6+.4,
  c:colors[Math.floor(Math.random()*colors.length)],
  alpha:Math.random()*.6+.2
});
function draw(){
  ctx.clearRect(0,0,W,H);
  pts.forEach(p=>{
    p.x+=p.vx;p.y+=p.vy;
    if(p.x<0)p.x=W;if(p.x>W)p.x=0;
    if(p.y<0)p.y=H;if(p.y>H)p.y=0;
    ctx.beginPath();ctx.arc(p.x,p.y,p.r,0,Math.PI*2);
    ctx.fillStyle=p.c;ctx.globalAlpha=p.alpha;ctx.fill();ctx.globalAlpha=1;
  });
  pts.forEach((a,i)=>{
    pts.slice(i+1).forEach(b=>{
      const d=Math.hypot(a.x-b.x,a.y-b.y);
      if(d<100){
        ctx.beginPath();ctx.moveTo(a.x,a.y);ctx.lineTo(b.x,b.y);
        ctx.strokeStyle=a.c;ctx.globalAlpha=(1-d/100)*.15;
        ctx.lineWidth=.5;ctx.stroke();ctx.globalAlpha=1;
      }
    });
  });
  requestAnimationFrame(draw);
}
draw();
</script>
</body>
</html>
