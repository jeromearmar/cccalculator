<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>JG Speed Works - CC Calculator</title>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

<style>
:root{
  --tosca:#14b8a6;
  --tosca-light:#2dd4bf;
  --dark:#020617;
  --card:#1e293b;
  --card-hover:#334155;
}
*{margin:0;padding:0;box-sizing:border-box;font-family:'Roboto', sans-serif;}
body{background:url('images/banner.jpg') center/cover no-repeat fixed;color:#fff;}
header{background:rgba(2,6,23,0.7);padding:15px 5%;display:flex;justify-content:space-between;align-items:center;position:sticky;top:0;border-bottom:1px solid rgba(20,184,166,0.2);}
.logo{font-size:22px;font-weight:bold;color:var(--tosca);}
nav{display:flex;}
nav a{color:#fff;margin-left:20px;text-decoration:none;font-size:15px;}
.menu-btn{display:none;font-size:22px;cursor:pointer;color:var(--tosca);}
.section{padding:50px 5%;background: rgba(2,6,23,0.6);margin:40px auto;border-radius:12px;max-width:600px;}
.section-title{font-size:24px;margin-bottom:20px;border-left:4px solid var(--tosca);padding-left:10px;}
.card{background:var(--card);padding:20px;border-radius:12px;box-shadow:0 5px 15px rgba(0,0,0,0.4);border:1px solid rgba(20,184,166,0.1);transition:.3s;}
.card:hover{background:var(--card-hover);border-color:var(--tosca);}
label{display:block;margin-top:10px;font-size:14px;}
input, select{width:100%;padding:12px;margin-top:5px;border:none;border-radius:8px;background:#0f172a;color:#fff;}
button{width:100%;margin-top:15px;padding:12px;border:none;border-radius:8px;background:var(--tosca);color:#021312;font-weight:bold;cursor:pointer;transition:.3s;}
button:hover{background:var(--tosca-light);}
.result{margin-top:15px;text-align:center;font-size:20px;color:var(--tosca-light);}
footer{text-align:center;margin:30px;color:#94a3b8;}
@media(max-width:768px){nav{display:none;flex-direction:column;background: rgba(2,6,23,0.9);position:absolute;top:60px;right:0;width:200px;padding:15px;}nav.show{display:flex;}nav a{margin:10px 0;}.menu-btn{display:block;}}
</style>
</head>
<body>

<header>
  <div class="logo">🏍 JG Speed Works</div>
  <div class="menu-btn" onclick="toggleMenu()">☰</div>
  <nav id="menu">
    <a href="index.html">Home</a>
    <a href="cc.php">Engine Calculator</a>
    <a href="gallery.html">Gallery</a>
    <a href="about.html">About</a>
    <a href="inquiry.php">Inquiry</a>
  </nav>
</header>

<section class="section">
  <h2 class="section-title">Engine CC Calculator</h2>
  <div class="card">

    <label>Bore (mm)</label>
    <input type="number" id="bore" placeholder="e.g. 59">

    <label>Stroke (mm)</label>
    <select id="stroke">
      <option value="">Select Motorcycle</option>
      <option value="58.7">Yamaha Mio / Aerox - 58.7 mm</option>
      <option value="57.9">Honda Click 125 - 57.9 mm</option>
      <option value="63.0">Honda Click 150 - 63.0 mm</option>
      <option value="58.7">Yamaha NMAX - 58.7 mm</option>
      <option value="57.9">Honda Beat - 57.9 mm</option>
      <option value="62.1">Honda PCX 160 - 62.1 mm</option>
      <option value="60.0">Suzuki Raider 150 - 60.0 mm</option>
      <option value="58.6">Kawasaki Barako 175 - 58.6 mm</option>
      <option value="custom">Custom Input</option>
    </select>

    <input type="number" id="strokeCustom" placeholder="Custom Stroke (mm)" style="display:none;">

    <label>Crank Pin Offset (mm)</label>
    <input type="number" id="offset" placeholder="e.g. 3" value="0">

    <label>Cylinders</label>
    <input type="number" id="cyl" value="1">

    <button onclick="calculate()">Calculate</button>

    <div class="result" id="result">Result: ---</div>

  </div>
</section>

<footer>© 2026 JG Speed Works</footer>

<script>
// Hamburger menu
function toggleMenu(){document.getElementById("menu").classList.toggle("show");}

// Show/hide custom stroke input
document.getElementById('stroke').addEventListener('change', function(){
  if(this.value === 'custom'){
    document.getElementById('strokeCustom').style.display = 'block';
  } else {
    document.getElementById('strokeCustom').style.display = 'none';
  }
});

// Calculate CC
function calculate(){
  let b = parseFloat(document.getElementById('bore').value);
  let c = parseInt(document.getElementById('cyl').value);
  let strokeSelect = document.getElementById('stroke').value.trim();
  let s;
  if(strokeSelect === "custom"){
    s = parseFloat(document.getElementById('strokeCustom').value);
  } else {
    s = parseFloat(strokeSelect);
  }

  let offset = parseFloat(document.getElementById('offset').value) || 0;
  let effectiveStroke = s + offset * 2;

  if(!b || !effectiveStroke || !c || isNaN(b) || isNaN(effectiveStroke) || isNaN(c)){
    document.getElementById('result').innerHTML = "⚠️ Complete all fields with valid numbers";
    return;
  }

  let cc = (Math.PI/4) * b * b * effectiveStroke * c / 1000;
  document.getElementById('result').innerHTML = "Result: " + cc.toFixed(2) + " cc";
}
</script>

</body>