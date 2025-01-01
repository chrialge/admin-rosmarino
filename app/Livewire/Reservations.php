<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservation;

class Reservations extends Component
{
    public $searchTerm = "";


    public function render()
    {
        $staticstart = date('Y-m-d', strtotime('last Monday'));
        $staticfinish = date('Y-m-d', strtotime('next Sunday'));

        if ($this->searchTerm == "") {
            $reservations = Reservation::whereBetween('date', [$staticstart, $staticfinish])->orderByDesc('id')->paginate(9);
        } else {
            $reservations = Reservation::whereDate('date', "=", $this->searchTerm)->orderByDesc('id')->paginate(9);
        }


        return view('livewire.reservations', compact('reservations'));
    }
}
