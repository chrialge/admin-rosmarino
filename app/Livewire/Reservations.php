<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservation;

class Reservations extends Component
{

    public $day = '';



    public function render()
    {
        // array con il nomi delle date
        $days = [
            'Lunedì',
            'Martedì',
            'Mercoledì',
            'Giovedì',
            'Venerdì',
            'Sabato',
            'Domenica'
        ];

        // la data di oggi
        $dateNow = date('Y-m-d');

        // variabile di inizio giorno della settimana
        $staticstart = null;

        // variabile di fine giorno della settimana
        $staticfinish = null;

        // array per le date
        $array = [];




        // se la data di oggi e uguale all'ultimo lunedi
        if ($dateNow == date('Y-m-d', strtotime('Monday'))) {

            // inizo della settimana e uguale ad oggi
            $staticstart = $dateNow;

            // pusho nell'array inizio della settimana
            array_push($array, $staticstart);

            // itero per tutti i giorni della settimana
            for ($i = 1; $i < 7; $i++) {

                $dateWeek = date("Y-m-d", strtotime($staticstart . " +$i days"));

                // pusho il giorno nell'array
                array_push($array, $dateWeek);
            }
        } else {

            // l'inizio della settimana e uguale all'ultimo lunedi
            $staticstart = date('Y-m-d', strtotime('last Monday'));

            // pusho l'inizio della settimana
            array_push($array, $staticstart);

            // itero per tutti i giorni della settimana
            for ($i = 1; $i < 7; $i++) {

                $dateWeek = date("Y-m-d", strtotime($staticstart . " +$i days"));

                // pusho il giorno nell'array
                array_push($array, $dateWeek);
            }
        }

        // se oggi e l'ultimo giorno salvato nell'array dei giorni
        if ($dateNow == $array[count($array) - 1]) {

            // salvo come ultimo giorno della settimna oggi
            $staticfinish = $dateNow;
        } else {

            // salvo la prossima domenica
            $staticfinish = date('Y-m-d', strtotime('next Sunday'));
        }



        // se contiene qualcosa l'istanza
        if (strlen($this->day) >= 1) {

            // prendo le prenotazione con lo stesso giorno scelto
            $reservations = Reservation::whereDate('date', $this->day)->orderByDesc('id')->paginate(9);

            // passo il numero delle prenotazione
            $count = Reservation::whereDate('date', $this->day)->count();

            // passo le prenotazione come array
            $cc = Reservation::whereDate('date', $this->day)->orderByDesc('id')->paginate(9)->toArray();
        } else {

            // prendo le prenotazione della settimana
            $reservations = Reservation::whereBetween('date', [$staticstart, $staticfinish])->orderByDesc('id')->paginate(9);

            // salvo il numero di prenotazione dell prenotazione
            $count = Reservation::whereBetween('date', [$staticstart, $staticfinish])->count();

            // variabile vuota
            $cc = '';
        }

        // renderizzo al liveriwire delle prenotazioni con delle variabili
        return view('livewire.reservations', compact('reservations', 'array', 'days', 'count', 'cc'));
    }
}
