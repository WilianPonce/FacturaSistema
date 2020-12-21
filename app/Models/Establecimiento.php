<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
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
    ];


    public function puntoEmisions()
    {
        return $this->hasMany(\App\Models\PuntoEmision::class);
    }

    public function empresa()
    {
        return $this->belongsTo(\App\Models\Empresa::class);
    }
}
