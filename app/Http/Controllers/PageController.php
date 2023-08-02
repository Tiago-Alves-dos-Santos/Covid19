<?php

namespace App\Http\Controllers;

use App\Classes\LanguageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function index(Request $request)
    {

        $language = new LanguageHelper();
        if (session()->has('language')) { //linguagem escolhida pelo cliente
            $language->updateLanguage(session('language'));
        } else { //linguagem padrão
            $language->updateLanguage($language->getLanguageClient($request));
        }
        // dd(App::getLocale());
        $valueLanguage = $language->value;
        $resposta = Http::withOptions(['verify' => false])->get("https://covid19-brazil-api.now.sh/api/report/v1"); //desabilita verficação ssl
        $covid = $resposta->json()['data'];
        $texto_completo = "";
        $titulo = "";
        //montagem de texto, para compartilhamento no whatsapp
        foreach ($covid as $value) {
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
        $url_whatsaap = "https://web.whatsapp.com/send?text=" . urlencode($titulo) . $texto_completo;
        return view('index', compact(
            'covid',
            'url_whatsaap',
            'valueLanguage'
        ));
    }
}
