/**
 * funzione che controlla il valore del input di name
 * @returns boolean true and false
 */
function check_name() {

    // salvo il valore dell'input
    const input = document.getElementById('name').value.trim();

    // salvo l'elemento contenuto il messaggio d'errore
    const spanError = document.getElementById('name_error');

    // salvo il pattern d'errore
    const regex = /[0-9]/g;

    // salvo l'elemento di errore lato back
    const errorBack = document.getElementById('name_error_back');

    // se valore  e meno di tre carratteri o piu di 50 carratteri o combacciao con un dei carratteri
    if (input.length < 3 || input.match(regex) || input.length > 50) {

        // non esiste l'errore lato back
        if (!errorBack) {

            // cambio il colore del bordo dell'input
            document.getElementById('name').style.borderColor = 'red';

            // mostro il messaggio dell'errore
            spanError.style.display = 'block';

        }

        return false

    } //altrimenti
    else {
        return true
    }

}

/**
 * funzione che controlla il valore di input di name_modify
 * @returns boolean true and false
 */
function check_name_modify() {

    // salvo il valore dell'input
    const input = document.getElementById('name_modify').value.trim();

    // salvo l'elemento contenuto il messaggio d'errore
    const spanError = document.getElementById('name_error_modify');

    // salvo il pattern d'errore
    const regex = /[0-9]/g;

    // salvo l'elemento di errore lato back
    const errorBack = document.getElementById('name_error_back_modify');

    // se valore  e meno di tre carratteri o piu di 50 carratteri o combacciao con un dei carratteri
    if (input.length < 3 || input.match(regex) || input.length > 50) {

        // non esiste l'errore lato back
        if (!errorBack) {

            // cambio il colore del bordo dell'input
            document.getElementById('name_modify').style.borderColor = 'red';

            // mostro il messaggio dell'errore
            spanError.style.display = 'block';
        }

        return false

    } //altrimenti
    else {
        return true
    }

}

/**
 * funzione che appena immetti i carratteri controlla se puo nascodere gli errori
 */
function hide_name_error() {

    // salvo il valore dell'input
    const input = document.getElementById('name').value.trim();

    // salvo l'elemento contenuto il messaggio d'errore
    const spanError = document.getElementById('name_error')

    // salvo il pattern d'errore
    const regex = /[0-9]/g;

    // salvo l'elemento di errore lato back
    const errorBack = document.getElementById('name_error_back');

    // se la lunghezza e maggiore di tre carratteri, minore di 50 e che combaccia con la regex
    if (input.length > 3 && !input.match(regex) && input.length < 50) {
        document.getElementById('name').classList.remove(['is-invalid']);

        // se esiste l'errore lato back
        if (errorBack) {

            // nacondo l'errore lato back
            errorBack.style.display = 'none';

            // rimuovo la classe border-danger dall'input
            document.getElementById('name').classList.remove(['border-danger']);

        }

        // nascondo gli errori
        document.getElementById('name').style.borderColor = '';
        spanError.style.display = 'none';
    }
}

/**
 * funzione che appena immetti icarratteri nell'input controlla se puo nacondere gli errori
 */
function hide_name_error_modify() {

    // salvo il valore dell'input
    const input = document.getElementById('name_modify').value.trim();

    // salvo l'elemento contenuto il messaggio d'errore
    const spanError = document.getElementById('name_error_modify');

    // salvo il pattern d'errore
    const regex = /[0-9]/g;

    // salvo l'elemento di errore lato back
    const errorBack = document.getElementById('name_error_back_modify');

    // se la lunghezza e maggiore di tre carratteri, minore di 50 e che combaccia con la regex
    if (input.length > 3 && !input.match(regex) && input.length < 50) {

        // tolgo la classe is-invalid dell'input    
        document.getElementById('name_modify').classList.remove(['is-invalid']);

        // se esiste l'errore lato back 
        if (errorBack) {

            // naco l'errore lato back
            errorBack.style.display = 'none';

            // rimuovo la classe border-danger dall'input
            document.getElementById('name_modify').classList.remove(['border-danger']);
        }

        // nascondo gli errori
        document.getElementById('name_modify').style.borderColor = '';
        spanError.style.display = 'none';
    }
}




function checkFormCreate(e) {

    //salvo il bottone di conferma e di loading per la creazione
    const btnEl = document.getElementById('allergy_btn');
    const btnLoading = document.getElementById('btn_loading');

    // aggiungo un evento di ascolto al click
    btnEl.addEventListener('click', (e) => {

        // il bottone di conferma lo nascondiamo
        btnEl.style.display = 'none';

        // il bottone di loading lo mostriamo
        btnLoading.style.display = 'block';

        //se il valore e false di check_name
        if (!check_name()) {

            // prevengo l'evento
            e.preventDefault()

            // bottone di conferma lo mostriamo
            btnEl.style.display = 'block';

            // bottone di caricamento lo nascondiamo
            btnLoading.style.display = 'none';
        }
    })
}

function checkFromModify(e) {

    //salvo il bottone di conferma e di loading per la modifica
    const btnElModify = document.getElementById('allergy_btn_modify');
    const btnLoadingModify = document.getElementById('btn_loading_modify');

    // il bottone di conferma lo nascondiamo
    btnElModify.style.display = 'none';

    // il bottone di loading lo mostriamo
    btnLoadingModify.style.display = 'block';

    //se il valore e false di check_name_modify
    if (!check_name_modify()) {

        // prevengo l'evento
        e.preventDefault()

        // bottone di conferma lo mostriamo
        btnElModify.style.display = 'block';

        // bottone di caricamento lo nascondiamo
        btnLoadingModify.style.display = 'none';

    } else {

        //prendo l'id dell'allergia
        const index = localStorage.getItem('id-allergy');


        // prendo l'url
        const url = document.getElementById('modify_update_form').getAttribute('action');

        // splitto l'url
        let array = url.split('/');

        // ricavo l'ultimo id dell'array
        const idArray = array.length - 1;

        // prendo la lunghezza dell'ultimo valore array
        const sliceNumber = array[idArray].length;

        // modifico url salvandolo in un'altra variabile
        const newUrl = url.slice(0, -sliceNumber) + index;

        // setto l'action del form con il nuovo url
        document.getElementById('modify_update_form').setAttribute('action', newUrl);
    }
}

/**
 * funzione che chiude la sessione
 */
function closeSession() {

    // nascondo la sessione
    document.getElementById('session').style.opacity = '0';
    document.getElementById('session').style.height = '0px';
    document.getElementById('session').style.marginBottom = '0px';

}

/**
 * funzione che mostra e nasconde il form di modifica
 * @param {String} allergy il nome dell'allergia
 * @param {Number} index del bottone
 * @param {Number} id dell'allergia
 */
function showModify(allergy, index, id) {

    /* 
    se non esiste niente di salvato o se index del bottone e uguale a quello salvato nel local storage 
    */
    if (localStorage.getItem('allergy-index') === null || localStorage.getItem('allergy-index') == index) {

        //setto il valore del local storage con id dell'allergia
        localStorage.setItem('id-allergy', id);

        // prendo il valore del attributo action del form 
        const formModify = document.getElementById('modify_update_form').getAttribute('action');

        // modifico url
        const url = formModify.slice(0, -1) + id;

        // setto l'attributo action del form
        document.getElementById('modify_update_form').setAttribute('action', url);


        // se il valore salvato e null
        if (localStorage.getItem('allergy-index') === null) {

            // setto il local storage con l'index del bottone
            localStorage.setItem('allergy-index', index);
        }//altrimenti 
        else {

            // rimuovo l'elemento
            localStorage.removeItem('allergy-index');
        }

        // controllo se allergia che passa non e indefinita
        if (allergy !== false) {

            // prendo l'input del nome per il form di modifica
            const el = document.querySelector("#form_modify_allergy > form > .form-floating > #name_modify")

            // il valore dell'input e uguale al valore come allergy
            el.value = allergy;
        }

        // i form di creazione di modifica delle allergie
        const formCreateEl = document.getElementById('form_create_allergy');
        const formModifyEl = document.getElementById('form_modify_allergy');

        // bottoni di creazione e modifica delle allergie
        const btnModifyAction = document.querySelectorAll('.btn_modify')[index];
        const btnCreateAction = document.querySelectorAll('.btn_create_action')[index];

        // salvo il valore di opacity del form
        const result = formCreateEl.style.opacity

        // se result e diverso da 0
        if (result !== "0") {

            // style per il form di creazione di allergia
            formCreateEl.style.transition = 'height 1s, opacity 1s';
            formCreateEl.style.transitionDelay = "height 1s";
            formCreateEl.style.opacity = '0';
            formCreateEl.style.height = '0px';
            formCreateEl.style.display = 'none';

            // style per il form di modifica di allergia
            formModifyEl.style.transitionDelay = 'height 1s';
            formModifyEl.style.opacity = '1';
            formModifyEl.style.height = '100%';
            formModifyEl.style.display = 'block'

            // style per il bottone di creazione di allergia
            btnCreateAction.style.opacity = '1';
            btnCreateAction.style.width = '41px';
            btnCreateAction.style.padding = '0.375rem 0.75rem';


            // style per il bottone di modifica di allergia
            btnModifyAction.style.opacity = '0';
            btnModifyAction.style.width = '0%';
            btnModifyAction.style.padding = '0px';


        } //altrimenti se opacita del form di creazione e 0
        else if (formCreateEl.style.opacity === "0") {

            formCreateEl.style.display = ''
            formCreateEl.style.opacity = '1';
            formCreateEl.style.height = '100%';

            // style per il form di modifica di allergia
            formModifyEl.style.transitionDelay = 'height 1s';
            formModifyEl.style.opacity = '0';
            formModifyEl.style.height = '0';
            formModifyEl.style.display = 'none'

            // style per il bottone di creazione di allergia
            btnCreateAction.style.opacity = '0';
            btnCreateAction.style.width = '0';
            btnCreateAction.style.padding = '0';


            // style per il bottone di modifica di allergia
            btnModifyAction.style.opacity = '1';
            btnModifyAction.style.width = '41px';
            btnModifyAction.style.padding = '0.375rem 0.75rem';
        }


    }
}

/**
 * quando cambio pagina viene cancellato il local storage
 */
window.onbeforeunload = function () {
    localStorage.removeItem('allergy-index');

}


