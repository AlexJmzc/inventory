<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Accesorio
 * 
 * @property int $Secuencial
 * @property int $SecuencialTipoAccesorio
 * @property string $Codigo
 * @property int|null $Marca
 * @property string|null $Serie
 * @property string|null $Modelo
 * @property string|null $Descripcion
 * 
 * @property Marca|null $marca
 * @property Tipoaccesorio $tipoaccesorio
 * @property Detalle $detalle
 * @property Collection|Observacion[] $observacions
 *
 * @package App\Models
 */
class Accesorio extends Model
{
	protected $table = 'accesorios';
	protected $primaryKey = 'Secuencial';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Secuencial' => 'int',
		'SecuencialTipoAccesorio' => 'int',
		'Marca' => 'int'
	];

	protected $fillable = [
		'SecuencialTipoAccesorio',
		'Codigo',
		'Marca',
		'Serie',
		'Modelo',
		'Descripcion'
	];

	public function marca()
	{
		return $this->belongsTo(Marca::class, 'Marca');
	}

	public function tipoaccesorio()
	{
		return $this->belongsTo(Tipoaccesorio::class, 'SecuencialTipoAccesorio');
	}

	public function detalle()
	{
		return $this->hasOne(Detalle::class, 'AccesoriosSecuencial');
	}

	public function observacions()
	{
		return $this->hasMany(Observacion::class, 'AccesoriosSecuencial');
	}
}
