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
        $allergies = Allergy::orderByDesc('id')->paginate(7);


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
        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($val_data['name'], '-');
        $allergy = Allergy::create($val_data);

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


        $val_data = $request->validated();

        $allergy = Allergy::where('id', $id)->first();

        $name = $allergy->name;

        $val_data['slug'] = Str::slug($val_data['name'], '-');

        $allergy->update($val_data);

        return to_route('admin.allergy.index')->with('message', "Hai modifica l'allergia: $name  in $allergy->name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Allergy $allergy)
    {

        // dd($allergy);
        $name = $allergy->name;
        $allergy->delete();


        return redirect()->back()->with('message', "Hai cancellato l'allergia: $name");
    }
}
