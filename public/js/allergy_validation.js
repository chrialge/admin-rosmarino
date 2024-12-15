
function check_name() {
    const input = document.getElementById('name').value.trim();
    const spanError = document.getElementById('name_error')
    const regex = /[0-9]/g;
    const errorBack = document.getElementById('name_error_back');




    if (input.length < 3 || input.match(regex) || input.length > 50) {
        if (!errorBack) {
            document.getElementById('name').style.borderColor = 'red';
            spanError.style.display = 'block';

        }
        return false

    } else {
        return true
    }

}

function check_name_modify() {
    const input = document.getElementById('name_modify').value.trim();
    const spanError = document.getElementById('name_error_modify')
    const regex = /[0-9]/g;
    const errorBack = document.getElementById('name_error_back_modify');




    if (input.length < 3 || input.match(regex) || input.length > 50) {
        if (!errorBack) {
            document.getElementById('name_modify').style.borderColor = 'red';
            spanError.style.display = 'block';

        }
        return false

    } else {
        return true
    }

}

function hide_name_error() {

    const input = document.getElementById('name').value.trim();
    const spanError = document.getElementById('name_error')
    const regex = /[0-9]/g;
    const errorBack = document.getElementById('name_error_back');


    if (input.length > 3 && !input.match(regex) && input.length < 50) {
        document.getElementById('name').classList.remove(['is-invalid']);

        if (errorBack) {
            errorBack.style.display = 'none';
            document.getElementById('name').classList.remove(['border-danger']);

        }
        document.getElementById('name').style.borderColor = '';
        spanError.style.display = 'none';
    }
}


function hide_name_error_modify() {

    const input = document.getElementById('name_modify').value.trim();
    const spanError = document.getElementById('name_error_modify')
    const regex = /[0-9]/g;
    const errorBack = document.getElementById('name_error_back_modify');

    if (input.length > 3 && !input.match(regex) && input.length < 50) {
        document.getElementById('name_modify').classList.remove(['is-invalid']);
        if (errorBack) {
            errorBack.style.display = 'none';
            document.getElementById('name_modify').classList.remove(['border-danger']);
        }
        document.getElementById('name_modify').style.borderColor = '';
        spanError.style.display = 'none';
    }
}



setTimeout(() => {
    // console.log(document.querySelector("#allergy_btn"));
    const btnEl = document.getElementById('allergy_btn');
    const btnLoading = document.getElementById('btn_loading');

    btnEl.addEventListener('click', (e) => {

        btnEl.style.display = 'none';
        btnLoading.style.display = 'block';

        console.log(check_name())

        if (!check_name()) {
            e.preventDefault()
            btnEl.style.display = 'block';
            btnLoading.style.display = 'none';

        }


    })

    const btnElModify = document.getElementById('allergy_btn_modify');
    const btnLoadingModify = document.getElementById('btn_loading_modify');


    btnElModify.addEventListener('submit', (e) => {

        console.log('ciao')
        btnElModify.style.display = 'none';
        btnLoadingModify.style.display = 'block';

        if (!check_name_modify()) {
            e.preventDefault()
            btnElModify.style.display = 'block';
            btnLoadingModify.style.display = 'none';

        } else {

            const index = localStorage.getItem('id-allergy');
            const gg = document.getElementById('form_modify_allergy').setAttribute('action', `http://127.0.0.1:8000/admin/allergy/${index}`);
            console.log(gg)

        }
    })

}, 100);


function closeSession() {
    document.getElementById('session').style.opacity = '0';
    document.getElementById('session').style.height = '0px';
    document.getElementById('session').style.marginBottom = '0px';

}

function showModify(allergy, index, id) {

    if (localStorage.getItem('allergy-index') === null || localStorage.getItem('allergy-index') == index) {

        localStorage.setItem('id-allergy', id);
        const gg = document.getElementById('modify_update_form').getAttribute('action');
        const url = gg.slice(0, -1) + id;
        document.getElementById('modify_update_form').setAttribute('action', url);


        if (localStorage.getItem('allergy-index') === null) {
            localStorage.setItem('allergy-index', index);
        } else {
            localStorage.removeItem('allergy-index');
        }

        // controllo se allergia che passa non e indefinita
        if (allergy !== false) {
            const el = document.querySelector("#form_modify_allergy > form > .form-floating > #name_modify")

            el.value = allergy;
        }

        // i form di creazione di modifica delle allergie
        const formCreateEl = document.getElementById('form_create_allergy');
        const formModifyEl = document.getElementById('form_modify_allergy');

        // bottoni di creazione e modifica delle allergie
        const btnModifyAction = document.querySelectorAll('.btn_modify')[index];
        const btnCreateAction = document.querySelectorAll('.btn_create_action')[index];

        const result = formCreateEl.style.opacity

        if (result !== "0") {

            // style per il form di creazione di allergia
            formCreateEl.style.transition = 'height 1s, opacity 1s';
            formCreateEl.style.transitionDelay = "height 1s";
            formCreateEl.style.opacity = '0';
            formCreateEl.style.height = '0px';

            // style per il form di modifica di allergia
            formModifyEl.style.transitionDelay = 'height 1s';
            formModifyEl.style.opacity = '1';
            formModifyEl.style.height = '100%';

            // style per il bottone di creazione di allergia
            btnCreateAction.style.opacity = '1';
            btnCreateAction.style.width = '41px';
            btnCreateAction.style.padding = '0.375rem 0.75rem';


            // style per il bottone di modifica di allergia
            btnModifyAction.style.opacity = '0';
            btnModifyAction.style.width = '0%';
            btnModifyAction.style.padding = '0px';


        } else if (formCreateEl.style.opacity === "0") {

            formCreateEl.style.display = ''



            formCreateEl.style.opacity = '1';
            formCreateEl.style.height = '100%';

            // style per il form di modifica di allergia
            formModifyEl.style.transitionDelay = 'height 1s';
            formModifyEl.style.opacity = '0';
            formModifyEl.style.height = '0';

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


window.onbeforeunload = function () {
    localStorage.removeItem('allergy-index');

}


