<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\LanguageHelper;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function updateLanguage(Request $request)
    {
        session([
            'language' => $request->language
        ]);
        return redirect()->route('page.index');
    }
}
