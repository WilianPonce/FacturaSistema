<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'periodo' => 'date',
        'obligado_contabilidad' => 'boolean',
        'periodo_inicio' => 'date',
        'periodo_fin' => 'date',
        'firma_electronica_expiracion' => 'date',
        'firma_electronica_actualizacion' => 'date',
        'tipo_emision' => 'boolean',
        'ambiente' => 'boolean',
        'facturar_negativo' => 'boolean',
        'moneda_id' => 'integer',
        'provincia_id' => 'integer',
        'ciudad_id' => 'integer',
    ];


    public function moneda()
    {
        return $this->belongsTo(\App\Models\Moneda::class);
    }

    public function provincia()
    {
        return $this->belongsTo(\App\Models\Provincia::class);
    }

    public function ciudad()
    {
        return $this->belongsTo(\App\Models\Ciudad::class);
    }
}
