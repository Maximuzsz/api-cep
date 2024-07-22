<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function search($ceps)
    {
        // Separar os CEPs pela vírgula
        $cepsArray = explode(',', $ceps);
        $addresses = [];

        // Consultar cada CEP na API ViaCEP
        foreach ($cepsArray as $cep) {
            $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
            if ($response->successful()) {
                $addresses[] = $response->json();
            } else {
                $addresses[] = ['cep' => $cep, 'error' => 'CEP não encontrado'];
            }
        }

        // Retorna os dados em formato JSON
        return response()->json($addresses);
    }
}
