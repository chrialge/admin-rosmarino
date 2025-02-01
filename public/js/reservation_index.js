function closeSession() {
    document.getElementById('session').style.opacity = '0';
    document.getElementById('session').style.height = '0px';
    document.getElementById('session').style.marginBottom = '0px';

}


function showCheckBox(e) {


    const input = document.querySelectorAll('.form-check-input');
    const array = []
    if (input[0].checked) {

        array.push(input[0].value);
    } else {

        input.forEach((element) => {
            if (element.checked) {
                array.push(element.value)
            }
        })
    }
    const url = document.getElementById('send_email').getAttribute('href');
    const newUrl = url.split('/');
    newUrl[newUrl.length - 1] = array
    newUrl[1] = "/"
    const urlComplete = newUrl.join('/')

    document.getElementById('send_email').setAttribute('href', urlComplete);

    if (array.length == 0) {


    }
}


function allChecked() {
    const input = document.querySelectorAll('.form-check-input');
    const selectAll = document.getElementById('select-all')



    if (selectAll.checked) {
        document.getElementById('send_email').style.display = '';

        input.forEach((element) => {
            element.checked = true;
            element.setAttribute('aria-checked', true);

        })
    } else {
        document.getElementById('send_email').style.display = 'none';

        input.forEach((element) => {
            element.checked = false
            element.setAttribute('aria-checked', false);

        })
    }
}

function showLoading() {
    const dd = document.getElementById('btn_send_customer').style.display = 'none';
    const ff = document.getElementById('btn_loading_customer').style.display = '';


}

function showBtn(count) {

    const input = document.querySelectorAll('.form-check-input');
    const array = []

    input.forEach((element) => {
        if (element.checked && element.value != 'all') {
            array.push(element.value)
            document.getElementById('send_email').style.display = '';

        }
    })
    console.log(array);
    console.log(count, array.length, input.length)

    if (array.length == 0) {

        document.getElementById('send_email').style.display = 'none';

    } else if (array.length == (input.length - 1) && count < 9) {
        document.getElementById('select-all').setAttribute('aria-checked', true);
        document.getElementById('select-all').checked = true;

    } else {
        document.getElementById('select-all').setAttribute('aria-checked', false);
        document.getElementById('select-all').checked = false;



    }
}