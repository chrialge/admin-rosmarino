<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendClientEmailMarkdown;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SendEmailRequest;
use App\Mail\NotificationReservation;
use App\Mail\SendClientEmail;


class SendEmailController extends Controller
{

    public function pageEmail(string $clients)
    {
        $arrayIdClients = explode(',', $clients);

        $arrayClients = [];

        if ($arrayIdClients[0] == "all") {

            $arrayClients = Customer::all();
        } else {
            foreach ($arrayIdClients as $idclient) {
                $client = Customer::where('id', $idclient)->first();
                array_push($arrayClients, $client);
            }
        }



        return view('admin.customers.email', compact('arrayClients', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function sendEmail(Request $request)
    {

        $data = $request->all();
        $arrayIdClients = explode(',', $data['clients']);

        $client = Customer::where('id', $arrayIdClients[0])->first();

        $name = $client->name . " " . $client->last_name;

        Mail::to($client->email)->send(new NotificationReservation("chrialge99@gmail.com", $name, $data['message'], $data['object']));

        foreach ($arrayIdClients as $idclient) {
            $client = Customer::where('id', $arrayIdClients[0])->first();

            $name = $client->name . " " . $client->last_name;
        }

        return to_route('admin.customers.index')->with('messagge', "inviato con successo le email");
    }
}
