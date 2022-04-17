<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetsController extends Controller
{
    public function index(){
        $pets = Pet::all('id','name');

        return view('pets.index', [
            'pets' => $pets,
        ]);
    }

    public function create(){
        return view('pets.adicionar');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'specie' => 'required',
            'color' => 'required',
            'size' => 'required',
        ]);

        $pet = Pet::create([
            'name' => $request['name'],
            'specie' => $request['specie'],
            'SubSpecies' => $request['SubSpecies'],
            'color' => $request['color'],
            'size' => $request['size'],
            'SizeCM' => $request['SizeCM']
        ]);

        return view('pets.show', [
            'pet' => $pet
        ]);
    }

    public function show(Pet $pet ){
        return view('pets.show', [
            'pet' => $pet
        ]);
    }


}
