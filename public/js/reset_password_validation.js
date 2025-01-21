/**
 * funzione che controlla l'email per il recupero della password
 * @returns boolean
 */
function check_email() {

    // salvo il valore dell'input senza i spazi all'inizio e alla fine
    const input = document.getElementById('email').value.trim();

    // salvo l'icona 
    const icon = document.querySelector(".fa-envelope");

    // salvo lo sapn di errore
    const error_span = document.querySelector(".error_email_js")

    // salvo il pattern della regex
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // se la lunghezza del valore e minore di 3 , maggiore di 255 o che non combaccia con il pattern
    if (input.length < 3 || regex.test(input) == false || input.length > 255) {

        // cambio il colore del bordo e il margine
        document.getElementById('email_container').style.borderColor = 'red';
        document.getElementById('email_container').style.margin = '0'

        // cambio il colore dell'icona 
        icon.style.color = "red";

        // mostro lo span di errore
        error_span.style.display = "block";

        return false;
    } else {
        return true
    }
}
/**
 * funzione che controlla che la password nuova combaccia con quella di conferma
 * @returns boolean
 */
function check_pw() {

    // salvo la password nuova
    const password = document.getElementById("password").value;

    // salvo la pssword di conferma
    const confirmPassword = document.getElementById("password-confirm").value;

    // salvo lo sapn di errore
    const error_span = document.querySelector(".error_pw_js");

    // salvo le icone a forma di lucchetto
    const icons = document.querySelectorAll('.fa-lock');

    // salvo le icone a forma di ochhio
    const iconsEye = document.querySelectorAll('.register_pass')

    // se la password nuova e uguale alla password di conferma
    if (password !== confirmPassword) {

        // cambio il colore del bordo e il margine della password di conferma
        document.getElementById("container_password_confirmation").style.borderColor = "red";
        document.getElementById("container_password_confirmation").style.margin = '0'

        // cambio il colore del bordo della password nuova
        document.getElementById("container_password").style.borderColor = "red";

        // mostro lo span di errore
        error_span.style.display = "block";

        // itero per tutte le icone
        for (let index = 0; index < icons.length; index++) {

            // salvo la singola icona a lucchetto
            const elementEye = iconsEye[index]

            // salvo la singila icona a occhio
            const element = icons[index];

            // cambio il colore dell'icona a occhio
            elementEye.style.color = "red"

            // cambio il colore dell'icona a lucchetto
            element.style.color = "red";
        }

        return false
    } else if (password === confirmPassword) {
        return true
    }
}

/**
 * funzione che controlla se email e conforme ai requisiti in caso nasconde i messaggi di errore
 */
function hide_email_error() {

    // salvo il valore dell'input senza i spazi all'inizio e alla fine
    const input = document.getElementById('email').value.trim();

    // salvo l'icona 
    const icon = document.querySelector(".fa-envelope");

    // salvo lo sapn di errore
    const error_span = document.querySelector(".error_email_js")

    // salvo il pattern della regex
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // se la lunghezza e maggiore, minore di 155 e combaccia con il pattern
    if (input.length > 3 && regex.test(input) == true && input.length < 255) {

        // cambio il colore del bordo e il margine
        document.getElementById('email_container').style.borderColor = 'red';
        document.getElementById('email_container').style.margin = '0'

        // cambio il colore dell'icona 
        icon.style.color = "red";

        // mostro lo span di errore
        error_span.style.display = "block";
    }
}

function hide_error_pw() {

    // salvo la password nuova
    const password = document.getElementById("password").value;

    // salvo la pssword di conferma
    const confirmPassword = document.getElementById("password-confirm").value;

    // salvo lo sapn di errore
    const error_span = document.querySelector(".error_pw_js");

    // salvo le icone a forma di lucchetto
    const icons = document.querySelectorAll('.fa-lock');

    // salvo le icone a forma di ochhio
    const iconsEye = document.querySelectorAll('.register_pass')

    // se la passorddi conferma vuota o che combaccia con la password di conferma
    if (confirmPassword == "" || password == confirmPassword) {

        // azzerro le modifiche del colore del bordo e il margine della password di conferma
        document.getElementById("container_password_confirmation").style.borderColor = "";
        document.getElementById("container_password_confirmation").style.margin = ''

        // azzerro le modic=fiche del colore del bordo della password di nuova
        document.getElementById("container_password").style.borderColor = "";

        // nascondo lo span di errore
        error_span.style.display = "";

        // itero per tutte le icone
        for (let index = 0; index < icons.length; index++) {

            // salvo la singola icona a lucchetto
            const elementEye = iconsEye[index]

            // salvo la singila icona a occhio
            const element = icons[index];

            // azzerra la modifica sull'icona a occhio
            elementEye.style.color = ""

            // azzerro le modifiche sull'icona a lucchetto
            element.style.color = "";
        }
    }
}

/**
 * funzione che mostra la apswword
 * @param {Event} e icona
 * @param {String} id dell'input
 */
function showPassword(e, id) {

    // se l'elemento ha come classe fa-eye
    if (e.target.classList[1] === "fa-eye") {

        // cambio il tipo di input a text
        document.getElementById(`${id}`).setAttribute('type', 'text');

        // cambio la classe dell'icona
        e.target.setAttribute('class', 'fa-solid fa-eye-slash icon_pass login_icon showPassword');
    } else {

        // cambio il tipo di input a password
        document.getElementById(`${id}`).setAttribute('type', 'password');

        // cambio la classe dell'icona
        e.target.setAttribute('class', 'fa-solid fa-eye icon_pass login_icon showPassword');
    }
}

/**
 * funzione controlla i campi dell form prima dell'invio dell'evento
 * @param {Event} e submit 
 */
function check_ever(e) {

    // salvo il bottone di conferma
    const btn = document.getElementById('reset_btn');

    // salvo il bottone di loading
    const btnLoading = document.getElementById('btn_loading');

    // nascondo il bottone di conferma
    btn.style.display = 'none';

    // mostro il bottone di loading
    btnLoading.style.display = ''

    // controllo email
    if (!check_email()) {

        // prevengo l'evento
        e.preventDefault();

        // mostro il bottone di conferma
        btn.style.display = '';

        // nascondo il bottone di loading
        btnLoading.style.display = 'none'
    }

    // controlla la password
    if (!check_pw) {

        // prevengo l'evento
        e.preventDefault();

        // mostro il bottone di conferma
        btn.style.display = '';

        // nascondo il bottone di loading
        btnLoading.style.display = 'none'
    }
}