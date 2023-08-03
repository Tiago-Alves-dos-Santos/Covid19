<?php

namespace App\Http\Controllers;

use App\Classes\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function index(Request $request)
    {

        $language = new Language();
        if (session()->has('language')) { //linguagem escolhida pelo usuário
            $language->updateLanguage(session('language'));
        } else { //linguagem padrão do navegador
            $language->updateLanguage($language->getLanguageClient($request));
        }
        $valueLanguage = $language->value;
        $response = Http::withOptions(['verify' => false])->get("https://covid19-brazil-api.now.sh/api/report/v1"); //desabilita verficação ssl
        $covid = $response->json()['data'];
        $text_whatsapp = [
            'title' => '',
            'text_complete' => ''
        ];
        //montagem de texto, para compartilhamento no whatsapp
        foreach ($covid as $value) {
            $value = (object)$value;
            $date = new \DateTime($value->datetime);
            $date_formatted = $date->format('d/m/Y H:i:s');
            $text_whatsapp['title'] = "
                *".__('COVID-19 cases in Brazil')."*\n
                *".__('Last update')."*: $date_formatted\n
            ";
            $text = "
                *".__('State')."*: {$value->state}\n
                *".__('Confirmed cases')."*: {$value->cases}\n
                *".__('Deaths')."*: {$value->deaths}\n
                *".__('Suspects')."*: {$value->suspects}\n
                *".__('Refused')."*: {$value->refuses}\n
            ";
            $text_whatsapp['text_complete'] .= urlencode($text);
        }
        $url_whatsaap = "https://web.whatsapp.com/send?text=" . urlencode($text_whatsapp['title']) . $text_whatsapp['text_complete'] ;
        return view('index', compact(
            'covid',
            'url_whatsaap',
            'valueLanguage'
        ));
    }
}
