



// variabile che prende il bottone
const themeButton = document.getElementById('theme-button')

// variabile che salva la classe di body
const darkTheme = 'dark-theme'

// variabile che salva la classe dell'icona
const iconTheme = 'ri-sun-fill'


// prendo i dati salvati nel localstorage
const selectedTheme = localStorage.getItem('selected-theme')
const selectedIcon = localStorage.getItem('selected-icon')

/**
 * funzione che controlla se il body e di tipo dark o light
 * @returns se il body contiene dark o light
 */
const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light'

/**
 * funzione che ritorna la classe che contien l'icona
 * @returns ritorna la classe del icona
 */
const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'ri-moon-clear-fill' : 'ri-sun-fill'

//se esiste il dato salvato nel local storage
if (selectedTheme) {

    // se il dato salvato e dark aggiunge la classe altrimenti la rimuove
    document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)

    // se il body e dark
    if (getCurrentTheme() == 'dark') {

        // rimuove la classe dell'icona del sole
        themeButton.classList.remove('ri-sun-fill')

        // aggiunge la classe dell'icona della luna
        themeButton.classList.add('ri-moon-clear-fill')
    } //altrimenti
    else {

        // aggiunge la classe dell'icona del sole
        themeButton.classList.add('ri-sun-fill')

        // aggiunge la classe dell'icona della luna
        themeButton.classList.remove('ri-moon-clear-fill')
    }

}


//aggiungo l'evento sul bottone in caso di click..
themeButton.addEventListener('click', () => {

    // cambio le classi al click
    document.body.classList.toggle(darkTheme)
    themeButton.classList.toggle(iconTheme)

    // salviamo nel local storage il valore di body e dell'icona
    localStorage.setItem('selected-theme', getCurrentTheme())
    localStorage.setItem('selected-icon', getCurrentIcon())
})