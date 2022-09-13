<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipoaccesorio
 * 
 * @property int $Secuencial
 * @property string $Nombre
 * @property int $EntradaSalida
 * @property int $Activo
 * 
 * @property Collection|Accesorio[] $accesorios
 *
 * @package App\Models
 */
class Tipoaccesorio extends Model
{
	protected $table = 'tipoaccesorio';
	protected $primaryKey = 'Secuencial';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Secuencial' => 'int',
		'EntradaSalida' => 'int',
		'Activo' => 'int'
	];

	protected $fillable = [
		'Nombre',
		'EntradaSalida',
		'Activo'
	];

	public function accesorios()
	{
		return $this->hasMany(Accesorio::class, 'SecuencialTipoAccesorio');
	}
}
