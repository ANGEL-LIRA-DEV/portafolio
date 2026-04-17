<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Proyecto</title>

<link rel="icon" type="image/png" href="img/briefcase.png">
<link rel="stylesheet" href="style/styles.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<script>
if(localStorage.getItem("mode")==="light"){
  document.documentElement.classList.add("light");
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

<section class="project-clean-split mobile-project">

  <div class="project-carousel" id="carousel">
    <div class="carousel-track" id="track">
      <img src="img/pantallaProveedores2.jpg">
      <img src="img/pantallaEvaluar.jpg">
      <img src="img/pantallaBimestre5.jpg">
      <img src="img/pantallaBimestre6.jpg">
      <img src="img/pantallaHistorico.jpg">
    </div>

    <div class="zoom-btn" id="zoomBtn">
      <i class="fa-solid fa-magnifying-glass"></i>
    </div>
  </div>

  <div class="project-info">

    <h1>Aplicación móvil</h1>

    <p>
      Sistema que automatiza la generación de documentos PDF a partir de datos dinámicos,
      optimizando procesos administrativos y reduciendo errores humanos.
    </p>

    <ul class="tech-list">
      <li><strong>C#:</strong> Uso de un framework para crear la lógica.</li>
      <li><strong>Flujos automáticos:</strong> Automatización de procesos como envío de correos y generación de archivos.</li>
    </ul>

    <a href="index.php" class="back-link">← Volver al inicio</a>

  </div>

</section>

<div class="lightbox" id="lightbox">
  <img id="lightboxImg">
</div>

<script>

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

/* CARRUSEL */
const track = document.getElementById("track");
let index = 0;
const total = track.children.length;

function nextSlide(){
  index = (index + 1) % total;
  track.style.transform = `translateX(-${index * 100}%)`;
}

let interval = setInterval(nextSlide, 2200);

const carousel = document.getElementById("carousel");

carousel.addEventListener("click", nextSlide);
carousel.addEventListener("mouseenter", ()=> clearInterval(interval));
carousel.addEventListener("mouseleave", ()=>{
  interval = setInterval(nextSlide, 2200);
});

/* LIGHTBOX */
const zoomBtn = document.getElementById("zoomBtn");
const lightbox = document.getElementById("lightbox");
const lightboxImg = document.getElementById("lightboxImg");

zoomBtn.addEventListener("click", (e)=>{
  e.stopPropagation();
  const currentImg = track.children[index];
  lightboxImg.src = currentImg.src;
  lightbox.classList.add("active");
});

lightbox.addEventListener("click", ()=>{
  lightbox.classList.remove("active");
});

</script>

</body>
</html>