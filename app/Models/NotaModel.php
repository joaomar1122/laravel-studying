<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaModel extends Model
{
    protected $primaryKey = 'id_notas';
    protected $table = "tb_notas";
    protected $fillable = [
        'nome_cliente',
        'tipo_servico',
        'data_nota',
        'preco_nota',
        'id_status', 
        'id_pagamento'
    ];


    public function relStatus()
{
    return $this->belongsTo('App\Models\StatusModel','id_status');
}

    public function relPagamento()
    {
        return $this->belongsTo('App\Models\FormaPgtModel','id_pagamento');
    }
}
