document.addEventListener("DOMContentLoaded", function() {
    const menuContainer = document.getElementById("menu-container");

    // Cargar el contenido del menú hamburguesa desde 'menu.html'
    fetch("menu/menu.html")
        .then(response => response.text())
        .then(data => {
            // Insertar el menú en el contenedor
            menuContainer.innerHTML = data;

            // Configurar el comportamiento del menú hamburguesa
            const menuToggle = document.getElementById("menu-toggle");
            const navbar = document.getElementById("sidenav");

            menuToggle.addEventListener("click", function() {
                const isMenuOpen = navbar.style.display === "block";
                if (isMenuOpen) {
                    navbar.style.display = "none"; // Ocultar el menú
                    menuToggle.classList.remove("open"); // Quitar la clase 'open'
                } else {
                    navbar.style.display = "block"; // Mostrar el menú
                    menuToggle.classList.add("open"); // Agregar la clase 'open'
                }
            });

            document.addEventListener("click", function(event) {
                const clickedInside = menuToggle.contains(event.target) || navbar.contains(event.target);

                if (!clickedInside) {
                    navbar.style.display = "none"; // Ocultar el menú
                    menuToggle.classList.remove("open"); // Quitar la clase 'open'
                }
            });
        })
        .catch(error => console.error("Error al cargar el menú:", error));
});