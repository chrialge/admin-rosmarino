function check_form(e) {



    const btnCreate = document.getElementById('btn_mail');
    const btnLoading = document.getElementById('btn_loading');

    btnCreate.style.display = "none";
    btnLoading.style.display = "";

    if (!check_object()) {
        e.preventDefault();

        btnCreate.style.display = "";
        btnLoading.style.display = "none";
    }

    if (!check_message()) {
        e.preventDefault();

        btnCreate.style.display = "";
        btnLoading.style.display = "none";
    }
}



function check_object() {

    const valueInput = document.getElementById('object').value.trim()
    const error = document.getElementById('error_object')

    if (valueInput.length == 0) {
        document.getElementById('object').style.borderColor = "red";
        error.style.display = '';

        return false;
    } else {
        return true;
    }
}

function hide_error_object() {

    const valueInput = document.getElementById('object').value.trim();
    const error = document.getElementById('error_object')

    if (valueInput.length > 0) {
        document.getElementById('object').style.borderColor = "";
        error.style.display = 'none';
    }
}

function check_message() {

    const valueInput = document.getElementById('message').value.trim();
    const error = document.getElementById('error_message');

    if (valueInput.length == 0) {
        document.getElementById('message').style.borderColor = "red";
        error.style.display = 'block';


        return false;
    } else {
        return true;
    }


}

function hide_error_message() {

    const valueInput = document.getElementById('message').value.trim();
    const error = document.getElementById('error_message');

    if (valueInput.length > 0) {

        document.getElementById('message').style.borderColor = "";
        error.style.display = 'none';
    }
}

function message_line(e) {
    const lines = document.querySelector('#lines');
    e.target.style.height = "0px";
    e.target.style.height = (e.target.scrollHeight) + "px";
    lines.style.marginTop = (-e.target.scrollHeight - 7) + "px";
    let str = '';
    e.target.value.split('\n').forEach(() => {
        str += '<div class="line"></div>';
    })

    lines.innerHTML = str;
}