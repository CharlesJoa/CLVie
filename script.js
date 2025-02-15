// Script pour gérer l'affichage des sous-menus au clic
document.querySelectorAll('.has-submenu > a').forEach(function(menuLink) {
  menuLink.addEventListener('click', function(e) {
    var submenu = this.nextElementSibling; // Sous-menu suivant le lien
    if (submenu.style.display === 'block') {
      submenu.style.display = 'none';
    } else {
      submenu.style.display = 'block';
    }
    e.preventDefault(); // Empêche l'ouverture du lien
  });
});