/*=============== SHOW SIDEBAR ===============*/



const showSidebar = (toggleId, sidebarId, headerId, mainId) => {
    const toggle = document.getElementById(toggleId),
        sidebar = document.getElementById(sidebarId),
        header = document.getElementById(headerId),
        main = document.getElementById(mainId)

    if (toggle && sidebar && header && header && main) {
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
showSidebar('header-toggle', 'sidebar', 'header', 'main')


/*=============== LINK ACTIVE ===============*/



const sidebarLink = document.querySelectorAll('.sidebar__list a')

function linkColor() {
    sidebarLink.forEach(l => l.classList.remove('active-link'))

    this.classList.add('active-link')
    localStorage.setItem('route-page', this.childNodes[3].textContent)
}

if (localStorage.getItem('route-page') == null) {
    sidebarLink[0].classList.add('active-link')
} else {
    sidebarLink.forEach((element) => {
        if (element.childNodes[3].textContent == localStorage.getItem('route-page')) {
            element.classList.add('active-link')
        }
    })
}

sidebarLink.forEach(l => l.addEventListener('click', linkColor))


/*=============== DARK LIGHT THEME ===============*/


const themeButton = document.getElementById('theme-button')
const darkTheme = 'dark-theme'
const iconTheme = 'ri-sun-fill'
const tableRowEl = document.querySelectorAll("#main > div > div > div > table > tbody > tr > td");


// Previously selected topic (if user selected)
const selectedTheme = localStorage.getItem('selected-theme')
const selectedIcon = localStorage.getItem('selected-icon')

// We obtain the current theme that the interface has by validating the dark-theme class
const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light'
const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'ri-moon-clear-fill' : 'ri-sun-fill'

// We validate if the user previously chose a topic
if (selectedTheme) {
    // If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the dark
    tableRowEl.forEach((element) => {


        if (selectedTheme === 'dark') {
            element.classList.add('dark-th');
        } else {
            element.classList.remove('dark-th');

        }

    })

    document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)
    themeButton.classList[selectedIcon === 'ri-moon-clear-fill' ? 'add' : 'remove'](iconTheme)
}

console.log(localStorage.getItem('selected-theme'));

// Activate / deactivate the theme manually with the button
themeButton.addEventListener('click', () => {
    // Add or remove the dark / icon theme
    console.log(getCurrentTheme())
    tableRowEl.forEach((element) => {


        if (getCurrentTheme() === 'light') {
            element.classList.add('dark-th');
        } else {
            element.classList.remove('dark-th');

        }

    })
    document.body.classList.toggle(darkTheme)
    themeButton.classList.toggle(iconTheme)
    // We save the theme and the current icon that the user chose
    localStorage.setItem('selected-theme', getCurrentTheme())
    localStorage.setItem('selected-icon', getCurrentIcon())
})