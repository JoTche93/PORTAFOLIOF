const form = document.getElementById("contactForm");
const successMsg = document.getElementById("successMsg");
const darkModeBtn = document.getElementById("toggleDarkMode");

// Validación del formulario
form.addEventListener("submit", function (e) {
  e.preventDefault();

  const nombre = document.getElementById("nombre").value.trim();
  const email = document.getElementById("email").value.trim();
  const mensaje = document.getElementById("mensaje").value.trim();
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (nombre === "" || email === "" || mensaje === "") {
    successMsg.textContent = "Por favor, completa todos los campos.";
    successMsg.style.color = "red";
    successMsg.classList.add("visible");
    return;
  }

  if (!emailRegex.test(email)) {
    successMsg.textContent = "Correo electrónico no válido.";
    successMsg.style.color = "red";
    successMsg.classList.add("visible");
    return;
  }

  // Éxito
  successMsg.textContent = "¡Mensaje enviado exitosamente!";
  successMsg.style.color = "green";
  successMsg.classList.add("visible");
  form.reset();
});

// Scroll suave
document.querySelectorAll('a[href^="#"]').forEach(link => {
  link.addEventListener("click", e => {
    e.preventDefault();
    document.querySelector(link.getAttribute("href")).scrollIntoView({
      behavior: "smooth"
    });
  });
});

// Modo oscuro con cambio de ícono
darkModeBtn.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");
  const isDark = document.body.classList.contains("dark-mode");
  darkModeBtn.textContent = isDark ? "☀️" : "🌙";
});
