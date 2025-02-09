


const switchTheme = () => {

    const rootElem = document.documentElement;
    let dataTheme = rootElem.getAttribute('data-theme');

    const newTheme = (dataTheme === 'light') ? 'dark' : 'light';

    rootElem.setAttribute('data-theme', newTheme)

}

setTimeout(() => {
    document.getElementById('theme_switcher').addEventListener('click', switchTheme);
    console.log(document.getElementById('theme_switcher'))
}, 200)
