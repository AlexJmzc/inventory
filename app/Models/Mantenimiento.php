<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mantenimiento
 * 
 * @property string $ResponsableCedula
 * @property int $EquiposSecuencial
 * @property string $FechaMantenimiento
 * @property string $Observacion
 * 
 * @property Equipo $equipo
 * @property Responsable $responsable
 *
 * @package App\Models
 */
class Mantenimiento extends Model
{
	protected $table = 'mantenimiento';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'EquiposSecuencial' => 'int'
	];

	protected $fillable = [
		'ResponsableCedula',
		'EquiposSecuencial',
		'FechaMantenimiento',
		'Observacion'
	];

	public function equipo()
	{
		return $this->belongsTo(Equipo::class, 'EquiposSecuencial');
	}

	public function responsable()
	{
		return $this->belongsTo(Responsable::class, 'ResponsableCedula');
	}
}
