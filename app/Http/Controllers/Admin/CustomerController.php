<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $customers = Customer::orderByDesc('id')->paginate('2');

        return view('admin.customers.index', compact('customers'));
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
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {


        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($customer->name) . '-' . Str::slug($customer->last_name);
        $count = Customer::where('slug', $val_data['slug'])->count();

        if ($count > 0) {
            $val_data['slug'] = $val_data['slug'] . '-' . $count;
        }

        $customer->update($val_data);

        return to_route('admin.customers.index')->with('message', "Hai modificato in: $customer->name $customer->last_name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $name = $customer->name;
        $last_name = $customer->last_name;
        $customer->delete();
        return to_route('admin.customers.index')->with('message', "Hai cancellato: $name $last_name");
    }
}
