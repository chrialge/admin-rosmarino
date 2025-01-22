<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendClientEmailMarkdown;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SendEmailRequest;
use App\Mail\SendClientEmail;


class SendEmailController extends Controller
{

    public function pageEmail(string $clients)
    {
        $arrayIdClients = explode(',', $clients);

        $arrayClients = [];

        foreach ($arrayIdClients as $idclient) {
            $client = Customer::where('id', $idclient)->first();
            array_push($arrayClients, $client);
        }


        return view('admin.customers.email', compact('arrayClients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function sendEmail(SendEmailRequest $request) {}
}
