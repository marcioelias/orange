<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'unidade_federativa_id',
    ];

    public function unidadeFederativa(): BelongsTo {
        return $this->belongsTo(UnidadeFederativa::class);
    }

    public function localidades(): HasMany {
        return $this->hasMany(Localidade::class);
    }
}
