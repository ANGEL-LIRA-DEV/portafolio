<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Skills</title>

<link rel="icon" type="image/png" href="img/briefcase.png">
<link rel="stylesheet" href="style/styles.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<script>
if(localStorage.getItem("mode")==="light"){
  document.body?.classList.add("light");
}
</script>

</head>

<body>

<header>
  <h1>Portafolio</h1>

  <nav>
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="skills.php">Skills</a>
  </nav>

  <div class="header-right">
    <span class="toggle" id="themeToggle">
      <i class="fa-solid fa-moon"></i>
    </span>

    <a href="docs/CV.pdf" download class="btn btn-cv">
      Descargar CV
    </a>

    <span class="menu-btn" id="menuBtn">
      <i class="fa-solid fa-bars"></i>
    </span>
  </div>
</header>

<div class="sidebar" id="sidebar">
  <a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="skills.php">Skills</a>
</div>

<div class="overlay" id="overlay"></div>

<section class="skills-section">

  <div class="skills-layout">

    <div class="skills-grid" id="skillsGrid"></div>

    <div class="skill-display">
      <h2 id="skillTitle">Skills</h2>
      <p id="skillDesc">Selecciona una tecnología para ver más detalles.</p>

      <a href="index.php" class="back-link">← Volver al inicio</a>
    </div>

  </div>

</section>

<script>

const skillsData = [
  { name:"PHP", img:"logos/php.png", desc:"Backend sólido, APIs, sesiones y lógica del servidor." },
  { name:"JavaScript", img:"logos/js.png", desc:"Interactividad, manipulación del DOM y UX dinámica." },
  { name:"HTML", img:"logos/html.png", desc:"Estructura semántica clara y optimizada." },
  { name:"CSS", img:"logos/css.png", desc:"Diseño moderno, responsive y experiencia visual." },
  { name:"C#", img:"logos/csharp.png", desc:"Desarrollo de lógica empresarial y aplicaciones robustas." },
  { name:"SAP", img:"logos/sap.png", desc:"Automatización de procesos y gestión empresarial." },
  { name:"Python", img:"logos/python.png", desc:"Automatización de procesos y gestión empresarial." },
  { name:"Power automate", img:"logos/power.png", desc:"Automatización de procesos y gestión empresarial." },
  { name:"Make", img:"logos/make.png", desc:"Automatización de procesos y gestión empresarial." },
  { name:"Linux", img:"logos/linux.png", desc:"Automatización de procesos y gestión empresarial." },
  { name:"AWS", img:"logos/aws.png", desc:"Automatización de procesos y gestión empresarial." },
  { name:"Java", img:"logos/java.png", desc:"Automatización de procesos y gestión empresarial." }
];

const grid = document.getElementById("skillsGrid");
const title = document.getElementById("skillTitle");
const desc = document.getElementById("skillDesc");

skillsData.forEach((s,i)=>{
  const el = document.createElement("div");
  el.className = "skill-card";
  el.style.animationDelay = `${i * 0.12}s`;

  el.innerHTML = `
    <div class="skill-inner">
      <img src="${s.img}" alt="${s.name}">
    </div>
  `;

  el.addEventListener("click", ()=>{
    title.textContent = s.name;
    desc.textContent = s.desc;
  });

  grid.appendChild(el);
});

/* THEME */

const icon = document.querySelector('.toggle i');

if(localStorage.getItem("mode") === "light"){
  document.body.classList.add("light");
  icon.classList.replace('fa-moon','fa-sun');
}

document.getElementById("themeToggle").addEventListener("click", ()=>{
  document.body.classList.toggle('light');
  const isLight = document.body.classList.contains('light');

  icon.classList.toggle('fa-sun', isLight);
  icon.classList.toggle('fa-moon', !isLight);

  localStorage.setItem("mode", isLight ? "light" : "dark");
});

/* SIDEBAR */

const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');

document.getElementById("menuBtn").onclick = ()=>{
  sidebar.classList.add('active');
  overlay.classList.add('active');
};

overlay.onclick = ()=>{
  sidebar.classList.remove('active');
  overlay.classList.remove('active');
};

document.addEventListener('keydown',e=>{
  if(e.key==="Escape"){
    sidebar.classList.remove('active');
    overlay.classList.remove('active');
  }
});

</script>

</body>
</html>