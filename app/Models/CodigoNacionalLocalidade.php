<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodigoNacionalLocalidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'uf',
        'sigla_cnl',
        'codigo_cnl',
        'localidade',
        'municipio',
        'prefixo',
        'prestadora',
        'numeracao_inicial',
        'numeracao_final'
    ];
}
