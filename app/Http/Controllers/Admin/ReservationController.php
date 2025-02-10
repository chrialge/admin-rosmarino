<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SendNotification;
use App\Http\Requests\StoreReservationRequest;
use App\Models\Reservation;
use App\Http\Requests\UpdateReservationRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;



class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lo indirizzo alla pagina index della prenotazione
        return view('admin.reservations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        //prendo tutti i dati validati
        $val_data = $request->validated();

        // aggiungo lo stato di attessa
        $val_data['state'] = 'attesa';

        // 
        $val_data['date'] = date_format(date_create($val_data['date']), 'Y-m-d');

        $val_data['hour_reservation'] = date_format(date_create($val_data['hour_reservation']), 'H:i');

        // creo una nuova prenotaziome
        $reservation = Reservation::create($val_data);

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
                        "url" => "http://127.0.0.1:8000/api/confirm-reservation/{$reservation->id}"
                    ],
                    [
                        "text" => "rifiuta",
                        "url" => "http://127.0.0.1:8000/api/reject-reservation/{$reservation->id}"
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


        // // prendo i risultati 
        // $result = json_decode($result)->result;

        // // salvo l'id del messaggio
        // $message_id = $result->message_id;

        // // setto per tutti campi della prenotazione
        // $newReservation['customer_name'] = $reservation->customer_name;
        // $newReservation['customer_last_name'] = $reservation->customer_last_name;
        // $newReservation['customer_telephone'] = $reservation->customer_telephone;
        // $newReservation['customer_email'] = $reservation->customer_email;
        // $newReservation['date'] = $reservation->date;
        // $newReservation['hour_reservation'] = $reservation->hour_reservation;
        // $newReservation['person'] = $reservation->person;
        // $newReservation['message_id'] = $message_id;
        // $newReservation['state'] = 'attesa';

        // // aggiorni i dati per la prenotazione
        // Reservation::where('id', $reservation['id'])->update($newReservation);

        // rispondo con un messaggio di successo
        return response()->json([
            'success' => true,
            'response' => $val_data,
        ]);

        // return response()->json([
        //     'success' => true,
        //     'response' => "La tua prenotazione e arrivata",
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        // lo indirizzo alla apagina di modifica della prenotazione
        return view('admin.reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        // prendo i dati validati
        $val_data = $request->validated();

        // formato l'ora per essere accettato nel database
        $val_data['hour_reservation'] = date_format(date_create($val_data['time']), 'h:i:s');

        // formato la data per essere accettata nel database
        $val_data['date'] = date_format(date_create($val_data['date']), 'Y-m-d');

        // aggiorno la prenotazione con nuovi dati
        $reservation->update($val_data);

        // lo rendirizzo alla pagina index delle prenotazione con um messaggio di session
        return to_route('admin.reservations.index')->with('message', "Hai modificato di: $reservation->customer_name $reservation->customer_last_name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        // salvo il cognome della prenotazione
        $last_name = $reservation->customer_last_name;

        // salvo il name della prenotazione
        $name = $reservation->customer_name;

        // cancello la prenotazione
        $reservation->delete();

        // lo rendirizzo alla pagina index delle prenotazione con um messaggio di session
        return to_route('admin.reservations.index')->with('message', "Hai cancellato la prenotazione di $name $last_name");
    }
}
