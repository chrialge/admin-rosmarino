console.log('ciao')
function check_name() {

    const input = document.getElementById("name");
    const error = document.getElementById('name_error');
    const regex = /[0-9]/g;


    if (input.value.length < 3 || input.value.match(regex) || input.value.lengyh > 100) {

        input.style.border = '2px solid red';
        error.style.display = 'block';
        return true;
    } else {
        return false;
    }

}

function check_price() {

    const input = document.getElementById("price");
    const error = document.getElementById('price_error');
    const regex = /[^0-9,.]/;

    if (input.value.match(regex) || parseFloat(input.value) > 9999.99 || parseFloat(input.value) < 0.01) {


        input.style.border = '2px solid red';
        error.style.display = 'block';
        return true;
    } else {
        return false;
    }
}

function check_typology() {
    const input = document.getElementById("typology");
    const error = document.getElementById('typology_error');

    if (input.value.length < 1) {
        input.style.border = '2px solid red';
        error.style.display = 'block';
        return true;
    } else {
        return false;
    }
}

function hide_error_name() {

    const input = document.getElementById('name');
    const error = document.getElementById('name_error');
    const regex = /[0-9]/g;



    if (input.value.length > 3 || input.value.length < 100) {
        if (input.value.match(regex)) {

        } else {
            input.style.border = '';
            error.style.display = 'none';
        }



    }

}

function hide_error_price() {

    const input = document.getElementById("price");
    const error = document.getElementById('price_error');
    const regex = /[^0-9]/;

    if (parseFloat(input.value) < 9999.99 || parseFloat(input.value) > 0.01 || input.value.length < 1) {

        if (input.value.match(regex)) {

        } else {
            input.style.border = '';
            error.style.display = 'none';
        }


    }
}

function hide_error_typology() {
    const input = document.getElementById("typology");
    const error = document.getElementById('typology_error');

    if (input.value.length > 0) {

        input.style.border = '';
        error.style.display = 'none';
    }


}



function check_validation(e) {


    const btnCreate = document.getElementById('btn_edit_plate');
    const btnLoading = document.getElementById('btn_loading')
    btnCreate.style.display = 'none';
    btnLoading.style.display = '';




    if (!check_name()) {
        e.preventDefault()
        btnCreate.style.display = '';
        btnLoading.style.display = 'none';
    }

    if (!check_price()) {
        e.preventDefault()
        btnCreate.style.display = '';
        btnLoading.style.display = 'none';
    }

    if (!check_typology()) {
        e.preventDefault()
        btnCreate.style.display = '';
        btnLoading.style.display = 'none';
    }
}