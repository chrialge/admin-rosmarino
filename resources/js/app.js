import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
// importo flatpickr ('libreria per gli input di tipo time aand date')
import flatpickr from "flatpickr";
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

if (document.getElementById('date_customer')) {

    let calendar = flatpickr("#date_customer", {
        dateFormat: "Y-m-d",


    })

} else if (document.getElementById('date')) {
    // uso la libreia flatpicker per input date
    let calendar = flatpickr("#date", {
        dateFormat: "Y-m-d",
        minDate: "today",

    })

    // uso la libreia flatpicker per input time
    let time = flatpickr("#time", {

        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    })
}