/**
 * funzione che controlla l'input del nome della prenotazione  e del cliente
 * @returns boolean
 */
function check_name() {

    // salvo il valore dell'input senza spazi all'inizio e alla fine
    const valueInput = document.getElementById('customer_name').value.trim();

    // salvo lo sapn di errore
    const error = document.getElementById('name_error');

    // salvo il pattern della regex
    const regex = /[^a-zA-Z]/;

    // se la lunghezza e minore di 3, maggiore di 100 o che combaccia con il pattern
    if (valueInput.match(regex) || valueInput.length < 3 || valueInput.length > 100) {

        // cambio il cp;pre del bordo dell'input
        document.getElementById('customer_name').style.borderColor = "red";

        // mostro lo span di errore
        error.style.display = 'block';

        return false;
    } else {
        return true;
    }
}

/**
 * funzione che controlla l'input del cognome della prenotazione e del cliente
 * @returns boolean
 */
function check_last_name() {

    // salvo il valore dell'input senza gli sapzzi all'inizio e allla fine
    const valueInput = document.getElementById('customer_last_name').value.trim();

    // salvo lo span di errore
    const error = document.getElementById('last_name_error');

    // salvo il pattern della regex
    const regex = /[^a-zA-Z]/;

    // se la lunghezza e minore di 3, maggiore di 100 o combaccia con il pattern
    if (valueInput.match(regex) || valueInput.length < 3 || valueInput.length > 100) {

        // cambio il colore del bordo dell'input
        document.getElementById('customer_last_name').style.borderColor = "red";

        // mostro lo span di errore
        error.style.display = 'block';

        return false;
    } else {
        return true;
    }
}

/**
 * funzione che controlla il valore dell'email della prenotazione e del cliente
 * @returns boolean
 */
function check_email() {

    // salvo il valore della input senza gli spazi all'inizo e alla fine
    const valueInput = document.getElementById('customer_email').value.trim();

    // salvo lo span di errore
    const error = document.getElementById('email_error');

    // salvo il pattern della regex
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // se la lunghezza e minore di 3, maggiore di 255 o che combaccia con la regex
    if (regex.test(valueInput) == false || valueInput.length < 3 || valueInput.length > 255) {

        // cambio il colore del bordo ell'input
        document.getElementById('customer_email').style.borderColor = "red";

        // mostro lo span di errore
        error.style.display = 'block';

        return false;
    } else {
        return true;
    }
}

/**
 * funzione che controlla il numero di telefono della prenotazione e del cliente
 * @returns boolean
 */
function check_telephone() {

    // salvo il valore dell'input senza gli spazi all'inizio e alla fine
    const valueInput = document.getElementById('customer_telephone').value.trim();

    // salvo lo span di errore
    const error = document.getElementById('telephone_error');

    // salvo il pattern per la regex
    const regex = /[^+0-9]/;

    // se la lunghezza e minore id 6, maggiore di 20 o che non combaccia con la regex
    if (valueInput.match(regex) || valueInput.length < 6 || valueInput.length > 20) {

        // cambio il colore del bordo dell'input
        document.getElementById('customer_telephone').style.borderColor = "red";

        // mostro lo span di errore
        error.style.display = 'block';

        return false;
    } else {
        return true;
    }

}


/**
 * funzione che controlla il numero di persone della prenotazione
 * @returns boolean
 */
function check_person() {

    // salvo il valore delll'input senza spazi all'inzio e alla fine
    const valueInput = document.getElementById('person').value.trim();

    // salvo lo span di errore
    const error = document.getElementById('person_error');

    // salvo il pattern della regex
    const regex = /[^0-9]/;


    // il valore e minore di 0, maggiore di 150 o che combaccia con il pattern
    if (valueInput.match(regex) || parseInt(valueInput) < 0 || parseInt(valueInput) > 150 || valueInput.length == 0) {
        console.log(valueInput);
        // mostro lo span di errore
        error.style.display = 'block';

        // cambio il colore del bordo dell'input
        document.getElementById('person').style.borderColor = "red";

        return false;
    } else {
        return true;
    }

}

/**
 * funzione che controlla la dat di nascita del cliente
 * @returns boolean 
 */
function check_birty_day() {

    // salvo il valore delll'input senza spazi all'inzio e alla fine
    const valueInput = document.getElementById('date').value.trim();

    // salvo lo span di errore
    const error = document.getElementById('birty_day_error');

    // se lunghezza del valore e diverso di 10
    if (valueInput.length !== 10) {

        // mostro lo span di errore
        error.style.display = 'block'

        // cambio il colore del bordo dell'input
        document.getElementById('date').style.borderColor = "red"

        return false;
    } else {
        return true;
    }
}

/**
 * funzione che controlla se il valore ha detterminate carrateristiche e quindi nascondere i messaggi di
 * errori
 */
function hide_name_error() {

    // salvo il valore dell'input senza gli spazi all'inizio e alla fine
    const valueInput = document.getElementById('customer_name').value.trim();

    // salvo lo span di errore
    const error = document.getElementById('name_error');

    // salvo il pattern della regex
    const regex = /[^a-zA-Z]/;

    // se la lunghezza e maggiore di 3 e minore di 100
    if (valueInput.length > 3 && valueInput.length < 100) {

        // se il valore combaccia con il pattern
        if (valueInput.match(regex)) {

        } else {

            // nascondo lo span di errore
            error.style.display = 'none';

            //azzerro le modifiche dell'input
            document.getElementById('customer_name').style.borderColor = "";
        }

    }
}

/**
 * funzione che controlla se il valore ha detterminate carrateristiche e quindi nascondere i messaggi di
 * errori
 */
function hide_last_name_error() {

    // salvo il valore dell'input senza gli spazi all'inizio e alla fine
    const valueInput = document.getElementById('customer_last_name').value.trim();

    // salvo lo span di errore
    const error = document.getElementById('last_name_error');

    // salvo il pattern della regex
    const regex = /[^a-zA-Z]/;

    // se la lunghezza e maggiore di 3 e minore di 100
    if (valueInput.length > 3 && valueInput.length < 100) {


        // se il valore combaccia con il pattern
        if (valueInput.match(regex)) {

        } else {


            // nascondo lo span di errore
            error.style.display = 'none';

            //azzerro le modifiche dell'input
            document.getElementById('customer_last_name').style.borderColor = "";
        }

    }
}

/**
 * funzione che controlla se il valore ha detterminate carrateristiche e quindi nascondere i messaggi di
 * errori
 */
function hide_email_error() {

    // salvo il valore dell'input senza gli sapzi all'inizio e alla fine
    const valueInput = document.getElementById('customer_email').value.trim();

    // salvo lo span di errore
    const error = document.getElementById('email_error');

    // salvo il pattern della regex
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // se la lunghezza e maggiore di 3 e minore di 255
    if (valueInput.length > 3 && valueInput.length < 255) {

        // se il valore combacia con il pattern
        if (regex.test(valueInput) == true) {

            // nascondo il messaggio di errore
            error.style.display = 'none';

            // azzerro le modifiche dell'input
            document.getElementById('customer_email').style.borderColor = "";
        }

    }

}

/**
 * funzione che controlla se il valore ha detterminate carrateristiche e quindi nascondere i messaggi di
 * errori
 */
function hide_telephone_error() {

    // salvo il valore dell'input senza gli sapzi all'inizio e alla fine
    const valueInput = document.getElementById('customer_telephone').value.trim();


    // salvo lo span di errore
    const error = document.getElementById('telephone_error');

    // salvo il pattern della regex
    const regex = /[^+0-9]/;

    // se la lunghezza e maggiore di 6 e minore di 20
    if (valueInput.length > 6 && valueInput.length < 20) {

        // se il valorre combacia con il pattern
        if (valueInput.match(regex)) {

        } else {

            // nascondo lo span di errore
            error.style.display = 'none';

            // azzerro le modifiche sull'input
            document.getElementById('customer_telephone').style.borderColor = "";
        }
    }
}




/**
 * funzione che controlla se il valore ha detterminate carrateristiche e quindi nascondere i messaggi di
 * errori
 */
function hide_person_error() {

    // salvo il valore dell'input senza gli sapzi all'inizio e alla fine
    const valueInput = document.getElementById('person').value.trim();

    // salvo lo span di errore
    const error = document.getElementById('person_error');

    // salvo il pattern della regex
    const regex = /[^0-9]/;

    // se il valore e maggiore di 0 e minore di 150
    if (parseInt(valueInput) > 0 || parseInt(valueInput) < 150) {

        // se il valore combacia con il pattern
        if (valueInput.match(regex)) {

        } else {

            // nascondo lo span di errore
            error.style.display = 'none';

            // azzerro le modifiche fatte sull'input
            document.getElementById('person').style.borderColor = "";
        }

    }
}

/**
 * funzione che controlla il form di modifica della prenotazione
 * @param {Event} e evento submit
 */
function check_validation(e) {

    // salvo il bottone di conferma
    const btnCreate = document.getElementById('btn_edit_reservation');

    // salvo il bottone di loading
    const btnLoading = document.getElementById('btn_loading')

    // nascondo il bottone di conferma
    btnCreate.style.display = 'none';

    // mostro il bottone di carcamento
    btnLoading.style.display = '';

    if (!check_name()) {

        // prevengo l'evento
        e.preventDefault();

        // mostro il bottone di conferma
        btnCreate.style.display = '';

        // nascondo il bottone di loading
        btnLoading.style.display = 'none';
    }

    if (!check_last_name()) {

        // prevengo l'evento
        e.preventDefault();

        // mostro il bottone di conferma
        btnCreate.style.display = '';

        // nascondo il bottone di loading
        btnLoading.style.display = 'none';
    }

    if (!check_email()) {

        // prevengo l'evento
        e.preventDefault();

        // mostro il bottone di conferma
        btnCreate.style.display = '';

        // nascondo il bottone di loading
        btnLoading.style.display = 'none';
    }
    if (!check_telephone()) {

        // prevengo l'evento
        e.preventDefault();

        // mostro il bottone di conferma
        btnCreate.style.display = '';

        // nascondo il bottone di loading
        btnLoading.style.display = 'none';
    }
    if (!check_person()) {


        // prevengo l'evento
        e.preventDefault();

        // mostro il bottone di conferma
        btnCreate.style.display = '';

        // nascondo il bottone di loading
        btnLoading.style.display = 'none';
    }
}

/**
 * funzione che controlla il form di modifica del cliente
 * @param {Event} e evento submit
 */
function check_validation_customer(e) {

    // bottone di conferma
    const btnCreate = document.getElementById('btn_edit_customer');

    // bottone di loading
    const btnLoading = document.getElementById('btn_loading');

    // nascondo il bottone di conferma
    btnCreate.style.display = 'none';

    // mostro il bottone di carcamento
    btnLoading.style.display = '';

    if (!check_name()) {

        // prevengo l'evento
        e.preventDefault();

        // mostro il bottone di conferma
        btnCreate.style.display = '';

        // nascondo il bottone di loading
        btnLoading.style.display = 'none';
    }

    if (!check_last_name) {

        // prevengo l'evento
        e.preventDefault();

        // mostro il bottone di conferma
        btnCreate.style.display = '';

        // nascondo il bottone di loading
        btnLoading.style.display = 'none';
    }

    if (!check_email) {

        // prevengo l'evento
        e.preventDefault();

        // mostro il bottone di conferma
        btnCreate.style.display = '';

        // nascondo il bottone di loading
        btnLoading.style.display = 'none';
    }

    if (!check_telephone) {

        // prevengo l'evento
        e.preventDefault();

        // mostro il bottone di conferma
        btnCreate.style.display = '';

        // nascondo il bottone di loading
        btnLoading.style.display = 'none';
    }

    if (!check_birty_day) {

        // prevengo l'evento
        e.preventDefault();

        // mostro il bottone di conferma
        btnCreate.style.display = '';

        // nascondo il bottone di loading
        btnLoading.style.display = 'none';
    }

}