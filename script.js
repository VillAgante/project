document.addEventListener('DOMContentLoaded', function() {
  const menuIcon = document.querySelector('.bx-menu');
  const navLinks = document.querySelector('.nav-links');

  menuIcon.addEventListener('click', function() {
      navLinks.classList.toggle('active');
  });

  const arrows = document.querySelectorAll('.arrow');
  arrows.forEach(arrow => {
      arrow.addEventListener('click', function() {
          const subMenu = this.nextElementSibling;
          subMenu.classList.toggle('show');
      });
  });
});