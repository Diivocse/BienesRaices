document.addEventListener('DOMContentLoaded', function () {
    eventListeners();

    darkMode();
});

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);
}


function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar')
}

function darkMode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-schema: dark)');
    /* console.log(prefiereDarkMode.matches); devuelve verdadero */

    if(prefiereDarkMode.matches){
        document.body.classList.remove('dark-mode')
    } else {
        document.body.classList.add('dark-mode')
    }

    prefiereDarkMode.addEventListener('change', function(){
        if (prefiereDarkMode.matches) {
            document.body.classList.remove('dark-mode')
        } else {
            document.body.classList.add('dark-mode')
        }
    })

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode')
    })
}
