import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])




window.addEventListener('load', function () {

    setTimeout(() => {
        const loading = document.getElementById('loading_app');
        loading.style.transition = 'transform 0.7s'
        loading.style.transform = 'translateX(500%)';

        const app = document.getElementById('app');
        app.style.display = 'block'
        app.style.transform = 'traslateY(100%)'


        setTimeout(() => {
            loading.style.display = 'none'
        }, 400)
    }, 3000)



});