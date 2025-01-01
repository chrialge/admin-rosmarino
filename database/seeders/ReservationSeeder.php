<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservations = [
            [
                'customer_name' => 'christian',
                'customer_last_name' => 'algieri',
                'customer_telephone' => '3200345678',
                'customer_email' => 'chrialge99@gmail.com',
                'date' => '2024-12-15',
                'hour_reservation' => '12:30',
                'person' => 7
            ],
            [
                'customer_name' => 'stefano',
                'customer_last_name' => 'algieri',
                'customer_telephone' => '3200345678',
                'customer_email' => 'stefano@gmail.com',
                'date' => '2024-11-25',
                'hour_reservation' => '12:30',
                'person' => 4
            ],
            [
                'customer_name' => 'Marcon',
                'customer_last_name' => 'algieri',
                'customer_telephone' => '3200345678',
                'customer_email' => 'chrialge99@gmail.com',
                'date' => '2024-12-3',
                'hour_reservation' => '19:30',
                'person' => 2
            ],
            [
                'customer_name' => 'Francesco',
                'customer_last_name' => 'algieri',
                'customer_telephone' => '3200345678',
                'customer_email' => 'benedetto@gmail.com',
                'date' => '2024-12-15',
                'hour_reservation' => '12:30',
                'person' => 7
            ],
            [
                'customer_name' => 'Martina',
                'customer_last_name' => 'Rossi',
                'customer_telephone' => '3200345678',
                'customer_email' => 'marco.rossi@gmail.com',
                'date' => '2024-12-15',
                'hour_reservation' => '12:30',
                'person' => 10
            ],
            [
                'customer_name' => 'Luisa',
                'customer_last_name' => 'tirannia',
                'customer_telephone' => '3200345678',
                'customer_email' => 'Luisa@gmail.com',
                'date' => '2024-12-15',
                'hour_reservation' => '12:30',
                'person' => 7
            ],
        ];


        foreach ($reservations as $reservation) {
            $newReservation = new Reservation();
            $newReservation->customer_name = $reservation['customer_name'];
            $newReservation->customer_last_name = $reservation['customer_last_name'];
            $newReservation->customer_telephone = $reservation['customer_telephone'];
            $newReservation->customer_email = $reservation['customer_email'];
            $newReservation->date = $reservation['date'];
            $newReservation->hour_reservation = $reservation['hour_reservation'];
            $newReservation->person = $reservation['person'];
            $newReservation->state = 'attesa';
            $newReservation->save();
        }
    }
}
