<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allergy;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Http\Requests\DishStoreRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DishUpdateRequest;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // salvo gl'antipasti
        $entrePlate = Dish::where('typology', 'antipasto')->orderByDesc('id')->get();

        // salvo i primi piatti
        $firstPlate = Dish::where('typology', 'primo')->orderByDesc('id')->get();

        // salvo i secondi piatti
        $secondPlate = Dish::where('typology', 'secondo')->orderByDesc('id')->get();

        // salvo i dessert
        $dessertPlate = Dish::where('typology', 'dessert')->orderByDesc('id')->get();

        // salvo i drink
        $drinks = Dish::where('typology', 'bevande')->with('allergies')->orderByDesc('id')->get();

        // conto tutti i record dei piatti
        $count = Dish::count();

        // indirizzo alla pagina index dei piatti passando i parametri
        return view('admin.dishes.index', compact('firstPlate', 'secondPlate', 'entrePlate', 'dessertPlate', 'drinks', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // salvo tutti irecord delle allergie
        $allergies = Allergy::all();

        // indirrizzo alla apgina di creazione del piatto
        return view('admin.dishes.create', compact('allergies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DishStoreRequest $request)
    {
        // salvo i dati validati
        $val_data = $request->validated();

        // compongo lo slug
        $val_data['slug'] = Str::slug($val_data['name'], '-');

        // conto i piatti con lo stesso slug
        $count = Dish::where('slug', $val_data['slug'])->count();

        // se il contatore e maggiore di 0
        if ($count > 0) {

            // ricompongo lo slug
            $val_data['slug'] = $val_data['slug'] . "-$count";
        }

        // sistemo il prezzo per il database
        $val_data['price'] = number_format($val_data['price'], 2, '.', ',');

        // se passa l'immagine
        if ($request->has('image')) {

            // salvo l'url dell'immagine che viene caricata
            $val_data['image'] = Storage::disk('public')->put('uploads/images', $val_data['image']);
        }

        // creo un piatto
        $dish = Dish::create($val_data);

        // se nellla nella richiesta ci sono le allergie
        if ($request->has('allergies')) {

            // creo record nella tabella pivot
            $dish->allergies()->attach($val_data['allergies']);
        }

        // renderizzo alla pagina index del piatto con messaggio di session
        return to_route('admin.dishes.index')->with('message', "Hai creato un Piatto: $dish->name");
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
    public function edit(Dish $dish)
    {

        // prendo tutte le allergie
        $allergies = Allergy::all();

        // prendo tutte allergie del piatto
        $allergiesDish = $dish->allergies()->get()->toArray();

        // creo una variabile di ancoraggio
        $array = [];

        // itero per tutte le allergie
        foreach ($allergiesDish as $allergy) {

            // salvo l'id nell'array
            array_push($array, $allergy['id']);
        }

        // renderizzo alla apgina di modifica dei piatti 
        return view('admin.dishes.edit', compact('dish', 'allergies', 'array'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DishUpdateRequest $request, Dish $dish)
    {
        // salvo i dati validati
        $val_data = $request->validated();

        // compongo lo slug
        $val_data['slug'] = Str::slug($val_data['name'], '-');

        // conto i piatti con lo stesso slug
        $count = Dish::where('slug', $val_data['slug'])->count();

        // se il contatore  emaggiore di 0
        if ($count > 0) {

            // ricompongo lo slug
            $val_data['slug'] = $val_data['slug'] . "-$count";
        }

        // sistemo il prezzo per il database
        $val_data['price'] = number_format($val_data['price'], 2, '.', ',');

        // se passa l'immgine
        if ($request->has('image')) {

            // se il piatto ha gia un immagine
            if ($dish->image) {

                // elimino l'immagine
                Storage::disk('public')->delete($dish->image);
            }

            // salvo il percorso dell nuova immagine caricata
            $val_data['image'] = Storage::disk('public')->put('uploads/images', $val_data['image']);
        }

        // salvo il nome
        $name = $val_data['name'];

        // modifico il piatto con i dati passti
        $dish->update($val_data);

        // se passano le allergie
        if ($request->has('allergies')) {

            // setto con gli id delle allergie passati
            $dish->allergies()->sync($val_data['allergies']);
        } else {

            // elimino tutti i collegamenti con le allergie
            $dish->allergies()->detach();
        }

        // renderizzo alla pagina index del piatto con messaggio di session
        return to_route('admin.dishes.index')->with('message', "Hai modificato in: $name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {

        // se il piatto ha un immagine
        if ($dish->image) {

            // l'immagine salvata viene cancellata
            Storage::disk('public')->delete($dish->image);
        }

        // cancello il piatto
        $dish->delete();

        // renderizzo alla pagina index del piatto con messaggio di session
        return redirect()->back()->with('message', "Tu hai cancellato il piatto: $dish->name");
    }
}
