<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\newClient;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(StoreClientRequest $request)
    {
        $file = $request->file('curriculo')->store('curriculos');
        $client_request = $request->all();
        $client_request['ip'] = $request->ip();
        $client_request['curriculo_url'] = $file;
        $address_request = $request->address;
        unset($client_request['address']);

        $client = Client::create($client_request);
        if($client){
            $address = $client->addresses()->create($address_request);
            $this->sendEmail($client_request);
            return response()->json([
                'message' => 'Usuário cadastrado com sucesso!',
                'status' => 200,
            ]);
        }else{
            return response()->json([
                'message' => 'Ops, algo deu errado, tente novamente mais tarde.',
                'status' => 500,
            ]);
        }


    }
    public function sendEmail($client_request){
        return Mail::to($client_request['email'])->send(new newClient($client_request));
    }

}
