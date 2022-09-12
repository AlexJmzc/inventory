<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Programa
 * 
 * @property int $Secuencial
 * @property int $SecuencialEquipo
 * @property string|null $Descripcion
 * @property int $Activo
 * @property string $Nombre
 * @property string $Version
 * @property int $Licencia
 * @property int $Bits
 * 
 * @property Tipobit $tipobit
 * @property Equipo $equipo
 *
 * @package App\Models
 */
class Programa extends Model
{
	protected $table = 'programas';
	protected $primaryKey = 'Secuencial';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Secuencial' => 'int',
		'SecuencialEquipo' => 'int',
		'Activo' => 'int',
		'Licencia' => 'int',
		'Bits' => 'int'
	];

	protected $fillable = [
		'SecuencialEquipo',
		'Descripcion',
		'Activo',
		'Nombre',
		'Version',
		'Licencia',
		'Bits'
	];

	public function tipobit()
	{
		return $this->belongsTo(Tipobit::class, 'Bits');
	}

	public function equipo()
	{
		return $this->belongsTo(Equipo::class, 'SecuencialEquipo');
	}
}
