<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAll extends Model
{
    protected $table="users";
    protected $primaryKey ='id';
    protected $fillable =['name', 'email', 'telefono', 'celular', 'tipo_sangre', 'direccion', 'nombre_familiar', 'contacto_familiar', 'email_verified_at', 'password', 'two_factor_secret', 'two_factor_recovery_codes', 'remember_token', 'current_team_id', 'empresa_id', 'establecimiento_id', 'punto_emision_id', 'profile_photo_path', 'estado'];
}
