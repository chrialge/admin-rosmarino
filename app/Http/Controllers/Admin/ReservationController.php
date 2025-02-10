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

        $val_data = $request->validated();

        $val_data['state'] = 'attesa';

        $val_data['date'] = date_format(date_create($val_data['date']), 'Y-m-d');

        $val_data['hour_reservation'] = date_format(date_create($val_data['hour_reservation']), 'H:i');

        $reservation = Reservation::create($val_data);

        // richiamo l'oggetto
        $sendNotfification = new SendNotification();

        // mando la notifica passando l'id della prenotazione
        $sendNotfification->send($reservation->id);


        return response()->json([
            'success' => true,
            'response' => $val_data,
        ]);

        // //prendo tutti i dati validati
        // $dirty_data = $request->validated();

        // // aggiungo lo stato di attessa
        // $dirty_data['state'] = 'attesa';

        // // creo una nuova prenptaziome
        // $reservation = Reservation::create($dirty_data);



        // // rispondo con un messaggio di successo
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
