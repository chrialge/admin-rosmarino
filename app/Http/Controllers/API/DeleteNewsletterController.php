<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;


class DeleteNewsletterController extends Controller
{
    public function delete(Request $request, int $id)
    {


        $customer = Customer::where('id', $id)->first();
        if ($customer === null) {

            return view('notification.ImpossibileDelete');
        } else {
            $deleteCustomer = $customer;
            $customer->delete();

            return view('notification.DeleteCustomer', compact('deleteCustomer'));
        }
    }
}
