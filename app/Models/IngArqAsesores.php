<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngArqAsesores extends Model
{
    public $table='Asesores';
    protected $fillable=['Id_Asesor','Nombre','Apellido','Dni','Email','celular','Direccion','Fecha_Nac','CuentaBancaria','CuentaInterbancaria','Foto'];
    protected $primaryKey='Id_Asesor';
    public $timestamps=false;
    use HasFactory;
}
