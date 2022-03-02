//Menu
const btnMenu = document.querySelector(".menu-hamburger span");

function menuAtivo() {
  const navHeader = document.querySelector(".nav-menu-header");
  const Header = document.querySelector(".secao-header");

  navHeader.classList.toggle("menu-hamburger-ativo");
  Header.classList.toggle("header-hamburger-ativo");
}
btnMenu.addEventListener("click", menuAtivo);