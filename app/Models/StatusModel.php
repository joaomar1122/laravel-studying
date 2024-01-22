<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusModel extends Model
{
    protected $primaryKey = 'id_status';
    protected $table = "tb_status_nota";
    protected $fillable = [
        'id_status',
        'status_pagamento',
    ];
    
    public function relNota()
    {
        return $this->hasMany('App\Models\NotaModel','id_status');
    }
    
}
