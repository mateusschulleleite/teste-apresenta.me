<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller {

    public function store(Request $request) {
        try {
            $pessoa = Pessoa::create($request->all());

            return response()->json([
                'success' => true,
                'data' => $pessoa
            ]);

        }catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function index() {
       $pessoas = DB::table('pessoas')
            ->select('id', 'nome', 'tipo', 'cpf_cnpj', 'telefone', 'email')
            ->selectRaw("CASE tipo WHEN 1 THEN 'Física' WHEN 2 THEN 'Jurídica' END as tipoDescricao")
            ->get();

        return response()->json($pessoas);
    }

    public function update(Request $request, $id) {
        $pessoa = Pessoa::findOrFail($id);

        try {
            $pessoa->update([
                'nome' => $request->nome,
                'tipo' => $request->tipo,
                'cpf_cnpj' => $request->cpf_cnpj,
                'telefone' => $request->telefone,
                'email' => $request->email,
            ]);

            return response()->json([
                'success' => true,
                'data' => $pessoa
            ]);

        }catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => $e->getMessage()
            ]);
        }
    }

    public function destroy($id) {
        $pessoa = Pessoa::find($id);

        if(!$pessoa){
            return response()->json([
                "success" => false,
                "message" => "Pessoa não encontrada"
            ]);
        }

        $pessoa->delete();

        return response()->json([
            "success" => true,
            "message" => "Pessoa excluída com sucesso"
        ]);
    }
}


