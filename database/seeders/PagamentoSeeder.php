<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FormaPgtModel;

class PagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(FormaPgtModel $pagamento): void
    {
        $pagamento->create([
            'forma_pagamento'=>'Cartão de Crétido',
        ]);
        $pagamento->create([
            'forma_pagamento'=>'Cartão de Débito',
        ]);
        $pagamento->create([
            'forma_pagamento'=>'Pix',
        ]);
        $pagamento->create([
            'forma_pagamento'=>'Dinheiro',
        ]);

    }
}
