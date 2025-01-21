<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Allergy;
use Illuminate\Http\Request;
use App\Http\Requests\AllergyStoreRequest;
use App\Http\Requests\AllergyUpdateRequest;
use Illuminate\Support\Str;

class AllergyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // salvo le allergie
        $allergies = Allergy::orderByDesc('id')->paginate(7);

        // renderizzo alla pagina di index di allergia passando le allergie
        return view('admin.allergies.index', compact('allergies'));
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
    public function store(AllergyStoreRequest $request)
    {

        //prendo i dati validati
        $val_data = $request->validated();

        // compongo lo slug
        $val_data['slug'] = Str::slug($val_data['name'], '-');

        // conto il numero di allergie con lostesso slug
        $count = Allergy::where('slug', $val_data['slug'])->count();

        // se il contatore e piu di 1
        if ($count > 1) {

            // cambio lo slug in modo che sia unico
            $val_data['slug'] = $val_data['slug'] . "-$count";
        }

        // creao una nuova allergia
        $allergy = Allergy::create($val_data);

        // renderizza alla pagina index dell'allergia con un messaggio di session
        return to_route('admin.allergy.index')->with('message', "Hai creato l'allergia: $allergy->name");
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AllergyUpdateRequest $request, string $id)
    {
        // salvi dati validati
        $val_data = $request->validated();

        // prendo l'allergia che voglio che viene modificata
        $allergy = Allergy::where('id', $id)->first();

        // salvo il nome dell'allergia
        $name = $allergy->name;

        // compongo lo slug
        $val_data['slug'] = Str::slug($val_data['name'], '-');

        // conto il numero di allergie con lostesso slug
        $count = Allergy::where('slug', $val_data['slug'])->count();

        // se il contatore e piu di 1
        if ($count > 1) {

            // cambio lo slug in modo che sia unico
            $val_data['slug'] = $val_data['slug'] . "-$count";
        }

        // aggiorni l'allergia con val_data
        $allergy->update($val_data);

        // renderizza alla pagina index dell'allergia con un messaggio di session
        return to_route('admin.allergy.index')->with('message', "Hai modifica l'allergia: $name  in $allergy->name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Allergy $allergy)
    {

        // salvo il nome dell'allergia
        $name = $allergy->name;

        // elimeno allergia
        $allergy->delete();

        // renderizza alla pagina index dell'allergia con un messaggio di session
        return redirect()->back()->with('message', "Hai cancellato l'allergia: $name");
    }
}
