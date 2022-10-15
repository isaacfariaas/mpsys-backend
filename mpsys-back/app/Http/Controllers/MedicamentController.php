<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:medicaments'],
            'apresentation_value' => ['required'],
            'apresentation_unit' => ['required','string'],
            'measure_value' => ['required'],
            'measure_unit' => ['required','string'],
            'mg_kg' => ['required','integer'],
            'times_day' => ['required','integer'],
        ]);

        if ($medicament = Medicament::create([
            'name' => $request->name,
            'apresentation_value' => $request->apresentation_value,
            'apresentation_unit' => $request->apresentation_unit,
            'measure_value' => $request->measure_value,
            'measure_unit' => $request->measure_unit,
            'mg_kg' => $request->mg_kg,
            'times_day' => $request->times_day,
           
        ])) {

            //event(new Registered($medicament));

            //Auth::login($medicament);
            //return redirect(RouteServiceProvider::HOME);

            return response()->json(["creation" => true, "error" => ""], 200);
        } else {
            return response()->json(["creation" => false, "error" => "not possible to register"], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */
    public function show(Medicament $medicament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicament $medicament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicament $medicament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicament $medicament)
    {
        //
    }
}
