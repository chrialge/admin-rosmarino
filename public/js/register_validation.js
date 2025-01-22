function check_name() {
    const input = document.getElementById('name').value.trim();
    const icon = document.getElementById("name_icon");
    const error_span = document.querySelector(".error_name_js")
    const regex = /[0-9]/g;



    if (input.length < 3 || input.match(regex) || input.length > 255) {
        document.getElementById('name').style.borderColor = 'red';
        icon.style.color = "red";
        error_span.style.display = "block";
        return false
    } else {
        return true
    }

}

function check_email() {
    const input = document.getElementById('email').value.trim();
    const icon = document.querySelector(".fa-envelope");
    const error_span = document.querySelector(".error_email_js")
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (input.length < 3 || regex.test(input) == false || input.length > 255) {
        document.getElementById('email').style.borderColor = 'red';
        icon.style.color = "red";
        error_span.style.display = "block";
        return false;
    } else {
        return true
    }
}

function check_pw() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("password-confirm").value;
    const error_span = document.querySelector(".error_pw_js");
    const icons = document.querySelectorAll('.fa-lock');
    const iconsEye = document.querySelectorAll('.register_pass')


    if (confirmPassword !== "" && password !== confirmPassword) {
        document.getElementById("password").style.borderColor = "red";
        document.getElementById("password-confirm").style.borderColor = "red";
        error_span.style.display = "block";

        for (let index = 0; index < icons.length; index++) {
            const elementEye = iconsEye[index]
            const element = icons[index];

            elementEye.style.color = "red"
            element.style.color = "red";
        }

        return false
    } else if (password === confirmPassword) {
        return true
    }
}

function hide_name_error() {

    const input = document.getElementById('name').value.trim();
    const icon = document.getElementById("name_icon");
    const error_span = document.querySelector(".error_name_js")
    const regex = /[0-9]/g;

    if (input.length > 3 && !input.match(regex) && input.length < 255) {
        document.getElementById('name').style.borderColor = '';
        icon.style.color = "";
        error_span.style.display = "none";
    }
}

function hide_email_error() {
    const input = document.getElementById('email').value.trim();
    const icon = document.querySelector(".fa-envelope");
    const error_span = document.querySelector(".error_email_js")
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (input.length > 3 && regex.test(input) && input.length < 255) {
        document.getElementById('email').style.borderColor = '';
        icon.style.color = "";
        error_span.style.display = "none";
    }
}

function hide_pw_error() {

    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("password-confirm").value;
    const error_span = document.querySelector(".error_pw_js");
    const icons = document.querySelectorAll('.fa-lock');
    const iconsEye = document.querySelectorAll('.register_pass')

    if (confirmPassword == "" || password == confirmPassword) {
        document.getElementById("password").style.borderColor = "";
        document.getElementById("password-confirm").style.borderColor = "";
        error_span.style.display = "none";

        for (let index = 0; index < icons.length; index++) {
            const elementEye = iconsEye[index]
            const element = icons[index];



            elementEye.style.color = ""
            element.style.color = "";
        }
    }
}


/**
 * funzione che mostra la password
 * @param {String} input id dell'input 
 * @param {String} icon id del contenotore dell'icona
 */
function showPassword(input, icon) {

    // input
    const inputEl = document.getElementById(input);

    // icona
    const iconEl = document.getElementById(icon);

    // se l'icona a come classe 'ri-eye-fill'
    if (iconEl.classList[1] == "fa-eye") {

        // cambio il tipo dell'input
        inputEl.setAttribute('type', 'text')

        // cambio la classe dell'icona
        iconEl.classList = "fa-solid fa-eye-slash register_pass login_icon showPassword"
    } else {

        // cambio il tipo dell'input
        inputEl.setAttribute('type', 'password')

        // cambio la classe dell'icona
        iconEl.classList = "fa-solid fa-eye register_pass login_icon showPassword"
    }
}

function check_form(e) {



    // salvo il bottone di conferma
    const btnConfirm = document.getElementById('register_input');

    // salvo il bottone di loading
    const btnLoading = document.getElementById('loading_btn');

    // nascondo il bottone di conferma
    btnConfirm.style.display = 'none';
    btnLoading.style.display = '';

    if (!check_name) {

        // prevengo l'evento
        e.preventDefault();

        // mostro il bottone di conferma
        btnConfirm.style.display = '';

        // nasco il bottone di loading
        btnLoading.style.display = "none";
    }

    if (!check_email) {

        // prevengo l'evento
        e.preventDefault();

        // mostro il bottone di conferma
        btnConfirm.style.display = '';

        // nasco il bottone di loading
        btnLoading.style.display = "none";
    }

    if (!check_pw) {

        // prevengo l'evento
        e.preventDefault();

        // mostro il bottone di conferma
        btnConfirm.style.display = '';

        // nasco il bottone di loading
        btnLoading.style.display = "none";
    }
}


