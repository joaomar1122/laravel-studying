<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotaModel;
use App\Models\StatusModel;
use App\Models\FormaPgtModel;
use App\Http\Requests\NotaRequest;

class NotaController extends Controller
{
    private $nota;
    private $objStatus;
    private $objPagamento;

    public function __construct(){
    }

    public function index()
    {
        //dd($this->objStatus::all());  //FUNCIONANDO
        //dd($this->objPagamento::all()); //FUNCIONANDO
        //dd($this->objNota::all()); //FUNCIONANDO

        //dd(NotaModel::find(1)->relStatus()); //FUNCIONANDO
        //dd(NotaModel::find(2)->relPagamento()); //FUNCIONANDO

        $nota=NotaModel::paginate(15);
        return view('nota.index', ['nota' => $nota]);
    }

    public function create()
    {
        $statusnota=StatusModel::all();
        $formapgt=FormaPgtModel::all();
        return view('nota.create',compact('statusnota','formapgt'));
    }

    public function store(NotaRequest $request)
    {
        $cadastro = NotaModel::create([
            'nome_cliente'=>$request->nome_cliente,
            'tipo_servico'=>$request->tipo_servico,
            'data_nota'=>$request->data_nota,
            'preco_nota'=>$request->preco_nota,
            'id_status'=>$request->id_status,
            'id_pagamento'=>$request->id_pagamento,
        ]);
        if($cadastro){
            return redirect()->route('nota-index');
        }
    }

    public function edit($id_notas)
{
    $nota = NotaModel::find($id_notas);
    $statusnota = StatusModel::all();
    $formapgt = FormaPgtModel::all();

    if (!empty($nota)) {
        return view('nota.edit', compact('nota','statusnota','formapgt'));
    } else {
        return redirect()->route('nota-index');
    }
}


    public function update(Request $request, $id_notas)
    {
        $nota = NotaModel::find($id_notas);
  
        $nota->nome_cliente = $request->nome_cliente;
        $nota->tipo_servico = $request->tipo_servico;
        $nota->data_nota = $request->data_nota;
        
        $preco_nota = str_replace(',', '.', $request->preco_nota); //Altera virgula para ponto
        $nota->preco_nota = $preco_nota;

        if ($request->has('id_status')) {
            $nota->id_status = $request->id_status;
        }

        if ($request->has('id_pagamento')) {
            $nota->id_pagamento = $request->id_pagamento;
        }

        $nota->save();
        return redirect()->route('nota-index');
    }

    public function destroy($id_notas)
    {
        //dd($id_notas);
        NotaModel::where('id_notas', $id_notas)->delete();
        return redirect()->route('nota-index');
    }


}
