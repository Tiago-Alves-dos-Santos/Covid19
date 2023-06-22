<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function index(Request $request){
        //desabilita verficação ssl
        $resposta = Http::withOptions(['verify' => false])->get("https://covid19-brazil-api.now.sh/api/report/v1");
        $covid = $resposta->json()['data'];//retorno json
        return view('index', compact(
            'covid'
        ));
    }
}
