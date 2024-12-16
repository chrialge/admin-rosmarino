function check_name() {

    const input = document.getElementById('customer_name');
    const error = document.getElementById('name_error');
    const regex = /[^a-zA-Z]/;


    if (input.value.match(regex) || input.value.length < 3 || input.value.length > 100) {
        error.style.display = 'block';
        input.style.borderColor = "red";
        return true;
    } else {
        return false
    }
}

function check_last_name() {
    const input = document.getElementById('customer_last_name');
    const error = document.getElementById('last_name_error');
    const regex = /[^a-zA-Z]/;

    if (input.value.match(regex) || input.value.length < 3 || input.value.length > 100) {
        error.style.display = 'block';
        input.style.borderColor = "red";
        return true;
    } else {
        return false;
    }
}

function check_email() {
    const input = document.getElementById('customer_email');
    const error = document.getElementById('email_error');
    const regex = /[^a-zA-Z0-9@.]/;


    if (input.value.match(regex) || input.value.length < 3 || input.value.length > 255) {
        error.style.display = 'block';
        input.style.borderColor = "red";
        return true;
    } else {
        return false
    }
}

function check_telephone() {
    const input = document.getElementById('customer_telephone');
    const error = document.getElementById('telephone_error');
    const regex = /[^+0-9]/;


    if (input.value.match(regex) || input.value.length < 6 || input.value.length > 20) {
        error.style.display = 'block';
        input.style.borderColor = "red";
        return true;
    } else {
        return false;
    }

}

function check_telephone_customer() {
    const input = document.getElementById('telephone');
    const error = document.getElementById('telephone_error_error');
    const regex = /[^+0-9]/;


    if (input.value.match(regex) || input.value.length > 20) {
        error.style.display = 'block';
        input.style.borderColor = "red";
        return true;
    } else {
        return false;
    }

}

function check_person() {

    const input = document.getElementById('person');
    const error = document.getElementById('person_error');
    const regex = /[^0-9]/;

    if (input.value.match(regex) || parseInt(input.value) < 0 || parseInt(input.value) > 150) {
        error.style.display = 'block';
        input.style.borderColor = "red";
        return true;
    } else {
        return false;
    }

}


function hide_name_error() {

    const input = document.getElementById('customer_name');
    const error = document.getElementById('name_error');
    const regex = /[^a-zA-Z]/;

    if (input.value.length > 3 || input.value.length < 100) {

        if (input.value.match(regex)) {

        } else {
            error.style.display = 'none';
            input.style.borderColor = "";
        }

    }
}

function hide_last_name_error() {

    const input = document.getElementById('customer_last_name');
    const error = document.getElementById('last_name_error');
    const regex = /[^a-zA-Z]/;

    if (input.value.length > 3 || input.value.length < 100) {

        if (input.value.match(regex)) {

        } else {
            error.style.display = 'none';
            input.style.borderColor = "";
        }

    }
}

function hide_email_error() {

    const input = document.getElementById('customer_email');
    const error = document.getElementById('email_error');
    const regex = /[^a-zA-Z0-9@.]/;

    if (input.value.length > 3 || input.value.length < 255) {

        if (input.value.match(regex)) {

        } else {
            error.style.display = 'none';
            input.style.borderColor = "";
        }

    }

}


function hide_telephone_error() {

    const input = document.getElementById('telephone');
    const error = document.getElementById('telephone_error_customer');
    const regex = /[^+0-9]/;

    if (input.value.length > 6 || input.value.length < 20) {

        if (input.value.match(regex)) {

        } else {
            error.style.display = 'none';
            input.style.borderColor = "";
        }

    }


}

function hide_telephone_error_customer() {

    const input = document.getElementById('customer_telephone');
    const error = document.getElementById('telephone_error');
    const regex = /[^+0-9]/;

    if (input.value.length < 20) {

        if (input.value.match(regex)) {

        } else {
            error.style.display = 'none';
            input.style.borderColor = "";
        }

    }


}

function hide_person_error() {

    const input = document.getElementById('person');
    const error = document.getElementById('person_error');
    const regex = /[^0-9]/;

    if (parseInt(input.value) > 0 || parseInt(input.value) < 150) {

        if (input.value.match(regex)) {

        } else {
            error.style.display = 'none';
            input.style.borderColor = "";
        }

    }
}


function check_validation(e) {

    const btnCreate = document.getElementById('btn_edit_reservation');
    const btnLoading = document.getElementById('btn_loading')
    btnCreate.style.display = 'none';
    btnLoading.style.display = '';

    if (check_name()) {
        e.preventDefault()
        btnCreate.style.display = '';
        btnLoading.style.display = 'none';

    }

    if (check_last_name()) {
        e.preventDefault()
        btnCreate.style.display = '';
        btnLoading.style.display = 'none';
    }

    if (check_email()) {
        e.preventDefault()
        btnCreate.style.display = '';
        btnLoading.style.display = 'none';
    }
    if (check_telephone()) {

        e.preventDefault()
        btnCreate.style.display = '';
        btnLoading.style.display = 'none';
    }
    if (check_person()) {
        e.preventDefault()
        btnCreate.style.display = '';
        btnLoading.style.display = 'none';
    }
}