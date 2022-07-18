<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnidadeFederativa extends Model
{
    use HasFactory;

    protected $table = 'unidades_federativas';

    protected $fillable = [
        'sigla',
        'nome'
    ];

    public function cidades(): HasMany {
        return $this->hasMany(Cidade::class);
    }
}
