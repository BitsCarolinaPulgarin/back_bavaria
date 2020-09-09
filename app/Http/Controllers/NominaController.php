<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nomina;
use Illuminate\Support\Facades\Response;

class NominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nomina =Nomina::join('users', 'nomina.user_id', '=', 'users.id')
        ->get();

        if(count($nomina) > 0){
            return Response::json(['data'=> $nomina, 'status'=>200]);
        }

        return Response::json(['data'=> 'No data', 'status'=>404]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        Nomina::find($id)->update(['status' => 'PAGADO']);
        $nomina =Nomina::join('users', 'nomina.user_id', '=', 'users.id')
        ->get();
        return Response::json(['data'=> $nomina, 'id'=> $id, 'status'=>200]);
    }

}
