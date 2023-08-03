<?php
namespace App\Classes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

/**
 * @method public string  getLanguageClient(Request $request)
 * @method public void updateLanguage(string $language)
 */
final class Language
{
    private array $languages = ['en', 'pt_BR']; // Idiomas suportados
    public string $value = 'en'; //Linguagem padrão
    /**
     * Retorna a linguagem padrão do usuário, definida pelo navegador.
     * @param Illuminate\Http\Request $request
     * @return string A string resultante pode ser vazia.
     */
    public function getLanguageClient(Request $request): string
    {
        $clientLanguage = $request->server('HTTP_ACCEPT_LANGUAGE');
        if ($clientLanguage) {
            $language = explode(',', $clientLanguage);
            $language[0] = str_replace('-','_',$language[0]);
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
    /**
     * Atualiza a linguagem do navegador do usuário guardando em uma session
     * já defenida como 'language'
     *
     * @param string $language
     * @return void
     */
    public function updateLanguage(string $language):void
    {
        $this->value = $language;
        session(['language' => $language]);
        App::setLocale($language);
    }
}
