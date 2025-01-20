<?php

namespace App\Http\Controllers;

use App\Mail\NotificationReservation;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class StateReservationController extends Controller
{

    public function confirm(Request $request, int $id)
    {

        $reservation = Reservation::where('id', $id)->first();


        // se e gia stata confermat o rifiutata lo rimando al back di prenotazione con un
        if ($reservation->state !== 'conferma' && $reservation->state !== 'rifiutata') {
            $newReservation['customer_name'] = $reservation->customer_name;
            $newReservation['customer_last_name'] = $reservation->customer_last_name;
            $newReservation['customer_telephone'] = $reservation->customer_telephone;
            $newReservation['customer_email'] = $reservation->customer_email;
            $newReservation['date'] = $reservation->date;
            $newReservation['hour_reservation'] = $reservation->hour_reservation;
            $newReservation['person'] = $reservation->person;
            $newReservation['state'] = 'conferma';
            // Reservation::where('id', $id)->update($reservation['attributes']);
            Reservation::where('id', $id)->update($newReservation);

            $token = env('TELEGRAM_BOT_TOKEN');
            $chat_id = env("TELEGRAM_CHAT_ID");

            $date = date_format(date_create($reservation->date), "d/m/Y");
            $time = date_format(date_create($reservation->hour_reservation), "H:i");

            $data = [
                'text' => "Prenotazione di: $reservation->customer_name $reservation->customer_last_name alle ore $time il giorno $date per $reservation->person persone. Il suo contatto: $reservation->customer_telephone. E stata confermata",
                'chat_id' => $chat_id,
                'message_id' => $reservation->message_id,
                'reply_markup' => '',
            ];

            $urlEditMes = "https://api.telegram.org/bot{$token}/editMessageText";
            $curlEdit = curl_init();
            curl_setopt($curlEdit, CURLOPT_URL, $urlEditMes);
            curl_setopt($curlEdit, CURLOPT_POST, count($data));
            curl_setopt($curlEdit, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curlEdit, CURLOPT_RETURNTRANSFER, true);
            $resultEdit = curl_exec($curlEdit);
            // dd($result);
            curl_close($curlEdit);

            Mail::to($reservation->customer_email)->send(new NotificationReservation($reservation->customer_email, "$reservation->customer_name $reservation->customer_last_name", "Congratulazzioni la tua prenotazione e stata confermata"));

            $messageNotification = "Hai confermato la prenotazione di: $reservation->customer_name $reservation->customer_last_name alle ore $time il giorno $date per $reservation->person persone.";

            return view('notification.confirmReservation', compact('messageNotification'));
        }
    }

    public function reject(Request $request, int $id)
    {
        $reservation = Reservation::where('id', $id)->first();

        if ($reservation->state !== 'conferma' && $reservation->state !== 'rifiutata') {
            $newReservation['customer_name'] = $reservation->customer_name;
            $newReservation['customer_last_name'] = $reservation->customer_last_name;
            $newReservation['customer_telephone'] = $reservation->customer_telephone;
            $newReservation['customer_email'] = $reservation->customer_email;
            $newReservation['date'] = $reservation->date;
            $newReservation['hour_reservation'] = $reservation->hour_reservation;
            $newReservation['person'] = $reservation->person;
            $newReservation['state'] = 'annulla';
            // Reservation::where('id', $id)->update($reservation['attributes']);
            Reservation::where('id', $id)->update($newReservation);

            $token = env('TELEGRAM_BOT_TOKEN');
            $chat_id = env("TELEGRAM_CHAT_ID");

            $date = date_format(date_create($reservation->date), "d/m/Y");
            $time = date_format(date_create($reservation->hour_reservation), "H:i");

            $data = [
                'text' => "Prenotazione di: $reservation->customer_name $reservation->customer_last_name alle ore $time il giorno $date per $reservation->person persone. Il suo contatto: $reservation->customer_telephone. E stata Annulata",
                'chat_id' => $chat_id,
                'message_id' => $reservation->message_id,
                'reply_markup' => '',

            ];

            $urlEditMes = "https://api.telegram.org/bot$token/editMessageText";
            $curlEdit = curl_init();
            curl_setopt($curlEdit, CURLOPT_URL, $urlEditMes);
            curl_setopt($curlEdit, CURLOPT_POST, count($data));
            curl_setopt($curlEdit, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curlEdit, CURLOPT_RETURNTRANSFER, true);
            $resultEdit = curl_exec($curlEdit);
            // dd($result);
            curl_close($curlEdit);
            // echo $resultEdit;

            Mail::to($reservation->customer_email)->send(new NotificationReservation($reservation->customer_email, "$reservation->customer_name $reservation->customer_last_name", "Mi dispiace la prenotazzione e stata annulata"));


            $messageNotification = "Hai Annulato la prenotazione di: $reservation->customer_name $reservation->customer_last_name alle ore $time il giorno $date per $reservation->person persone.";


            return view('notification.rejectRseervation', compact('messageNotification'));
        }
    }
}
