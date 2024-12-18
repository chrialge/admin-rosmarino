function check_email() {
    const input = document.getElementById('email').value.trim();
    const icon = document.querySelector(".fa-envelope");
    const error_span = document.querySelector(".error_email_js")

    if (input.length < 3 || !input.includes('@') || input.length > 255) {
        document.getElementById('email_container').style.borderColor = 'red';
        document.getElementById('email_container').style.margin = '0'
        icon.style.color = "red";
        error_span.style.display = "block";
        return false;
    } else {
        return true
    }
}

function check_pw() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("password-confirm").value;
    const error_span = document.querySelector(".error_pw_js");
    const icons = document.querySelectorAll('.fa-lock');
    const iconsEye = document.querySelectorAll('.register_pass')


    if (confirmPassword !== "" && password !== confirmPassword) {
        document.getElementById("container_password_confirmation").style.borderColor = "red";
        document.getElementById("container_password").style.borderColor = "red";
        document.getElementById("container_password_confirmation").style.margin = '0'
        error_span.style.display = "block";

        for (let index = 0; index < icons.length; index++) {
            const elementEye = iconsEye[index]
            const element = icons[index];

            elementEye.style.color = "red"
            element.style.color = "red";
        }

        return false
    } else if (password === confirmPassword) {
        return true
    }
}

function hide_email_error() {
    const input = document.getElementById('email').value.trim();
    const icon = document.querySelector(".fa-envelope");
    const error_span = document.querySelector(".error_email_js")

    if (input.length > 3 || input.includes('@') || input.length < 255) {
        document.getElementById('email_container').style.borderColor = '';
        document.getElementById('email_container').style.margin = ''

        icon.style.color = "";
        error_span.style.display = "none";
    }
}

function hide_error_pw() {

    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("password-confirm").value;
    const error_span = document.querySelector(".error_pw_js");
    const icons = document.querySelectorAll('.fa-lock');
    const iconsEye = document.querySelectorAll('.register_pass')

    if (confirmPassword == "" || password == confirmPassword) {
        document.getElementById("container_password_confirmation").style.borderColor = "";
        document.getElementById("container_password").style.borderColor = "";
        document.getElementById("container_passwor_confirmation").style.margin = '';

        error_span.style.display = "none";

        for (let index = 0; index < icons.length; index++) {
            const elementEye = iconsEye[index]
            const element = icons[index];

            elementEye.style.color = ""
            element.style.color = "";
        }
    }
}

function showPassword(e, id) {

    console.log(id)
    if (e.target.classList[1] === "fa-eye") {
        document.getElementById(`${id}`).setAttribute('type', 'text');
        e.target.setAttribute('class', 'fa-solid fa-eye-slash icon_pass login_icon showPassword');

    } else {
        document.getElementById(`${id}`).setAttribute('type', 'password');
        e.target.setAttribute('class', 'fa-solid fa-eye icon_pass login_icon showPassword');

    }
}


function check_ever(e) {

    const btn = document.getElementById('reset_btn');
    const btnLoading = document.getElementById('btn_loading');

    btn.style.display = 'none';
    btnLoading.style.display = ''

    if (!check_email()) {
        e.preventDefault();
        btn.style.display = '';
        btnLoading.style.display = 'none'
    }

    if (!check_pw) {
        e.preventDefault();
        btn.style.display = '';
        btnLoading.style.display = 'none'
    }
}