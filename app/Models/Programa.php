<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Programa
 * 
 * @property int $Secuencial
 * @property string $Nombre
 * @property string $Version
 * @property string $Descripcion
 * 
 * @property Collection|Equipo[] $equipos
 *
 * @package App\Models
 */
class Programa extends Model
{
	protected $table = 'programas';
	protected $primaryKey = 'Secuencial';
	public $timestamps = false;

	protected $fillable = [
		'Nombre',
		'Version',
		'Descripcion'
	];

	public function equipos()
	{
		return $this->belongsToMany(Equipo::class, 'programaequipo', 'SecuencialPrograma', 'SecuencialEquipo')
					->withPivot('Bits', 'Licencia', 'Activo');
	}
}
