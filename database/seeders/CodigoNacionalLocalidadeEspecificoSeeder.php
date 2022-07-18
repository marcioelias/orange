<?php

namespace Database\Seeders;

use App\Models\CodigoNacionalLocalidadeEspecifico;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CodigoNacionalLocalidadeEspecificoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path('database/data/CodigoNacionalLocalidades.csv'), 'r');
        if ($csvFile) {
            try {
                DB::beginTransaction();

                CodigoNacionalLocalidadeEspecifico::truncate();

                while (($data = fgetcsv($csvFile)) !== false) {
                    CodigoNacionalLocalidadeEspecifico::create([
                        'uf' => $data[0],
                        'municipio' => $data[2],
                        'codigo_cnl' => $data[4]
                    ]);
                }

                DB::commit();
                fclose($csvFile);

            } catch (\Exception $exception) {
                DB::rollBack();
                Log::emergency("Erro ao efetuar carga da tabela de codigo_nacional_localidade_especificos. ".$exception->getMessage());
                Log::debug($exception);
            }
        }
    }
}
