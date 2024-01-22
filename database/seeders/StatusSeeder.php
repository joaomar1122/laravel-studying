<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StatusModel;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(StatusModel $status): void
    {
        $status->create([
            'status_pagamento'=>'Pago',
        ]);

        $status->create([
            'status_pagamento'=>'Não Pago',
        ]);
    }
}
