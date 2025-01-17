/**
 * funzione che controlla se il valore dell'input del nome
 * @returns boolean 
 */
function check_name() {

    // salvo il valore senza i sapzi all'inzio e alla fine del input 
    const valueInput = document.getElementById("name").value.trim();

    // salvo lo span di errore
    const error = document.getElementById('name_error');

    // salvo il pattern per la regex
    const regex = /[0-9]/g;

    /* 
    se lunghezza del valore del input e minore di 3 o maggiore di 100 o che combaccia con un carratere del pattern 
    */
    if (valueInput.length < 3 || valueInput.match(regex) || valueInput.length > 100) {

        // cambio il bordo dell'input
        document.getElementById("name").style.border = '2px solid red';

        // mostro lo span di errore
        error.style.display = 'block';


        return false;
    } else {
        return true;
    }

}

/**
 * funzione che controlla il valore dell'input del prezzo
 * @returns boolean
 */
function check_price() {

    //salvo il valore dell'input senza i spazi all'inizio e alla fine
    const valueInput = document.getElementById("price").value.trim();

    //salvo lo span di errore
    const error = document.getElementById('price_error');

    // salvo il pattern per la regex
    const regex = /[^0-9,.]/;

    /**
     * se il valore combacia con un valore del pattern o che il suo valore e maggiore di 9999.99 o minore di 0.01
     */
    if (valueInput.match(regex) || parseFloat(valueInput) > 9999.99 || parseFloat(valueInput) < 0.01) {

        //cambio il dell'input
        document.getElementById("price").style.border = '2px solid red';

        // mosto lo span di errore
        error.style.display = 'block';

        return false;
    } else {
        return true;
    }
}

/**
 * funzione che controlla il valore dell'input tipologie
 * @returns boolean
 */
function check_typology() {

    // salvo il valore dell'input senza spazi all'inizio e alla fine
    const valueInput = document.getElementById("typology").value.trim();

    // span di errore
    const error = document.getElementById('typology_error');

    // se la lunghezza e superiore di 1
    if (valueInput.value.length < 1) {

        // cambio il bordo dell'input
        document.getElementById("typology").style.border = '2px solid red';

        //mostro lo span di errore
        error.style.display = 'block';

        return false;
    } else {
        return true;
    }
}

/**
 * funzione che controlla se il valore dell'input corrisponde alle richieste e nascondere eventuali modifiche apportate per mostrare *l'errore
 */
function hide_error_name() {

    // salvo il valore dell'input senza spazi all'inizio e alla fine
    const valueInput = document.getElementById('name').value.trim();

    // span di errore
    const error = document.getElementById('name_error');

    //salvo il pattern della regex
    const regex = /[0-9]/g;

    // se la lunghezza e maggiore di tre e minore di 100
    if (valueInput.length > 3 || valueInput.length < 100) {

        // se il valore corrisponde al pattern
        if (valueInput.match(regex)) {

        } //altrimenti
        else {

            // cancello le modifiche apportate
            document.getElementById('name').style.border = '';

            // nascondo lo span di errore
            error.style.display = 'none';
        }
    }
}

/**
 * funzione che controlla se il valore dell'input corrisponde alle richieste e nascondere eventuali modifiche apportate per mostrare l'errore
 */
function hide_error_price() {

    // salvo il valore dell'input senza gli spazi all'inizio e alla fine
    const valueInput = document.getElementById("price").value.trim();

    // salvo lo span errore
    const error = document.getElementById('price_error');

    // salvo il pattern della regex
    const regex = /[^0-9]/;

    // se il valore e maggiore di 9999.99 e minore di 0.01
    if (parseFloat(valueInput) < 9999.99 || parseFloat(valueInput) > 0.01 || valueInput.length < 1) {

        // se il pattern della regex combacia con valueInput
        if (valueInput.match(regex)) {

        }//altrimenti 
        else {

            // cancello le modifiche apportate
            document.getElementById("price").style.border = '';

            // nascondo lo span di errore
            error.style.display = 'none';
        }
    }
}

/**
 * funzione che controlla se il valore dell'input corrisponde e nascondere eventuali modifiche apportate per mostrare l'errore
 */
function hide_error_typology() {

    // salvo il valore dell'input senza spazi all'inizio e alla fine
    const input = document.getElementById("typology").value.trim();

    // salvo lo span di errore
    const error = document.getElementById('typology_error');

    // se la lunghezza e maggiore di 0
    if (input.value.length > 0) {

        // cancello le modifiche apportate
        document.getElementById("typology").style.border = '';

        // nascondo lo span di errore
        error.style.display = 'none';
    }
}

function check_form(e) {

    // salvo il bottone di conferma
    const btnCreate = document.getElementById('btn_create_plate')
    // salvo il bottone di loading
    const btnLoading = document.getElementById('btn_loading')

    // nascondo il bottone di modifica
    btnCreate.style.display = 'none';
    // mostro il bottone di loading
    btnLoading.style.display = '';

    // se il chek name e false
    if (!check_name()) {

        // previen l'evento
        e.preventDefault()
        // mostro il bottone di conferma
        btnCreate.style.display = '';
        // nascondo il bottone di loading
        btnLoading.style.display = 'none';
    }

    // se il check_price e false
    if (!check_price()) {
        // previen l'evento
        e.preventDefault()
        // mostro il bottone di conferma
        btnCreate.style.display = '';
        // nascondo il bottone di loading
        btnLoading.style.display = 'none';
    }

    // se il check_typology e false
    if (!check_typology()) {
        // previen l'evento
        e.preventDefault()
        // mostro il bottone di conferma
        btnCreate.style.display = '';
        // nascondo il bottone di loading
        btnLoading.style.display = 'none';
    }
}




