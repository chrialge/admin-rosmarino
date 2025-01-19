/**
 * funzione che controlla il valore dell'input name
 * @returns boolean
 */
function check_name() {

    // salvo il valore dell'input senza gli spazi all'inizio e alla fine
    const valueInput = document.getElementById("name").value.trim();

    // salvo lo psan di errore
    const error = document.getElementById('name_error');

    // salvo il pattern della regex
    const regex = /[0-9]/g;

    // se il valore dell'input e minore di tre, maggiore di 100 o che combaccia con il pattern
    if (valueInput.length < 3 || valueInput.match(regex) || valueInput.lengyh > 100) {

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

    // salvo il valore dell'input senza gli senza spazi all'inizio e alla fine
    const valueInput = document.getElementById("price").value.trim();

    // salvo lo span di errore
    const error = document.getElementById('price_error');

    // salvo il pattern della regex
    const regex = /[^0-9,.]/;

    // se il valore combaccia con il pattern, se il valore e maggiore di 9999.99 o minore di 0.01
    if (valueInput.match(regex) || parseFloat(valueInput) > 9999.99 || parseFloat(valueInput) < 0.01) {

        // cambio il bordo dell'input
        document.getElementById("price").style.border = '2px solid red';

        // mostro lo span di errore
        error.style.display = 'block';

        return false;
    } else {
        return true;
    }
}

/**
 * funzione che controlla il valore del  select di allergie
 * @returns boolean
 */
function check_typology() {

    // salvo il valore di select
    const input = document.getElementById("typology");

    // salvo lo span di errore
    const error = document.getElementById('typology_error');

    // se la lunghezza e minore di 1
    if (input.value.length < 1) {

        // cambio bordo dell'input
        input.style.border = '2px solid red';

        // mostro lo span di errore
        error.style.display = 'block';

        return false;
    } else {
        return true;
    }
}

/**
 * funzione che controlla il valore dell'input e in caso nasconde gli errori
 */
function hide_error_name() {

    // salvo il valore dell'input senza gli spazi all'inizio e alla fine
    const valueInput = document.getElementById('name').value.trim();

    // salvo lo span di errore
    const error = document.getElementById('name_error');

    // salvo il pattern
    const regex = /[0-9]/g;

    // se la lunghezza e maggiore di 3 o minore di 100
    if (valueInput.length > 3 || valueInput.length < 100) {

        // se combaccia con il pattern
        if (valueInput.match(regex)) {

        } else {

            // azzerro le modifiche apportate
            document.getElementById('name').style.border = '';

            // nascondo lo span di errore
            error.style.display = 'none';
        }
    }
}

/**
 * funzione che controlla il valore dell'input e in caso nasconde gli errori
 */

function hide_error_price() {

    // salvo il valore dell'input senza gli spazi all'inizio e alla fine
    const input = document.getElementById("price");

    //salvo lo span di errore
    const error = document.getElementById('price_error');

    // salvo il pattern della regex
    const regex = /[^0-9]/;

    // se il valore e minore di 9999.99 o maggiore di 0.01
    if (parseFloat(input.value) < 9999.99 || parseFloat(input.value) > 0.01) {

        // se il valore combacia con il pattern
        if (input.value.match(regex)) {

        } else {

            // azzerro le modifiche
            input.style.border = '';

            // nascondo lo span di errore
            error.style.display = 'none';
        }


    }
}

/**
 * funzione che controlla il valore del select e in caso nasconde gli errori
 */
function hide_error_typology() {

    // salvo il valore del select
    const input = document.getElementById("typology");

    // salvo lo span di errore
    const error = document.getElementById('typology_error');

    // se la lunghezza del valore è maggiore di 0 
    if (input.value.length > 0) {

        // azzerro le modifiche
        input.style.border = '';

        // nascondo lo span di errore
        error.style.display = 'none';
    }


}


/**
 * funzione che controlla i campi del form di modifica del piatto
 * @param {Event} e event submit del form
 */
function check_validation(e) {




    // salvo i bottone di conferma e di loading
    const btnCreate = document.getElementById('btn_edit_plate');
    const btnLoading = document.getElementById('btn_loading');

    // nascondo il bottone di conferma e appare il bottone di loading
    btnCreate.style.display = 'none';
    btnLoading.style.display = '';

    // controllo il nome
    if (!check_name()) {

        // prevengo l'evento
        e.preventDefault();

        // nascondo il bottone di loading e compare il bottone di conferma
        btnCreate.style.display = '';
        btnLoading.style.display = 'none';
    }

    // controllo il prezzo
    if (!check_price()) {

        // prevengo l'evento
        e.preventDefault();

        // nascondo il bottone di loading e compare il bottone di conferma
        btnCreate.style.display = '';
        btnLoading.style.display = 'none';
    }

    // controllo la tipologia
    if (!check_typology()) {

        // prevengo l'evento
        e.preventDefault();

        // nascondo il bottone di loading e compare il bottone di conferma
        btnCreate.style.display = '';
        btnLoading.style.display = 'none';
    }
}