<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Responsable
 * 
 * @property string $Cedula
 * @property int $SecuencialDepartamento
 * @property string $PrimerNombre
 * @property string|null $SegundoNombre
 * @property string $ApellidoPaterno
 * @property string|null $ApellidoMaterno
 * @property string $FechaNacimiento
 * @property int $Activo
 * 
 * @property Departamento $departamento
 * @property Detalle $detalle
 * @property Collection|Equipo[] $equipos
 * @property Mantenimiento $mantenimiento
 *
 * @package App\Models
 */
class Responsable extends Model
{
	protected $table = 'responsable';
	protected $primaryKey = 'Cedula';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'SecuencialDepartamento' => 'int',
		'Activo' => 'int'
	];

	protected $fillable = [
		'SecuencialDepartamento',
		'PrimerNombre',
		'SegundoNombre',
		'ApellidoPaterno',
		'ApellidoMaterno',
		'FechaNacimiento',
		'Activo'
	];

	public function departamento()
	{
		return $this->belongsTo(Departamento::class, 'SecuencialDepartamento');
	}

	public function detalle()
	{
		return $this->hasOne(Detalle::class, 'ResponsableCedula');
	}

	public function equipos()
	{
		return $this->hasMany(Equipo::class, 'CedulaResponsable');
	}

	public function mantenimiento()
	{
		return $this->hasOne(Mantenimiento::class, 'ResponsableCedula');
	}
}
