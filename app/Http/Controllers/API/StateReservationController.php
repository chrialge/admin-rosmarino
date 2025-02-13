<?php

namespace App\Http\Controllers\API;

use App\Mail\NotificationReservation;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;


class StateReservationController extends Controller
{

    public function confirm(Request $request, int $id)
    {

        // prendo la prenotazione 
        $reservation = Reservation::where('id', $id)->first();


        // se la prenotazione e stata gia confermata o annullata 
        if ($reservation->state !== 'conferma' && $reservation->state !== 'rifiutata') {

            // creo una nuovo record della prenotazione
            $newReservation['customer_name'] = $reservation->customer_name;
            $newReservation['customer_last_name'] = $reservation->customer_last_name;
            $newReservation['customer_telephone'] = $reservation->customer_telephone;
            $newReservation['customer_email'] = $reservation->customer_email;
            $newReservation['date'] = $reservation->date;
            $newReservation['hour_reservation'] = $reservation->hour_reservation;
            $newReservation['person'] = $reservation->person;
            $newReservation['state'] = 'conferma';

            // aggiorno il record della prenotazione
            Reservation::where('id', $id)->update($newReservation);

            // prendo il token di telegram
            $token = env('TELEGRAM_BOT_TOKEN');

            // prendo l'id della chat
            $chat_id = env("TELEGRAM_CHAT_ID");

            // setto la data e l'ora della prenotazione
            $date = date_format(date_create($reservation->date), "d/m/Y");
            $time = date_format(date_create($reservation->hour_reservation), "H:i");

            // setto i parametri
            $data = [
                'text' => "Prenotazione di: $reservation->customer_name $reservation->customer_last_name alle ore $time il giorno $date per $reservation->person persone. Il suo contatto: $reservation->customer_telephone. E stata confermata",
                'chat_id' => $chat_id,
                'message_id' => $reservation->message_id,
                'reply_markup' => '',
            ];

            // url per modificare il messaggio
            $urlEditMes = "https://api.telegram.org/bot{$token}/editMessageText";

            // inzializzo la chiamata
            $curlEdit = curl_init();

            // setto url
            curl_setopt($curlEdit, CURLOPT_URL, $urlEditMes);

            // setto con il numero di parmateri
            curl_setopt($curlEdit, CURLOPT_POST, count($data));

            // setto i dati per il trasferimento
            curl_setopt($curlEdit, CURLOPT_POSTFIELDS, http_build_query($data));

            // setto che deve ritornare qualcosa
            curl_setopt($curlEdit, CURLOPT_RETURNTRANSFER, true);

            // eseguo la chiamat
            $resultEdit = curl_exec($curlEdit);

            // chiudo la chiamata
            curl_close($curlEdit);


            // invio una mail
            Mail::to($reservation->customer_email)->send(new NotificationReservation($reservation->customer_email, "$reservation->customer_name $reservation->customer_last_name", "Congratulazzioni la tua prenotazione e stata confermata", "Notifica di prenotazione"));

            // setto per il messaggio di notifica dell pagina di conferma della prenotazione
            $messageNotification = "Hai confermato la prenotazione di: $reservation->customer_name $reservation->customer_last_name alle ore $time il giorno $date per $reservation->person persone.";

            // renderizzo alla pagina di conferma della prenotazione
            return view('notification.confirmReservation', compact('messageNotification'));
        }
    }

    public function reject(Request $request, int $id)
    {
        // prendo la prenotazione
        $reservation = Reservation::where('id', $id)->first();

        // se la prenotazione e stata gia confermata o annullata 
        if ($reservation->state !== 'conferma' && $reservation->state !== 'rifiutata') {

            // creo una nuovo record della prenotazione
            $newReservation['customer_name'] = $reservation->customer_name;
            $newReservation['customer_last_name'] = $reservation->customer_last_name;
            $newReservation['customer_telephone'] = $reservation->customer_telephone;
            $newReservation['customer_email'] = $reservation->customer_email;
            $newReservation['date'] = $reservation->date;
            $newReservation['hour_reservation'] = $reservation->hour_reservation;
            $newReservation['person'] = $reservation->person;
            $newReservation['state'] = 'annulla';

            // aggiorno il record della prenotazione
            Reservation::where('id', $id)->update($newReservation);

            // prendo il token di telegram
            $token = env('TELEGRAM_BOT_TOKEN');

            // prendo l'id della chat
            $chat_id = env("TELEGRAM_CHAT_ID");

            // setto la data e l'ora della prenotazione
            $date = date_format(date_create($reservation->date), "d/m/Y");
            $time = date_format(date_create($reservation->hour_reservation), "H:i");

            // setto i parametri
            $data = [
                'text' => "Prenotazione di: $reservation->customer_name $reservation->customer_last_name alle ore $time il giorno $date per $reservation->person persone. Il suo contatto: $reservation->customer_telephone. E stata Annulata",
                'chat_id' => $chat_id,
                'message_id' => $reservation->message_id,
                'reply_markup' => '',

            ];

            // url per modificare il messaggio
            $urlEditMes = "https://api.telegram.org/bot{$token}/editMessageText";

            // inzializzo la chiamata
            $curlEdit = curl_init();

            // setto url
            curl_setopt($curlEdit, CURLOPT_URL, $urlEditMes);

            // setto con il numero di parmateri
            curl_setopt($curlEdit, CURLOPT_POST, count($data));

            // setto i dati per il trasferimento
            curl_setopt($curlEdit, CURLOPT_POSTFIELDS, http_build_query($data));

            // setto che deve ritornare qualcosa
            curl_setopt($curlEdit, CURLOPT_RETURNTRANSFER, true);

            // eseguo la chiamat
            $resultEdit = curl_exec($curlEdit);

            // chiudo la chiamata
            curl_close($curlEdit);

            // invio della mail
            Mail::to($reservation->customer_email)->send(new NotificationReservation($reservation->customer_email, "$reservation->customer_name $reservation->customer_last_name", "Mi dispiace la prenotazzione e stata annulata", "Notifica di prenotazione"));

            // setto per il messaggio di notifica dell pagina di annulamento della prenotazione
            $messageNotification = "Hai Annulato la prenotazione di: $reservation->customer_name $reservation->customer_last_name alle ore $time il giorno $date per $reservation->person persone.";

            // renderizzo alla pagina di annullamento della prenotazione
            return view('notification.rejectRseervation', compact('messageNotification'));
        }
    }
}
