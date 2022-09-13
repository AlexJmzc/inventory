<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Equipo
 * 
 * @property int $Secuencial
 * @property int $SecuencialTipoEquipo
 * @property string $CedulaResponsable
 * @property string $Nombre
 * @property string $Codigo
 * @property int $MarcaEquipo
 * @property string|null $Modelo
 * @property string|null $Serie
 * @property string $DireccionIP
 * @property string $DireccionMAC
 * @property string $Dominio
 * @property int $PoseeConectividad
 * @property string|null $Observacion
 * @property int $ProcesadorSecuencial
 * @property int|null $ConectividadImpresora
 * @property string|null $IPImpresora
 * @property int|null $MarcaImpresora
 * @property string $CapacidadMemoria
 * @property int $MarcaDisco1
 * @property string $CapacidadDisco1
 * @property int|null $MarcaDisco2
 * @property string|null $CapacidadDisco2
 * 
 * @property Responsable $responsable
 * @property Marca|null $marca
 * @property Procesador $procesador
 * @property Tipoequipo $tipoequipo
 * @property Mantenimiento $mantenimiento
 * @property Collection|Programa[] $programas
 *
 * @package App\Models
 */
class Equipo extends Model
{
	protected $table = 'equipos';
	protected $primaryKey = 'Secuencial';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Secuencial' => 'int',
		'SecuencialTipoEquipo' => 'int',
		'MarcaEquipo' => 'int',
		'PoseeConectividad' => 'int',
		'ProcesadorSecuencial' => 'int',
		'ConectividadImpresora' => 'int',
		'MarcaImpresora' => 'int',
		'MarcaDisco1' => 'int',
		'MarcaDisco2' => 'int'
	];

	protected $fillable = [
		'SecuencialTipoEquipo',
		'CedulaResponsable',
		'Nombre',
		'Codigo',
		'MarcaEquipo',
		'Modelo',
		'Serie',
		'DireccionIP',
		'DireccionMAC',
		'Dominio',
		'PoseeConectividad',
		'Observacion',
		'ProcesadorSecuencial',
		'ConectividadImpresora',
		'IPImpresora',
		'MarcaImpresora',
		'CapacidadMemoria',
		'MarcaDisco1',
		'CapacidadDisco1',
		'MarcaDisco2',
		'CapacidadDisco2'
	];

	public function responsable()
	{
		return $this->belongsTo(Responsable::class, 'CedulaResponsable');
	}

	public function marca()
	{
		return $this->belongsTo(Marca::class, 'MarcaImpresora');
	}

	public function procesador()
	{
		return $this->belongsTo(Procesador::class, 'ProcesadorSecuencial');
	}

	public function tipoequipo()
	{
		return $this->belongsTo(Tipoequipo::class, 'SecuencialTipoEquipo');
	}

	public function mantenimiento()
	{
		return $this->hasOne(Mantenimiento::class, 'EquiposSecuencial');
	}

	public function programas()
	{
		return $this->hasMany(Programa::class, 'SecuencialEquipo');
	}
}
