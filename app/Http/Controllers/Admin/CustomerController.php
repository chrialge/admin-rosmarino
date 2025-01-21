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
        // salvo i record dei clienti
        $customers = Customer::orderByDesc('id')->paginate('8');

        // indirizzo alla pagina index ddei clienti con i record dei clienti
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
        // salvo i dati validati
        $val_data = $request->validated();

        // compongo lo slug
        $val_data['slug'] = Str::slug($val_data['name']) . '-' . Str::slug($val_data['last_name']);

        // conta i clienti con lo stesso slug apena composto
        $count = Customer::where('slug', $val_data['slug'])->count();

        // se il contatore e piu di 0
        if ($count > 0) {

            // modifico lo slug
            $val_data['slug'] = $val_data['slug'] . '-' . $count;
        }

        // creo un nuovo cliente
        Customer::create($val_data);

        // rispondo conun messaggio di conferma
        return response()->json([
            'success' => true,
            'result' => "E stato salvato correttamente",
        ]);
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
        // salvo i dati validati
        $val_data = $request->validated();

        // compongo lo slug
        $val_data['slug'] = Str::slug($customer->name) . '-' . Str::slug($customer->last_name);

        // conta i clienti con lo stesso slug apena composto
        $count = Customer::where('slug', $val_data['slug'])->count();

        // se il contatore e piu di 0
        if ($count > 0) {

            // modifico lo slug
            $val_data['slug'] = $val_data['slug'] . '-' . $count;
        }

        // aggiorno il record del cliente
        $customer->update($val_data);

        return to_route('admin.customers.index')->with('message', "Hai modificato in: $customer->name $customer->last_name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        // salvo il nome
        $name = $customer->name;

        // salvo il cognome
        $last_name = $customer->last_name;

        // cancello il cliente
        $customer->delete();

        // renderizzo alla pagina index dei clienti
        return to_route('admin.customers.index')->with('message', "Hai cancellato: $name $last_name");
    }
}
