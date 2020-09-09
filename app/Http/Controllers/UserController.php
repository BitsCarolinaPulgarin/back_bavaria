<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;
use App\User;
use App\Nomina;


class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = User::create([
            'name' => $request[0]['name'],
            'lastname' => $request[0]['lastname'],
            'email' => $request[0]['email'],
            'password' => bcrypt($request[0]['password']),
            'role' => $request[0]['role']
        ])->id;

        Nomina::create([
            'date' => Carbon::now(),
            'user_id' => $user,
            'status' => 'NO PAGADO',
            'amount' => $request[0]['amount'],
        ]);

        return Response::json(['data' => 'save', 'status' => 200]);
    }
}
