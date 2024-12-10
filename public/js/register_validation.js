function check_name() {
    const input = document.getElementById('name').value.trim();
    const icon = document.querySelector(".login__icon");
    const error_span = document.querySelector(".error_name_js")
    const regex = /[0-9]/g;



    if (input.length < 3 || input.match(regex) || input.length > 255) {
        document.getElementById('name').style.borderColor = 'red';
        icon.style.color = "red";
        error_span.style.display = "block";
        return false
    } else {
        return true
    }

}

function check_email() {
    const input = document.getElementById('email').value.trim();
    const icon = document.querySelector(".fa-envelope");
    const error_span = document.querySelector(".error_email_js")

    if (input.length < 3 || !input.includes('@') || input.length > 255) {
        document.getElementById('email').style.borderColor = 'red';
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
        document.getElementById("password").style.borderColor = "red";
        document.getElementById("password-confirm").style.borderColor = "red";
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

function hide_name_error() {

    const input = document.getElementById('name').value.trim();
    const icon = document.querySelector(".login__icon");
    const error_span = document.querySelector(".error_name_js")
    const regex = /[0-9]/g;

    if (input.length > 3 || !input.match(regex)) {
        document.getElementById('name').style.borderColor = '';
        icon.style.color = "";
        error_span.style.display = "none";
    }
}

function hide_email_error() {
    const input = document.getElementById('email').value.trim();
    const icon = document.querySelector(".fa-envelope");
    const error_span = document.querySelector(".error_email_js")

    if (input.length > 3 || input.includes('@') || input.length < 255) {
        document.getElementById('email').style.borderColor = '';
        icon.style.color = "";
        error_span.style.display = "none";
    }
}

function hide_pw_error() {

    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("password-confirm").value;
    const error_span = document.querySelector(".error_pw_js");
    const icons = document.querySelectorAll('.fa-lock');
    const iconsEye = document.querySelectorAll('.register_pass')

    if (confirmPassword == "" || password == confirmPassword) {
        document.getElementById("password").style.borderColor = "";
        document.getElementById("password-confirm").style.borderColor = "";
        error_span.style.display = "none";

        for (let index = 0; index < icons.length; index++) {
            const elementEye = iconsEye[index]
            const element = icons[index];

            elementEye.style.color = ""
            element.style.color = "";
        }
    }
}


setTimeout(() => {
    document.getElementById('register_input').addEventListener('click', function (e) {

        if (!check_name) {
            e.preventDefault();
        }
        if (!check_email) {
            e.preventDefault();
        }
        if (!check_pw) {
            e.preventDefault();
        }
    })

    const iconPw = document.querySelectorAll(".showPassword");

    for (let index = 0; index < iconPw.length; index++) {
        const element = iconPw[index];

        element.addEventListener('click', function (e) {

            if (e.target.classList[1] === "fa-eye") {
                document.getElementById('password').setAttribute('type', 'text');
                e.target.setAttribute('class', 'fa-solid fa-eye-slash register_pass login__icon showPassword');

            } else {
                document.getElementById('password').setAttribute('type', 'password');
                e.target.setAttribute('class', 'fa-solid fa-eye register_pass login__icon showPassword');


            }
        })
    }

}, 100);


