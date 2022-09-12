<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipoequipo
 * 
 * @property int $Secuencial
 * @property string $Nombre
 * @property int $Activo
 * 
 * @property Collection|Equipo[] $equipos
 *
 * @package App\Models
 */
class Tipoequipo extends Model
{
	protected $table = 'tipoequipo';
	protected $primaryKey = 'Secuencial';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Secuencial' => 'int',
		'Activo' => 'int'
	];

	protected $fillable = [
		'Nombre',
		'Activo'
	];

	public function equipos()
	{
		return $this->hasMany(Equipo::class, 'SecuencialTipoEquipo');
	}
}
