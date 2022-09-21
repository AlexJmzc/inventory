<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Programaequipo
 * 
 * @property int $SecuencialEquipo
 * @property int $SecuencialPrograma
 * @property int $Bits
 * @property int $Licencia
 * @property int $Activo
 * 
 * @property Tipobit $tipobit
 * @property Equipo $equipo
 * @property Programa $programa
 *
 * @package App\Models
 */
class Programaequipo extends Model
{
	protected $table = 'programaequipo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'SecuencialEquipo' => 'int',
		'SecuencialPrograma' => 'int',
		'Bits' => 'int',
		'Licencia' => 'int',
		'Activo' => 'int'
	];

	protected $fillable = [
		'SecuencialEquipo',
		'SecuencialPrograma',
		'Bits',
		'Licencia',
		'Activo'
	];

	public function tipobit()
	{
		return $this->belongsTo(Tipobit::class, 'Bits');
	}

	public function equipo()
	{
		return $this->belongsTo(Equipo::class, 'SecuencialEquipo');
	}

	public function programa()
	{
		return $this->belongsTo(Programa::class, 'SecuencialPrograma');
	}
}
