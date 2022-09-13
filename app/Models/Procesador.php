<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Procesador
 * 
 * @property int $Secuencial
 * @property string $Nombre
 * @property string $Velocidad
 * 
 * @property Collection|Equipo[] $equipos
 *
 * @package App\Models
 */
class Procesador extends Model
{
	protected $table = 'procesador';
	protected $primaryKey = 'Secuencial';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Secuencial' => 'int'
	];

	protected $fillable = [
		'Nombre',
		'Velocidad'
	];

	public function equipos()
	{
		return $this->hasMany(Equipo::class, 'ProcesadorSecuencial');
	}
}
