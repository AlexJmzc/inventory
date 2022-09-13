<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Marca
 * 
 * @property int $Secuencial
 * @property string $Nombre
 * @property int $Activo
 * 
 * @property Collection|Accesorio[] $accesorios
 * @property Collection|Equipo[] $equipos
 *
 * @package App\Models
 */
class Marca extends Model
{
	protected $table = 'marca';
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

	public function accesorios()
	{
		return $this->hasMany(Accesorio::class, 'Marca');
	}

	public function equipos()
	{
		return $this->hasMany(Equipo::class, 'MarcaImpresora');
	}
}
