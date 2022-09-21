<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Departamento
 * 
 * @property int $Secuencial
 * @property string $CodigoDepartamento
 * @property string $NombreDepartamento
 * @property string $Direccion
 * @property int $Activo
 * 
 * @property Collection|Responsable[] $responsables
 *
 * @package App\Models
 */
class Departamento extends Model
{
	protected $table = 'departamento';
	protected $primaryKey = 'Secuencial';
	public $timestamps = false;

	protected $casts = [
		'Activo' => 'int'
	];

	protected $fillable = [
		'CodigoDepartamento',
		'NombreDepartamento',
		'Direccion',
		'Activo'
	];

	public function responsables()
	{
		return $this->hasMany(Responsable::class, 'SecuencialDepartamento');
	}
}
