/**
 * funzione che nasonde gli errori se le due password combacciano
 */
function hide_error_password() {

    // salvo la password nuova
    const passwordEl = document.getElementById('password_confirmation');

    // salvo la password di conferma
    const passwordConfirmationEl = document.getElementById('password_new');

    // salvo lo span di errore
    const spanErrorEl = document.getElementById('password_error');

    // se la password nuova e quella di conferma coincidono e che ci sia almeno un carrattere nella password di conferma
    if (passwordConfirmationEl.value == passwordEl.value && passwordConfirmationEl.value.length > 0) {

        // azzerro le modifiche nell'input della password di conferma
        passwordConfirmationEl.style.borderColor = '';

        // azzerro le modifiche nell'input della password nuova
        passwordEl.style.borderColor = '';

        // nascondo lo span di errore
        spanErrorEl.style.display = 'none';
    }
}

/**
 * funzione che controlla che la password nuova e identica a quella di conferma
 * @returns boolean
 */
function check_password() {


    // salvo la password nuova
    const passwordEl = document.getElementById('password_confirmation');

    // salvo la password di conferma
    const passwordConfirmationEl = document.getElementById('password_new');

    // salvo lo span di errore
    const spanErrorEl = document.getElementById('password_error');

    // se la password nuova e di conferma non combacciano e se ci sia almeno un carratere nella password di conferma
    if (passwordConfirmationEl.value != passwordEl.value && passwordConfirmationEl.value.length > 0) {

        // la password di conferma cambia il colore del bordo
        passwordConfirmationEl.style.borderColor = 'red';

        // la password nuova cambia il colore del bordo
        passwordEl.style.borderColor = 'red'

        // mostro lo span di errore
        spanErrorEl.style.display = '';

        return false
    } else {
        return true;
    }

}

function check_ever(e) {

    // salvo il bottone di conferma
    const btnEl = document.getElementById('btn_save');

    // salvo il bottone di caricamento
    const btnLoadingEl = document.getElementById('btn_loading');
    btnEl.style.display = 'none';
    btnLoadingEl.style.display = '';

    // se ce un errore con la password
    if (!check_password()) {

        // previene l'evento
        e.preventDefault();

        // mostro il bottone di conferma
        btnEl.style.display = '';

        // nasco il bottone di loading
        btnLoadingEl.style.display = 'none';
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
    if (iconEl.childNodes[1].classList[0] == "ri-eye-fill") {

        // cambio il tipo dell'input
        inputEl.setAttribute('type', 'text')

        // cambio la classe dell'icona
        iconEl.childNodes[1].classList = "ri-eye-off-fill"
    } else {

        // cambio il tipo dell'input
        inputEl.setAttribute('type', 'password')

        // cambio la classe dell'icona
        iconEl.childNodes[1].classList = "ri-eye-fill"
    }
}