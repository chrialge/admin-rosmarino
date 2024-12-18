/**
 * event che quando clicco sul icona a forma di occhio della campo password della pagina login mi fa vedere la password e per far ritornare come prima basta cliccare nuovamente
 */

setTimeout(() => {
    document.getElementById('showPassword').addEventListener('click', (e) => {
        console.log(e.target.classList[1])
        if (e.target.classList[1] === "fa-eye") {
            document.getElementById('password').setAttribute('type', 'text');
            e.target.setAttribute('class', 'fa-solid fa-eye-slash icon_pass login_icon showPassword');

        } else {
            document.getElementById('password').setAttribute('type', 'password');
            e.target.setAttribute('class', 'fa-solid fa-eye icon_pass login_icon showPassword');


        }
    })
}, 100)



const themeButton = document.getElementById('theme-button')
const darkTheme = 'dark-theme'
const iconTheme = 'ri-sun-fill'


// Previously selected topic (if user selected)
const selectedTheme = localStorage.getItem('selected-theme')
const selectedIcon = localStorage.getItem('selected-icon')

// We obtain the current theme that the interface has by validating the dark-theme class
const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light'
const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'ri-moon-clear-fill' : 'ri-sun-fill'

// We validate if the user previously chose a topic
if (selectedTheme) {
    console.log(selectedTheme)

    document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)
    if (getCurrentTheme() == 'dark') {
        themeButton.classList.remove('ri-sun-fill')
        themeButton.classList.add('ri-moon-clear-fill')
    } else {
        themeButton.classList.add('ri-sun-fill')
        themeButton.classList.remove('ri-moon-clear-fill')
    }

}

console.log(localStorage.getItem('selected-theme'));

// Activate / deactivate the theme manually with the button
themeButton.addEventListener('click', () => {
    // Add or remove the dark / icon theme
    // if (getCurrentTheme() == 'dark') {
    //     themeButton.classList.remove('ri-sun-fill')
    //     themeButton.classList.add('ri-moon-clear-fill')
    // } else {
    //     themeButton.classList.add('ri-sun-fill')
    //     themeButton.classList.remove('ri-moon-clear-fill')
    // }

    document.body.classList.toggle(darkTheme)
    themeButton.classList.toggle(iconTheme)
    // We save the theme and the current icon that the user chose
    localStorage.setItem('selected-theme', getCurrentTheme())
    localStorage.setItem('selected-icon', getCurrentIcon())
})