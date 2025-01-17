/*=============== SHOW SIDEBAR ===============*/

/**
 * funzione che mostra la siderbar
 * @param {Number} toggleId id del bottone per far comparire l'elemento
 * @param {Number} sidebarId id della sidebar
 * @param {Number} headerId id del header
 * @param {Number} mainId id del main
 */
const showSidebar = (toggleId, sidebarId, headerId, mainId) => {

    // variabile in cui salco gli elementi
    const toggle = document.getElementById(toggleId),
        sidebar = document.getElementById(sidebarId),
        header = document.getElementById(headerId),
        main = document.getElementById(mainId)

    // se esistono tutti gli elementi
    if (toggle && sidebar && header && header && main) {

        // quando clicca sul bottone
        toggle.addEventListener('click', () => {
            /* Show sidebar */
            sidebar.classList.toggle('show-sidebar')
            /* Add padding header */
            header.classList.toggle('left-pd')
            /* Add padding main */
            main.classList.toggle('left-pd')
        })
    }
}

// invoco la funzione passando gli parametri
showSidebar('header-toggle', 'sidebar', 'header', 'main')


/*=============== LINK ACTIVE ===============*/


// variabile che raccoglie tutte le icone della sidebar
const sidebarLink = document.querySelectorAll('.sidebar__list a')

/**
 * funzione che rimuove e aggiunge la classe active-link
 */
function linkColor() {

    // rimuovi a tutti gl'elementi la classe 'active-link'
    sidebarLink.forEach(l => l.classList.remove('active-link'))

    // aggiungo la classe al elemto che a cliccato
    this.classList.add('active-link')

    // setto il LocalStorage
    localStorage.setItem('route-page', this.childNodes[3].textContent)
}

// se il local storage e null
if (localStorage.getItem('route-page') == null) {

    // metto la classe active-link al primo
    sidebarLink[0].classList.add('active-link')

} //altrimenti
else {

    // ciclo tra tutti gll'elementi
    sidebarLink.forEach((element) => {

        // se il contenuto nel elemento e uguale a quello salvato nel locale Storage
        if (element.childNodes[3].textContent == localStorage.getItem('route-page')) {

            // aggiungo la classe active-link
            element.classList.add('active-link')
        }
    })
}

//aggiungo per ogni elemento un evento e gli passo la funzione linkColor 
sidebarLink.forEach(l => l.addEventListener('click', linkColor))


/*=============== DARK LIGHT THEME ===============*/

// prendo il bottone per cambiare il tema
const themeButton = document.getElementById('theme-button')

// variabile contenente il nome del tema
const darkTheme = 'dark-theme'

// variabile contenente il nome della icona del sole
const iconTheme = 'ri-sun-fill'

// variabile dove raccolgo tutte le righe delletabelle
const tableRowEl = document.querySelectorAll("#main > div > div > div > table > tbody > tr > td");


// variabile in cui salvo il localStorage di selected-theme
const selectedTheme = localStorage.getItem('selected-theme')

// variabile in cui salvo il localStorage di selected-icon
const selectedIcon = localStorage.getItem('selected-icon')

//funzione che controllla cosa contiene nella classe del body
const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light'

//funzione che controllla cosa contiene nella classe del bottone
const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'ri-moon-clear-fill' : 'ri-sun-fill'

// se esiste selected theme
if (selectedTheme) {

    // itero per tutte le righe delle tabelle
    tableRowEl.forEach((element) => {

        // se selectedTheme e uguale a dark
        if (selectedTheme === 'dark') {

            // aggiungo la classe dark-th
            element.classList.add('dark-th');
        } else {

            // rimuovo la classe dark-th
            element.classList.remove('dark-th');
        }
    })

    /*
    se il valore di selectedTheme e uguale a dark aggiungo se no rimuove il valore della variabile darktheme
    */
    document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)

    /*
    se il valore di selectedTheme e uguale a dark aggiungo se no rimuove il valore della variabile iconTheme
    */
    themeButton.classList[selectedIcon === 'ri-moon-clear-fill' ? 'add' : 'remove'](iconTheme)
}


// quando clicco sul bottone
themeButton.addEventListener('click', () => {
    // Add or remove the dark / icon theme

    // itero per tutte le righe della tabella
    tableRowEl.forEach((element) => {

        // se la funzione mi rida light
        if (getCurrentTheme() === 'light') {

            // aggiungo la classe dark-th
            element.classList.add('dark-th');
        } else {

            // rimuovo la classe dark-th
            element.classList.remove('dark-th');
        }

    })

    // cambia il valore della classe 
    document.body.classList.toggle(darkTheme)
    // cambia il valore della classe 
    themeButton.classList.toggle(iconTheme)

    // setto il local storage
    localStorage.setItem('selected-theme', getCurrentTheme())
    localStorage.setItem('selected-icon', getCurrentIcon())
})