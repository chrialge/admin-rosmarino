

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

function hide_name_error() {

    const input = document.getElementById('name').value.trim();
    const spanError = document.getElementById('name_error')
    const regex = /[0-9]/g;
    const errorBack = document.getElementById('name_error_back');


    if (input.length > 3 && !input.match(regex) && input.length < 50) {
        document.getElementById('name').classList, remove(['is-invalid', 'border-danger']);
        errorBack.style.display = 'none';
        document.getElementById('name').style.borderColor = '';
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

}, 100);


function closeSession() {
    document.getElementById('session').style.opacity = '0';
    document.getElementById('session').style.height = '0px';
    document.getElementById('session').style.marginBottom = '0px';

    setTimeout(() => {


    }, 300);

}
