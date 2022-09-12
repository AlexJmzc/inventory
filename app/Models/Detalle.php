<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detalle
 * 
 * @property string $ResponsableCedula
 * @property int $AccesoriosSecuencial
 * @property string $FechaEntrega
 * @property string|null $FechaDevolucion
 * 
 * @property Accesorio $accesorio
 * @property Responsable $responsable
 *
 * @package App\Models
 */
class Detalle extends Model
{
	protected $table = 'detalle';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'AccesoriosSecuencial' => 'int'
	];

	protected $fillable = [
		'ResponsableCedula',
		'AccesoriosSecuencial',
		'FechaEntrega',
		'FechaDevolucion'
	];

	public function accesorio()
	{
		return $this->belongsTo(Accesorio::class, 'AccesoriosSecuencial');
	}

	public function responsable()
	{
		return $this->belongsTo(Responsable::class, 'ResponsableCedula');
	}
}
