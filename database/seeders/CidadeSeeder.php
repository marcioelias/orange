<?php

namespace Database\Seeders;

use App\Models\Cidade;
use App\Traits\ConvertUppercaseFirstTrait;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CidadeSeeder extends Seeder
{
    use ConvertUppercaseFirstTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registroCidades = DB::table('codigo_nacional_localidades')
                                ->join('unidades_federativas', fn($join) => $join->on('unidades_federativas.sigla', 'codigo_nacional_localidades.uf'))
                                ->distinct()
                                ->get([
                                    'codigo_nacional_localidades.municipio',
                                    'unidades_federativas.id'
                                ]);

        try {
            DB::beginTransaction();

            //Cidade::truncate();

            foreach ($registroCidades as $registroCidade) {
                $cidade = Cidade::create([
                    'nome' => $this->uppercaseSentence($registroCidade->municipio),
                    'unidade_federativa_id' => $registroCidade->id
                ]);

                $registroLocalidades = DB::table('codigo_nacional_localidades')
                                            ->where('municipio', mb_strtoupper($cidade->nome))
                                            ->distinct()
                                            ->get([
                                                'localidade',
                                                'codigo_cnl'
                                            ]);

                foreach ($registroLocalidades as $registroLocalidade) {
                    $cidade->localidades()->create([
                        'nome' => $this->uppercaseSentence($registroLocalidade->localidade),
                        'codigo_cnl' => $registroLocalidade->codigo_cnl
                    ]);
                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::emergency('Erro ao popular a tabela cidades. '.$exception->getMessage());
            Log::debug($exception);
        }
    }
}
