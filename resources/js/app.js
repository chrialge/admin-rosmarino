import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])



// aspetto che si sia ricaricata tutta la pagina 
window.addEventListener('load', function () {

    // dopo 3 secondi viene mandato
    setTimeout(() => {
        const loading = document.getElementById('loading_app');
        loading.style.transition = 'transform 0.7s'
        loading.style.transform = 'translateX(500%)';

        const app = document.getElementById('app');
        if (app) {
            app.style.display = 'block';
        }



        // dopo 0.4 viene mandato
        setTimeout(() => {
            loading.style.display = 'none'
        }, 400)
    }, 2000)
});