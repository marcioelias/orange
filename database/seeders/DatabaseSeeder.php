<?php

namespace Database\Seeders;

use App\Models\CodigoNacionalLocalidadeEspecifico;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Schema::disableForeignKeyConstraints();

        $this->call([
            CodigoNacionalLocalidadeSeeder::class,
            CadupSeeder::class,
            CodigoNacionalLocalidadeEspecificoSeeder::class,
            UnidadeFederativaSeeder::class,
            CidadeSeeder::class
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
