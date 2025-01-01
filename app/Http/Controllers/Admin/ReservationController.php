<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SendNotification;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateReservationRequest;
use Illuminate\Support\Facades\Validator;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $now = date('Y-m-d');
        $staticstart = date('Y-m-d', strtotime('last Monday'));
        $staticfinish = date('Y-m-d', strtotime('next Sunday'));

        $reservations = Reservation::whereBetween('date', [$staticstart, $staticfinish])->orderByDesc('id')->paginate(9);
        return view('admin.reservations.index', compact('reservations'));
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
    public function store(Request $request)
    {
        $dirty_data = $request->all();





        $validator = Validator::make($dirty_data, [
            'customer_name' => 'required|string|max:100',
            'customer_last_name' => 'required|string|max:100',
            'customer_telephone' => 'required|numeric',
            'customer_email' => 'required|email',
            'date' => 'required',
            'hour_reservation' => 'required',
            'person' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'response' => $validator->errors(),
            ]);
        }

        $dirty_data['state'] = 'attesa';
        $reservation = Reservation::create($dirty_data);




        $sendNotfification = new SendNotification();
        $sendNotfification->send($reservation->id);


        return response()->json([
            'success' => true,
            'response' => "la tau prenotazione estata confermata",
        ]);
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
        return view('admin.reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $val_data = $request->validated();

        $val_data['hour_reservation'] = date_format(date_create($val_data['time']), 'h:i:s');
        $val_data['date'] = date_format(date_create($val_data['date']), 'Y-m-d');
        $reservation->update($val_data);

        return to_route('admin.reservations.index')->with('message', "Hai modificato di: $reservation->customer_name $reservation->customer_last_name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $last_name = $reservation->customer_last_name;
        $name = $reservation->customer_name;
        $reservation->delete();

        return to_route('admin.reservations.index')->with('message', "Hai cancellato la prenotazione di $name $last_name");
    }
}
