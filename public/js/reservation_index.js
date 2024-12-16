function closeSession() {
    document.getElementById('session').style.opacity = '0';
    document.getElementById('session').style.height = '0px';
    document.getElementById('session').style.marginBottom = '0px';

}


function showCheckBox() {

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
    const cc = document.getElementById('clients').value = array
    console.log(array, cc)
}

function allChecked() {
    const input = document.querySelectorAll('.form-check-input');
    const selectAll = document.getElementById('select-all')

    if (selectAll.checked) {
        console.log('ciao')

        input.forEach((element) => {
            element.setAttribute('checked', true);
        })
    } else {
        input.forEach((element) => {
            element.removeAttribute('checked')
        })
    }
}