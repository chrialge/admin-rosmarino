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

        // Mail::to($GLOBALS['email'])->send(new NotificationReservation($GLOBALS['email'], $GLOBALS['name'], 'ciso'));
        // response()->json([
        //     'success' => true,
        //     'response' => 'semd email',

        // ]);


        $reservation = Reservation::where('id', $id)->first();


        $date = date_format(date_create($reservation->date), "d/m/Y");
        $time = date_format(date_create($reservation->hour_reservation), "H:i");


        $token = env("TELEGRAM_BOT_TOKEN");

        $apiUrl = "https://api.telegram.org/bot{$token}/sendMessage";


        $chatId = env("TELEGRAM_CHAT_ID");
        $botMessage = "Prenotazione di: $reservation->customer_name $reservation->customer_last_name alle ore $time il giorno $date per $reservation->person persone. Il suo contatto: $reservation->customer_telephone";

        // dd($botMessage);
        // dd($botMessage);
        // Create keyboard
        $keyboard = json_encode([
            "inline_keyboard" => [
                [
                    [
                        "text" => "conferma",
                        "url" => "http://127.0.0.1:8000/api/confirm-reservation/{$id}"
                    ],
                    [
                        "text" => "rifiuta",
                        "url" => "http://127.0.0.1:8000/api/reject-reservation/{$id}"
                    ],
                ]
            ]
        ]);

        $parameters = array(
            "chat_id" => $chatId,
            "text" => $botMessage,
            "parse_mode" => 'Markdown',
            'reply_markup' => $keyboard
        );



        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, count($parameters));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        // dd($result);
        curl_close($ch);


        // Get message_id to alter later
        $result = json_decode($result)->result;

        $message_id = $result->message_id;


        $newReservation['customer_name'] = $reservation->customer_name;
        $newReservation['customer_last_name'] = $reservation->customer_last_name;
        $newReservation['customer_telephone'] = $reservation->customer_telephone;
        $newReservation['customer_email'] = $reservation->customer_email;
        $newReservation['date'] = $reservation->date;
        $newReservation['hour_reservation'] = $reservation->hour_reservation;
        $newReservation['person'] = $reservation->person;
        $newReservation['message_id'] = $message_id;
        $newReservation['state'] = 'attesa';
        // Reservation::where('id', $id)->update($reservation['attributes']);
        Reservation::where('id', $id)->update($newReservation);




        // while (true) {
        //     $updates = file_get_contents("https://api.telegram.org/bot$token/getUpdates");

        //     $updates = json_decode($updates);








        //     if (count($updates->result) > 0 && isset(end($updates->result)->callback_query->data)) {

        //         $cc = end($updates->result)->callback_query->message;
        //         dd($cc);

        //         $callBackData = end($updates->result)->callback_query->data;



        //         // dd($callBackData);
        //         // Check for 'stop'
        //         if ($callBackData === 'rifiuta') {



        //             // Say goodbye and remove keyboard
        //             $data = [
        //                 'text' => "Prenotazione Annulata",
        //                 'chat_id' => 389605885,
        //                 'message_id' => $message_id,
        //                 'reply_markup' => '',
        //             ];

        //             $urlEditMes = "https://api.telegram.org/bot{$token}/editMessageText";
        //             $curlEdit = curl_init();
        //             curl_setopt($curlEdit, CURLOPT_URL, $urlEditMes);
        //             curl_setopt($curlEdit, CURLOPT_POST, count($data));
        //             curl_setopt($curlEdit, CURLOPT_POSTFIELDS, http_build_query($data));
        //             curl_setopt($curlEdit, CURLOPT_RETURNTRANSFER, true);
        //             $resultEdit = curl_exec($curlEdit);
        //             // dd($result);
        //             curl_close($curlEdit);




        //             // End while
        //             break;
        //         } else if ($callBackData === 'conferma' && isset(end($updates->result)->callback_query->data)) {
        //             $data = [
        //                 'text' => "Prenotazione confermata",
        //                 'chat_id' => 389605885,
        //                 'message_id' => $message_id,
        //                 'reply_markup' => '',

        //             ];

        //             $urlEditMes = "https://api.telegram.org/bot$token/editMessageText";
        //             $curlEdit = curl_init();
        //             curl_setopt($curlEdit, CURLOPT_URL, $urlEditMes);
        //             curl_setopt($curlEdit, CURLOPT_POST, count($data));
        //             curl_setopt($curlEdit, CURLOPT_POSTFIELDS, http_build_query($data));
        //             curl_setopt($curlEdit, CURLOPT_RETURNTRANSFER, true);
        //             $resultEdit = curl_exec($curlEdit);
        //             // dd($result);
        //             curl_close($curlEdit);
        //             // echo $resultEdit;

        //             break;
        //         }

        //         // Alter text with callback_data

        //     }

        //     // Sleep for a second, and check again
        //     sleep(5);
        // }

        // dd($updates, $message_id);
    }
}
