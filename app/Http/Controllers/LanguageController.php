<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //atualiza a session language e retorna ao index
    public function updateLanguage(Request $request)
    {
        session([
            'language' => $request->language
        ]);
        return redirect()->route('page.index');
    }
}
