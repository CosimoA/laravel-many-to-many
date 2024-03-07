<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index() {
        $technologies = Technology::all(); 
        return response()->json($technologies); 
    }

    public function store(Request $request) {
        $data = $request->all(); 

        $technology = new Technology;
        $technology -> name = $data['name'];
        $technology -> description = $data['description'];

        $technology -> save();

        return response()->json($technology); 
    }
}


