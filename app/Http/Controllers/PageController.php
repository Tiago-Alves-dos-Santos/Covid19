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
        $texto_completo = "";
        $titulo = "";
        foreach($covid as $value){
            $value = (object)$value;
            $data = new \DateTime($value->datetime);
            $dataFormatada = $data->format('d/m/Y H:i:s');
            $titulo = "
            *Casos de COVID-19 no Brasil*\n
            *Ultima atualização*: $dataFormatada\n
            ";
            $texto = "
            *Estado*: {$value->state}\n
            *Casos confirmados*: {$value->cases}\n
            *Mortes*: {$value->deaths}\n
            *Suspeitos*: {$value->suspects}\n
            *Recusados*: {$value->refuses}\n
            ";
            $texto_completo .= urlencode($texto);
        }
        //testes de url
        // $url_whatsaap = "https://api.whatsapp.com/send?text=$texto_completo";
        // $url_whatsaap = "whatsapp://send?text=$texto_completo";
        $url_whatsaap = "https://web.whatsapp.com/send?text=".urlencode($titulo).$texto_completo;
        return view('index', compact(
            'covid',
            'url_whatsaap'
        ));
    }
}
