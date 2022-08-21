const menu = document.getElementById("menu");
const ham = document.getElementById("hamburger");

ham.addEventListener('click', () => {
  menu.classList.toggle("active");
  ham.classList.toggle("active");
});