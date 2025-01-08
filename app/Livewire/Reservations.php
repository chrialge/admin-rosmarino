<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservation;

class Reservations extends Component
{

    public $day = '';



    public function render()
    {
        $days = [
            'Lunedì',
            'Martedì',
            'Mercoledì',
            'Giovedì',
            'Venerdì',
            'Sabato',
            'Domenica'
        ];


        $dateNow = date('Y-m-d');
        $staticstart = null;
        $staticfinish = null;
        $array = [];





        if ($dateNow == date('Y-m-d', strtotime('last Monday'))) {
            $staticstart = $dateNow;

            array_push($array, $staticstart);

            for ($i = 1; $i < 7; $i++) {
                $dateWeek = date("Y-m-d", strtotime($staticstart . " +$i days"));

                array_push($array, $dateWeek);
            }
        } else {
            $staticstart = date('Y-m-d', strtotime('last Monday'));

            array_push($array, $staticstart);

            for ($i = 1; $i < 7; $i++) {
                $dateWeek = date("Y-m-d", strtotime($staticstart . " +$i days"));

                array_push($array, $dateWeek);
            }
        }
        if ($dateNow == date('Y-m-d', strtotime('next Sunday'))) {
            $staticfinish = $dateNow;
        } else {
            $staticfinish = date('Y-m-d', strtotime('next Sunday'));
        }



        if (strlen($this->day) >= 1) {
            $reservations = Reservation::whereDate('date', "2025-01-01")->orderByDesc('id')->paginate(9);
            $count = Reservation::whereDate('date', $this->day)->count();
            $cc = Reservation::whereDate('date', "2025-01-01")->orderByDesc('id')->paginate(9)->toArray();
        } else {
            $reservations = Reservation::whereBetween('date', [$staticstart, $staticfinish])->orderByDesc('id')->paginate(9);
            $count = Reservation::whereBetween('date', [$staticstart, $staticfinish])->count();
            $cc = '';
        }

        return view('livewire.reservations', compact('reservations', 'array', 'days', 'count', 'cc'));
    }
}
