document.querySelector('.menu').addEventListener('click', ouvrir);

function ouvrir() {
    document.querySelector('.categorie').classList.toggle("ouvrir");
    document.addEventListener('click', fermerSiExterieur);
}

function fermerSiExterieur(event) {
    const menu = document.querySelector('.categorie');
    const boutonMenu = document.querySelector('.menu');
    
    if (!menu.contains(event.target) && !boutonMenu.contains(event.target)) {
        menu.classList.remove("ouvrir");
        document.removeEventListener('click', fermerSiExterieur);
    }
}