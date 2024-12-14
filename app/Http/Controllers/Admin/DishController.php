<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Allergy;
use Illuminate\Http\Request;
use App\Models\Dish;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $firstPlate = Dish::where('typology', 'primi')->orderByDesc('id')->get();

        $secondPlate = Dish::where('typology', 'secondi')->orderByDesc('id')->get();
        $entrePlate = Dish::where('typology', 'antipasti')->orderByDesc('id')->get();
        $dessertPlate = Dish::where('typology', 'dessert')->orderByDesc('id')->get();
        $drinks = Dish::where('typology', 'bevande')->orderByDesc('id')->get();
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
