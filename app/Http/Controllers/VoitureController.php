<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voitures = Voiture::paginate(5); 
        return view('index', compact('voitures'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        return view('create',compact('clients'));
    }

    public function Filter(Reqeust $request){
        
        $voiture = Voiture::where('date_debut_location','>=',$request["date"]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'immatriculation' => 'required|max:10',
            'num_assurance' => 'required|integer',
            'kilometrage' => 'required|integer',
        ]);

        $client = Client::find($request['client_id']);
        $voiture = new Voiture ;
        $voiture->immatriculation = $data['immatriculation'];
        $voiture->num_assurance = $data['num_assurance'] ; 
        $voiture->kilometrage = $data['kilometrage'] ; 
        $voiture->date_debut_location = $request['date_debut_location'] ; 
        $voiture->date_fin_location = $request['date_fin_location'] ; 
        $client->voitures()->save($voiture);
        return redirect('voitures');
    }

    /**
     * Display the specified resource.
     */
    public function show(Voiture $voiture)
    {
        return view('details',compact('voiture'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voiture $voiture)
    {
        $client = Client::all();
        return view('update',compact('voiture','client'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voiture $voiture)
    {
        $nv_client = Clinet::find($request['client_id']);
        $voiture->immatriculation = $request['immatriculation'];
        $voiture->num_assurance = $request['num_assurance'] ; 
        $voiture->kilometrage = $request['kilometrage'] ; 
        $voiture->date_debut_location = $request['date_debut_location'] ; 
        $voiture->date_fin_location = $request['date_fin_location'] ; 
        if(!$nv_client->is($voiture->client)){ 
        $voiture->client()->associate($nv_client);
        }
        $voiture->save();

        return redirect('voitures.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voiture $voiture)
    {
        $voiture->delete();
        return redirect('index');
    }
    }


