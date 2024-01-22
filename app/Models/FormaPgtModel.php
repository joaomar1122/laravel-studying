<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPgtModel extends Model
{
    protected $primaryKey = 'id_pagamento';
    protected $table = "tb_pagamento";
    protected $fillable = [
        'id_pagamento',
        'forma_pagamento',
    ];
    
    public function relNota()
    {
        return $this->hasMany('App\Models\NotaModel','id_pagamento');
    }
}
