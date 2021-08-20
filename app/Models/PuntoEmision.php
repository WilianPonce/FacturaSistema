<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntoEmision extends Model
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
        'estado' => 'boolean',
        'empresa_id' => 'integer',
        'establecimiento_id' => 'integer',
    ];


    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class);
    }

    public function establecimiento()
    {
        return $this->belongsTo(\App\Models\Establecimiento::class);
    }
}
