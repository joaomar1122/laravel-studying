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
        $this->objStatus = New StatusModel();
        $this->objPagamento = New FormaPgtModel();
        $this->objNota = new NotaModel();
    }

    public function index()
    {
        //dd($this->objStatus::all());  //FUNCIONANDO
        //dd($this->objPagamento::all()); //FUNCIONANDO
        //dd($this->objNota::all()); //FUNCIONANDO

        //dd($this->objNota->find(1)->relStatus()); //FUNCIONANDO
        //dd($this->objNota->find(2)->relPagamento()); //FUNCIONANDO

        $nota=$this->objNota->paginate(15);
        return view('nota.index', ['nota' => $nota]);
    }

    public function create()
    {
        $statusnota=$this->objStatus->all();
        $formapgt=$this->objPagamento->all();
        return view('nota.create',compact('statusnota','formapgt'));
    }

    public function store(NotaRequest $request)
    {
        $cadastro = $this->objNota ->create([
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
    $nota = $this->objNota->find($id_notas);
    $statusnota = $this->objStatus->all();
    $formapgt = $this->objPagamento->all();

    if (!empty($nota)) {
        return view('nota.edit', compact('nota', 'statusnota', 'formapgt'));
    } else {
        return redirect()->route('nota-index');
    }
}


    public function update(NotaRequest $request, $id_notas)
    {
        $this->objNota->where(['id_notas'=>$id_notas])->update([
            'nome_cliente'=>$request->nome_cliente,
            'tipo_servico'=>$request->tipo_servico,
            'data_nota'=>$request->data_nota,
            'preco_nota'=>$request->preco_nota,
            'id_status'=>$request->id_status,
            'id_pagamento'=>$request->id_pagamento,
        ]);
        dd($request->all());
        return redirect()->route('nota-index');
        
    }
    public function destroy($id_notas)
    {
        //dd($id_notas);
        NotaModel::where('id_notas', $id_notas)->delete();
        return redirect()->route('nota-index');
    }


}
