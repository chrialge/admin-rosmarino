// importo flatpickr ('libreria per gli input di tipo time aand date')
import flatpickr from "flatpickr";

// salvo il valore dell'elemento con l'id "date"
let dateValue = document.getElementById('date')

// uso la libreia flatpicker per input date
let calendar = flatpickr("#date", {
    dateFormat: "d/m/Y",
    minDate: "today",

})

// uso la libreia flatpicker per input time
let time = flatpickr("#time", {

    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
})




