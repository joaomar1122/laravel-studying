<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StatusModel; 
use App\Models\FormaPgtModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
         
         if (StatusModel::count() === 0) {
            $this->call(StatusSeeder::class);
         }
        
        if (FormaPgtModel::count() === 0) {
            $this->call(PagamentoSeeder::class);
        }
        
        $this->call(NotaSeeder::class);
    }
}
