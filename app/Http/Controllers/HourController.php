<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use Illuminate\Http\Request;

class HourController extends Controller
{
    public function index()
    {
        return Hour::all();
    }

    public function show($id)
    {
        $hour = Hour::find($id);

        return $hour;
    }

    public function store(Request $request)  
    {   
        /* $hour = new Hour();

        $hour->hour = $request->hour;
        $hour->save(); */

        $hour = Hour::create($request->all());
        
        return $hour;
        
    }

    public function update(Request $request, Hour $hour)  
    {   

        $hour->update($request->all());

        return $hour;
    }

    public function destroy(Hour $hour)  
    {   
        //hour::destroy($id);
        $hour->delete();
    }

}
