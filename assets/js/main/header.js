//Menu
const btnMenu = document.querySelector(".menu-hamburger");

function menuAtivo() {
  const navHeader = document.querySelector(".menu-header");
  const Header = document.querySelector(".secao-header");

  Header.classList.toggle("menu-ativo");
}
btnMenu.addEventListener("click", menuAtivo);
