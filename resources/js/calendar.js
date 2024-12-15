// importo flatpickr ('libreria per gli input di tipo time aand date')
import flatpickr from "flatpickr";

// salvo il valore dell'elemento con l'id "date"
let dateValue = document.getElementById('date')

console.log(dateValue);

// // salvo l'elemento con l'id "travel_id"
// let eleselect = document.getElementById('travel_id')

// // salvo l'elemento con l'id "date"
// let dateel = document.getElementById('date');

// // se ce un valore nell'attributo 'data-value' dell'elemento con l'id "date"
// if (document.getElementById('date').dataset.value) {

//     // salvo il valore dell'attributo 'data-value dell'elemento con l'id "data-value"
//     let dateDataValue = document.getElementById('date').dataset.value

//     // se la stinga contiene '-'
//     if (dateDataValue.includes('/')) {

//         // salvo il valore della variabile 'dateDataValue' nella variabile 'dateValue'
//         dateValue = dateDataValue;

//     } else if (dateDataValue.includes('-')) {//altrimenti se contiene '-'
//         // salvo il risultato splittato
//         dateDataValue = dateDataValue.split('-')
//         // compongo la data e la salvo nella varibile 'dateValue'
//         dateValue = dateDataValue[2] + '/' + dateDataValue[1] + '/' + dateDataValue[0]

//     }





// }

// salvo il calendario dell'elemento con il selettore 'input[type='date']'
let calendar = flatpickr("#date", {
    dateFormat: "d/m/Y",
    minDate: "today",

})

let time = flatpickr("#time", {

    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
})


// // quando si clicca sull'elemento con l'id "date"
// dateel.addEventListener('click', function (e) {

//     // salvo l'emento con l'id "date"
//     let input = document.getElementById("date");

//     // salvo l'indice delle opzione scelta nel select con l'id "travel_id"
//     let index = eleselect.selectedIndex;

//     // salvo il valore della opzione selezionata
//     let value = eleselect.options[index].value;

//     // prevengo i comportamenti di default
//     e.preventDefault()

//     // se il valore della variabile 'value' e diverso da 'Select one'
//     if (value !== 'Select one') {

//         // try e catch per stampare eventuali errori
//         try {

//             // invoco la fuzione
//             asycCall(value);

//         } catch (error) {//se ci sono errori li cattura

//             // stampa gli errori
//             console.error(error);
//             // Expected output: ReferenceError: nonExistentFunction is not defined
//             // (Note: the exact output may be browser-dependent)
//         }

//     }
// })


// /**
//  * funzione rida una data che parte con il giorno corrente e cambia in base al parametro
//  * @param {number} addDay numero intero che aggiunge giorni alla data corrente
//  * @returns data
//  */
// function dateNow(addDay) {
//     var data = new Date();
//     var gg, mm, aaaa;
//     gg = data.getDate() + addDay + "/";
//     mm = data.getMonth() + 1 + "/";
//     aaaa = data.getFullYear();
//     return gg + mm + aaaa;
// }


