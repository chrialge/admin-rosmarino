// importo flatpickr ('libreria per gli input di tipo time aand date')
import flatpickr from "flatpickr";

// salvo il valore dell'elemento con l'id "date"
let dateValue = document.getElementById('date')

console.log(dateValue);


let calendar = flatpickr("#date", {
    dateFormat: "d/m/Y",
    minDate: "today",

})


let time = flatpickr("#time", {

    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
})




