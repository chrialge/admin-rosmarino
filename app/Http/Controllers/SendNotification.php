<?php

namespace App\Http\Controllers;

use App\Mail\NotificationReservation;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;


class SendNotification extends Controller
{

    public function __construct() {}


    public function send(int $id)
    {
        // salvo la prenotazione 
        $reservation = Reservation::where('id', $id)->first();

        // formato la data della prenotazione
        $date = date_format(date_create($reservation->date), "d/m/Y");

        // formato l'ora della prenotazione
        $time = date_format(date_create($reservation->hour_reservation), "H:i");

        // prendo il il token di telegram
        $token = env("TELEGRAM_BOT_TOKEN");

        // url per mandare il messaggio su telegram
        $apiUrl = "https://api.telegram.org/bot{$token}/sendMessage";

        // prendo l'id del contatto
        $chatId = env("TELEGRAM_CHAT_ID");

        // salvo il messaggio 
        $botMessage = "Prenotazione di: $reservation->customer_name $reservation->customer_last_name alle ore $time il giorno $date per $reservation->person persone. Il suo contatto: $reservation->customer_telephone";

        // salvo i due bottoni che voglio nel messagio
        $keyboard = json_encode([
            "inline_keyboard" => [
                [
                    [
                        "text" => "conferma",
                        "url" => "https://backrosmarino.org//api/confirm-reservation/{$id}"
                    ],
                    [
                        "text" => "rifiuta",
                        "url" => "https://backrosmarino.org//api/reject-reservation/{$id}"
                    ],
                ]
            ]
        ]);

        // setto i parametri per la richiesta API
        $parameters = array(
            "chat_id" => $chatId,
            "text" => $botMessage,
            "parse_mode" => 'Markdown',
            'reply_markup' => $keyboard
        );

        // inizializo una chiamata
        $ch = curl_init();

        // setto l'url
        curl_setopt($ch, CURLOPT_URL, $apiUrl);

        // setto con il numero di parametri
        curl_setopt($ch, CURLOPT_POST, count($parameters));

        // setto con i dati
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));

        // setto che voglio ricevere in cambio
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // esaguo la chiamta
        $result = curl_exec($ch);

        // chiudo la chiamat
        curl_close($ch);


        // prendo i risultati 
        $result = json_decode($result)->result;

        // salvo l'id del messaggio
        $message_id = $result->message_id;

        // setto per tutti campi della prenotazione
        $newReservation['customer_name'] = $reservation->customer_name;
        $newReservation['customer_last_name'] = $reservation->customer_last_name;
        $newReservation['customer_telephone'] = $reservation->customer_telephone;
        $newReservation['customer_email'] = $reservation->customer_email;
        $newReservation['date'] = $reservation->date;
        $newReservation['hour_reservation'] = $reservation->hour_reservation;
        $newReservation['person'] = $reservation->person;
        $newReservation['message_id'] = $message_id;
        $newReservation['state'] = 'attesa';

        // aggiorni i dati per la prenotazione
        Reservation::where('id', $id)->update($newReservation);
    }
}
