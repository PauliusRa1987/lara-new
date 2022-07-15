<?php

namespace App\Http\Controllers;
use App\Models\Color;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $colors = Color::all();
        $animals = match($request->sort){
            'asc' => Animal::orderBy('name', 'asc')->get(),
            'desc' => Animal::orderBy('name', 'desc')->get(),
            default => Animal::all()
        };
        return view('animals/index',['animals' => $animals, 'colors' => $colors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animals = Animal::all();
        $colors = Color::all();
        return view('animals/create',['animals' => $animals, 'colors' => $colors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAnimalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $animal = new Animal;
        $animal->name = $request->name;
        $animal->color_id = $request->color_id;
        $animal->save();
        return redirect()->route('animals-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
      
        $colors = Color::all();
        return view('animals/edit',['animal' => $animal, 'colors' => $colors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnimalRequest  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $animal->name = $request->name;
        $animal->color_id = $request->color_id;
        $animal->save();
        return redirect()->route('animals-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('animals-index');
    }
}