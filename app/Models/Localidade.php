<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Localidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cidade_id',
        'codigo_cnl'
    ];

    public function cidade(): BelongsTo {
        return $this->belongsTo(Cidade::class);
    }

    public function cadup(): HasMany {
        return $this->hasMany(Cadup::class, 'cnl', 'codigo_cnl');
    }

    public function codigoNacionalLocalidade(): HasMany {
        return $this->hasMany(CodigoNacionalLocalidade::class, 'codigo_cnl', 'codigo_cnl');
    }

    public function codigoNacionalLocalidadeEspecifico(): HasMany {
        return $this->hasMany(CodigoNacionalLocalidade::class, 'codigo_cnl', 'codigo_cnl');
    }
}
