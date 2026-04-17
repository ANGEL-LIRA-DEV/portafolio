<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Proyecto Video</title>

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

<section class="project-clean-split">

  <!-- IZQUIERDA: VIDEO -->
  <div class="project-media">

    <video id="projectVideo" muted loop playsinline preload="metadata">
      <source src="video/video_iglesia.mp4" type="video/mp4">
      Tu navegador no soporta video HTML5.
    </video>

    <div class="video-overlay" id="videoOverlay">
      <i class="fa-solid fa-circle-play"></i>
    </div>

  </div>

  <!-- DERECHA -->
  <div class="project-info">

    <h1>Sitio Web Iglesia</h1>

    <p>
      Un sitio web capaz de llenar plantillas de WORD y PDF automáticamente para facilitar la gestión de documentos y usuarios.
    </p>

    <ul class="tech-list">
      <li><strong>PHP:</strong> Backend y lógica de negocio.</li>
      <li><strong>JavaScript:</strong> Animaciones.</li>
      <li><strong>HTML & CSS:</strong> UI responsiva e intuitiva.</li>
    </ul>

    <a href="index.php" class="back-link">← Volver al inicio</a>

  </div>

</section>

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

/* VIDEO CONTROL */
const video = document.getElementById("projectVideo");
const overlayBtn = document.getElementById("videoOverlay");

let isPlaying = false;

overlayBtn.addEventListener("click", ()=>{
  if(video.paused){
    video.play();
    overlayBtn.style.opacity = "0";
    isPlaying = true;
  } else {
    video.pause();
    overlayBtn.style.opacity = "1";
    isPlaying = false;
  }
});

video.addEventListener("click", ()=>{
  if(video.paused){
    video.play();
    overlayBtn.style.opacity = "0";
  } else {
    video.pause();
    overlayBtn.style.opacity = "1";
  }
});

</script>

</body>
</html>