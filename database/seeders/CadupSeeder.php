<?php

namespace Database\Seeders;

use App\Models\Cadup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CadupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();

            Cadup::truncate();

            $csvFile = fopen(base_path('database/data/Cadup.csv'), 'r');

            while (($data = fgetcsv($csvFile)) !== false) {
                Cadup::create([
                    'prefixo' => $data[0],
                    'cnl' => $data[1]
                ]);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::emergency("Erro ao efetuar carga da tabela cadup. ".$exception->getMessage());
            Log::debug($exception);
        }
    }
}
