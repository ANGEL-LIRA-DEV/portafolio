<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Portafolio</title>

<link rel="icon" type="image/png" href="img/briefcase.png">
<link rel="stylesheet" type="text/css" href="style/styles.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<script>
/* FIX: aplicar modo correctamente */
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

<section class="hero">
  <div class="hero-img">
    <img src="img/miFoto.png" alt="Foto de Ángel Lira">
  </div>

  <div class="hero-text">
    <h2>Hola, soy</h2>
    <h1>Ángel Lira</h1>
    <h2 class="role">Software Developer</h2>

    <p>Me apasiona el desarrollo web y la administración de sistemas basados en Linux</p>

    <div class="buttons">
      <a href="https://wa.me/5212413397525?text=Hola%20tengo%20una%20idea%20de%20proyecto" target="_blank" class="btn contact">
  Contáctame
</a>

      <a href="https://www.linkedin.com/in/%C3%A1ngel-lira-hern%C3%A1ndez-17b636308/" class="btn linkedin">
        <i class="fa-brands fa-linkedin"></i>
        LinkedIn
      </a>
    </div>
  </div>
</section>

<section class="stats">
  <div class="stat"><h2><span class="counter" data-target="2">0</span>+</h2><p>Años de experiencia</p></div>
  <div class="stat"><h2><span class="counter" data-target="4">0</span>+</h2><p>Proyectos</p></div>
  <div class="stat"><h2><span class="counter" data-target="11">0</span>+</h2><p>Tecnologías</p></div>
  <div class="stat"><h2><span class="counter" data-target="4">0</span>+</h2><p>Clientes</p></div>
</section>

<section class="proyectos-section">
  <h2 class="proyectos-titulo">Mis Proyectos</h2>
  <div class="proyectos-grid" id="projects"></div>
</section>

<script defer>

/* ===================== CONFIG ===================== */

const techColors = {
  'Flujos automáticos': "#bfdbfe",
  Make: "#fbcfe8",
  Python: "#fef08a",
  AWS: "#fde68a",
  HTML: "#fed7aa",
  CSS: "#bbf7d0",
  JS: "#e9d5ff",
  PHP: "#ddd6fe",
  'C#': "#a7f3d0",
  SAP: "#e5e7eb"
};

const data = [
{
  url:"sitioIglesia.php",
  title:"Sitio web iglesia",
  subtitle:"Sitio web",
  desc:"Llenado automático de archivos PDF",
  img:"img/sitioIglesia2.png",
  tech:["PHP", "HTML", "CSS", "JS"]
},
{
  url:"sitioOrdenes.php",
  title:"Sitio web órdenes",
  subtitle:"Gestión de órdenes",
  desc:"Generación y filtrado de órdenes",
  img:"img/sistemaOrdenes.png",
  tech:["PHP", "HTML", "CSS", "JS"]
},
{
  url:"appOrdenes.php",
  title:"Catálogo online",
  subtitle:"Gestión de solicitudes",
  desc:"Automatización de solicitudes de material",
  img:"img/inicio.png",
  tech:["SAP", "C#", "Flujos automáticos"]
},
{
  url:"appMovil.php",
  title:"Aplicación de evaluación",
  subtitle:"App móvil",
  desc:"App para evaluar proveedores de AUDI México",
  img:"img/appMovil.png",
  tech:["C#", "Flujos automáticos"]
}
];

/* ===================== DOM ===================== */

const container = document.getElementById("projects");
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
const menuBtn = document.getElementById('menuBtn');
const themeToggle = document.getElementById('themeToggle');
const icon = themeToggle.querySelector('i');

/* ===================== RENDER PROYECTOS ===================== */

data.forEach(p=>{
  const el=document.createElement("div");
  el.className="proyecto-card";
  el.setAttribute("tabindex","0");
  el.setAttribute("role","button");

  const go = () => window.location.href = p.url;

  el.addEventListener("click", go);
  el.addEventListener("keydown", e=>{
    if(e.key==="Enter" || e.key===" ") go();
  });

  el.innerHTML=`
    <img src="${p.img}" alt="${p.title}">
    <div class="proyecto-info">
      <h3>${p.title}</h3>
      <h4>${p.subtitle}</h4>
      <p>${p.desc}</p>
      <div class="tecnologias">
        ${p.tech.map(t=>`<span class="tag" style="background:${techColors[t] || '#ddd'};color:#000">${t}</span>`).join("")}
      </div>
    </div>
  `;

  container.appendChild(el);
});

/* ===================== ANIMACIÓN CARDS ===================== */

const observer=new IntersectionObserver(entries=>{
  entries.forEach(entry=>{
    if(entry.isIntersecting){
      entry.target.classList.add('show');
      observer.unobserve(entry.target);
    }
  });
},{threshold:0.2});

document.querySelectorAll('.proyecto-card').forEach(el=>observer.observe(el));

/* ===================== CONTADORES ===================== */

const counters=document.querySelectorAll('.counter');

const counterObserver=new IntersectionObserver(entries=>{
  entries.forEach(entry=>{
    if(entry.isIntersecting){
      const counter=entry.target;
      const target=+counter.dataset.target;
      const duration=2000;
      const step=target/(duration/16);

      const update=()=>{
        const count=+counter.innerText;
        if(count<target){
          counter.innerText=Math.ceil(count+step);
          requestAnimationFrame(update);
        } else {
          counter.innerText=target;
        }
      };

      update();
      counterObserver.unobserve(counter);
    }
  });
});

counters.forEach(c=>counterObserver.observe(c));

/* ===================== SIDEBAR ===================== */

function openMenu(){
  sidebar.classList.add('active');
  overlay.classList.add('active');
  document.body.style.overflow='hidden';
}

function closeMenu(){
  sidebar.classList.remove('active');
  overlay.classList.remove('active');
  document.body.style.overflow='';
}

menuBtn.addEventListener("click", openMenu);
overlay.addEventListener("click", closeMenu);

document.addEventListener('keydown',e=>{
  if(e.key==="Escape") closeMenu();
});

/* ===================== THEME ===================== */

if(localStorage.getItem("mode") === "light"){
  document.body.classList.add("light");
  icon.classList.replace('fa-moon','fa-sun');
}

themeToggle.addEventListener("click", ()=>{
  document.body.classList.toggle('light');
  const isLight = document.body.classList.contains('light');

  icon.classList.toggle('fa-sun', isLight);
  icon.classList.toggle('fa-moon', !isLight);

  localStorage.setItem("mode", isLight ? "light" : "dark");
});

</script>

</body>
</html>