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
    /**
     * Store a newly created resource in storage.
     */
    public function sendEmail(SendEmailRequest $request)
    {
        $val_data = $request->validated();

        $arr = explode(',', $val_data['clients']);

        if (strlen($val_data['clients']) == 1) {
            $customer = Customer::where('id', $val_data['clients'])->first();
            Mail::to($customer->email)->send(new SendClientEmail($customer, $val_data['object'], $val_data['description']));
            return to_route('admin.customers.index')->with('message', "Hai inviato con successo l'email");
        } else if ($val_data['clients'] == 'all') {

            $customers = Customer::all();

            foreach ($customers as $customer) {
                Mail::to($customer->email)->send(new SendClientEmail($customer, $val_data['object'], $val_data['description']));
            }
            return to_route('admin.customers.index')->with('message', "Hai inviato con successo l'email");
        } else {


            foreach ($arr as $id) {
                $customer = Customer::where('id', $id)->first();
                Mail::to($customer->email)->send(new SendClientEmail($customer, $val_data['object'], $val_data['description']));
            }
            return to_route('admin.customers.index')->with('message', "Hai inviato con successo l'email");
        }
    }
}
