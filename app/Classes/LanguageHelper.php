<?php

namespace App\Classes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;



final class LanguageHelper
{
    private array $languages = ['en', 'pt-br']; // Idiomas suportados
    public string $value = 'en';
    public function getLanguageClient(Request $request): string
    {
        $clientLanguage = strtolower($request->server('HTTP_ACCEPT_LANGUAGE'));
        if ($clientLanguage) {
            $language = explode(',', $clientLanguage);
            if (in_array($language[0], $this->languages)) {
                $this->value = $language[0];
                return $this->value;
            } else {
                $this->value = $this->languages[0];
                return $this->value;
            }
        } else {
            return '';
        }
    }
    public function updateLanguage(string $language):void
    {
        $this->value = $language;
        session([
            'language' => $language
        ]);
        App::setLocale($language);
    }
}
