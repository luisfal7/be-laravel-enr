<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Hour;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('hour', 'user', 'services')->get();
        return $clients;
    }

    public function show(Client $client)
    {
        $client = Client::with('hour', 'user', 'services')->find($client->id);
        return $client;
    }

    public function store(Request $request)  
    {  
        $client = Client::create($request->all());

        $client->services()->attach($request->services);
        //services[index][service_id]
        //services[index][precio]
        //services[index][cantidad]

        return $request->services;
    }

    public function edit(Client $client)  
    {   
        return $client;
    }

    public function update(Request $request, Client $client)  
    {   

        $client = Client::with('hour', 'user', 'services')->get();
        $client->update($request->all());
        $client->services()->attach($request->services);

        return $client;
    }

    public function editServiceClient(Request $request, Client $client)  
    {   

        $client = Client::with('hour', 'user', 'services')->get()->find($client->id);
        $client->services()->detach($request->id);

        return $client;
    }

    public function addServiceClient(Request $request, Client $client)  
    {   
        $client = Client::with('hour', 'user', 'services')->get()->find($client->id);
        $client->services()->attach($request->id);
        $editClient = Client::with('hour', 'user', 'services')->find($client->id);
        $newService = $editClient->services->find($request->id);

        return $newService;
    }

    public function incrementQuantityServiceClient(Request $request, Client $client)  
    {   
        $client = Client::with('hour', 'user', 'services')->get()->find($client->id);
        $service = $client->services->find($request->id);
        $service->pivot->increment('cantidad');

        return $client;
    }

    public function decrementQuantityServiceClient(Request $request, Client $client)  
    {   
        $client = Client::with('hour', 'user', 'services')->get()->find($client->id);
        $service = $client->services->find($request->id);
        $cantidad = $service->pivot->cantidad;
        $cantidad <= 1 ? $cantidad : $service->pivot->decrement('cantidad');
        return $client;
    }

    public function destroy(Client $client)  
    {   
        $client->delete();
    }
}
