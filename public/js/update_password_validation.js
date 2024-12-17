
function check_current_password(password) {

    console.log(password)

    const inputEl = document.getElementById('current_password').value;
    console.log(inputEl)

}

function hide_error_password() {

    const passwordEl = document.getElementById('password_confirmation');
    const passwordConfirmationEl = document.getElementById('password_new');
    const spanErrorEl = document.getElementById('password_error');


    if (passwordConfirmationEl.value == passwordEl.value) {
        passwordConfirmationEl.style.borderColor = '';
        passwordEl.style.borderColor = '';
        spanErrorEl.style.display = 'none';


    }

}


function check_password() {

    const passwordEl = document.getElementById('password_confirmation');
    const passwordConfirmationEl = document.getElementById('password_new');
    const spanErrorEl = document.getElementById('password_error');


    if (passwordConfirmationEl.value != passwordEl.value || passwordConfirmationEl.value.length == 0) {
        passwordConfirmationEl.style.borderColor = 'red';
        passwordEl.style.borderColor = 'red';
        spanErrorEl.style.display = '';

        return false
    } else {
        return true;
    }

}

function check_ever(e) {
    e.preventDefault();
    const btnEl = document.getElementById('btn_save');
    const btnLoadingEl = document.getElementById('btn_loading');
    btnEl.style.display = 'none';
    btnLoadingEl.style.display = '';

    if (!check_password()) {

        btnEl.style.display = '';
        btnLoadingEl.style.display = 'none';
    }



}