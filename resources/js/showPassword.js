/**
 * event che quando clicco sul icona a forma di occhio della campo password della pagina login mi fa vedere la password e per far ritornare come prima basta cliccare nuovamente
 */
document.getElementById('showPassword').addEventListener('click', (e) => {
    console.log(e.target.classList[1])
    if (e.target.classList[1] === "fa-eye") {
        document.getElementById('password').setAttribute('type', 'text');
        e.target.setAttribute('class', 'fa-solid fa-eye-slash icon_pass login__icon');

    } else {
        document.getElementById('password').setAttribute('type', 'password');
        e.target.setAttribute('class', 'fa-solid fa-eye icon_pass login__icon');


    }
})