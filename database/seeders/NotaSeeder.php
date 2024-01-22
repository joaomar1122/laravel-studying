<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NotaModel;

class NotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(NotaModel $nota): void
    {
        $nota->create([
            'nome_cliente'=>'João',
            'tipo_servico'=>'Pacote 10',
            'data_nota'=>'2024-01-21',
            'preco_nota'=>'150.80',
            'id_status'=>'1',
            'id_pagamento'=>'3',
        ]);

        $nota->create([
            'nome_cliente'=>'Davi',
            'tipo_servico'=>'Pacote 11',
            'data_nota'=>'2024-01-21',
            'preco_nota'=>'180.99',
            'id_status'=>'2',
            'id_pagamento'=>'1',
        ]);

        $nota->create([
            'nome_cliente'=>'Marcos',
            'tipo_servico'=>'Pacote 100',
            'data_nota'=>'2024-01-21',
            'preco_nota'=>'400',
            'id_status'=>'1',
            'id_pagamento'=>'4',
        ]);

        $nota->create([
            'nome_cliente'=>'Rosilene',
            'tipo_servico'=>'Pacote 10',
            'data_nota'=>'2024-01-21',
            'preco_nota'=>'500',
            'id_status'=>'2',
            'id_pagamento'=>'3',
        ]);
    }
}
