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

        $firstPlate = Dish::where('typology', 'primo')->orderByDesc('id')->get();

        $secondPlate = Dish::where('typology', 'secondo')->orderByDesc('id')->get();
        $entrePlate = Dish::where('typology', 'antipasto')->orderByDesc('id')->get();
        $dessertPlate = Dish::where('typology', 'dessert')->orderByDesc('id')->get();
        $drinks = Dish::where('typology', 'bevande')->with('allergies')->orderByDesc('id')->get();
        $count = Dish::count();

        return view('admin.dishes.index', compact('firstPlate', 'secondPlate', 'entrePlate', 'dessertPlate', 'drinks', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allergies = Allergy::all();
        return view('admin.dishes.create', compact('allergies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DishStoreRequest $request)
    {
        $val_data = $request->validated();
        // dd($val_data);

        $val_data['slug'] = Str::slug($val_data['name'], '-');
        $count = Dish::where('slug', $val_data['slug'])->count();
        if ($count > 0) {
            $val_data['slug'] = $val_data['slug'] . "-$count";
        }
        $val_data['price'] = number_format($val_data['price'], 2, '.', ',');
        if ($request->has('image')) {
            $val_data['image'] = Storage::disk('public')->put('uploads/images', $val_data['image']);
        }

        $dish = Dish::create($val_data);

        if ($request->has('allergies')) {
            $dish->allergies()->attach($val_data['allergies']);
        }

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
        $allergies = Allergy::all();

        $allergiesDish = $dish->allergies()->get()->toArray();

        return view('admin.dishes.edit', compact('dish', 'allergies', 'allergiesDish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DishUpdateRequest $request, Dish $dish)
    {

        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($val_data['name'], '-');
        $count = Dish::where('slug', $val_data['slug'])->count();
        if ($count > 0) {
            $val_data['slug'] = $val_data['slug'] . "-$count";
        }

        $val_data['price'] = number_format($val_data['price'], 2, '.', ',');


        if ($request->has('image')) {

            if ($dish->image) {
                Storage::disk('public')->delete($dish->image);
            }
            $val_data['image'] = Storage::disk('public')->put('uploads/images', $val_data['image']);
        }

        $name = $val_data['name'];

        $dish->update($val_data);


        if ($request->has('allergies')) {

            $dish->allergies()->sync($val_data['allergies']);
        } else {
            $dish->allergies()->detach();
        }

        return to_route('admin.dishes.index')->with('message', "Hai modificato in: $name");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {

        if ($dish->image) {
            Storage::disk('public')->delete($dish->image);
        }

        $dish->delete();
        return redirect()->back()->with('message', "Tu hai cancellato il piatto: $dish->name");
    }
}
