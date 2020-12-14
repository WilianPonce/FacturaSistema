<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    
    
     public $allowed = ['periodo', 'razon_social', 'razon_comercial', 'ruc', 'direccion', 'telefono', 'email', 'email_password', 'email_server', 'email_port', 'email_security', 'obligado_contabilidad', 'contador_nombre', 'contador_ruc', 'representante_nombre', 'representante_ruc', 'periodo_inicio', 'periodo_fin', 'tipo_cuentas', 'logotipo', 'firma_electronica', 'firma_electronica_password', 'firma_electronica_expiracion', 'firma_electronica_actualizacion', 'tipo_emision', 'ambiente', 'facturar_negativo', 'moneda_id', 'provincia_id', 'ciudad_id', 'email_facturacion', 'leyenda_facturacion', 'created_at', 'updated_at'];

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
