<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $service = new Service();
        return $service->get();
    }

    public function show(Service $service)
    {
        //Service::find($service->id)->increment('cantidad')

        /* $service = Service::find($service->id);
        $service -> cantidad = $service -> cantidad + 1; 
        $service -> save(); */
        
        return $service;
    }

    public function store(Request $request)  
    {   
        /* $service = new Service();

        $service->name = $request->name;
        $service->price = $request->price;
        $service->save(); */

        $service = Service::create($request->all());
        
        return $service;
    }

    public function edit(Service $service)  
    {   
        return $service;
    }

    public function update(Request $request, Service $service)  
    {   
        /* $service->name = $request->name;
        $service->price = $request->price;
        $service->save(); */

        $service->update($request->all());

        return $service;
    }

    public function destroy(Service $service)  
    {   
        $service->delete();
    }
}
