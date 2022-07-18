<?php

namespace Database\Seeders;

use App\Models\CodigoNacionalLocalidade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CodigoNacionalLocalidadeSeeder extends Seeder
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

            CodigoNacionalLocalidade::truncate();

            $cnlFile = fopen(base_path('database/data/CodigoNacionalLocalidades.txt'), 'r');

            while (($data = fgets($cnlFile)) !== false) {
                $data = utf8_encode($data);
                $record = [
                    'uf'                => mb_substr($data, 0,      2,  'UTF-8'),
                    'sigla_cnl'         => trim(mb_substr($data, 2,      4,  'UTF-8')),
                    'codigo_cnl'        => trim(mb_substr($data, 6,      5,  'UTF-8')),
                    'localidade'        => trim(mb_substr($data, 11,     49, 'UTF-8')),
                    'municipio'         => trim(mb_substr($data, 60,     49, 'UTF-8')),
                    'prefixo'           => trim(mb_substr($data, 116,    7,  'UTF-8')),
                    'prestadora'        => trim(mb_substr($data, 123,    30, 'UTF-8')),
                    'numeracao_inicial' => intval(mb_substr($data, 153,    4,  'UTF-8')),
                    'numeracao_final'   => intval(mb_substr($data, 157,    4,  'UTF-8'))
                ];
                CodigoNacionalLocalidade::create($record);
            }

            DB::commit();
            fclose($cnlFile);

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::emergency("Erro ao efetuar carga da tabela de Codigo Nacional de Localidades. ".$exception->getMessage());
            Log::debug($exception);
        }
    }
}
