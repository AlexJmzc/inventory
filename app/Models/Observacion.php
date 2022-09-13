<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Observacion
 * 
 * @property int $Secuencial
 * @property string $Descripcion
 * @property int $AccesoriosSecuencial
 * 
 * @property Accesorio $accesorio
 *
 * @package App\Models
 */
class Observacion extends Model
{
	protected $table = 'observacion';
	protected $primaryKey = 'Secuencial';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Secuencial' => 'int',
		'AccesoriosSecuencial' => 'int'
	];

	protected $fillable = [
		'Descripcion',
		'AccesoriosSecuencial'
	];

	public function accesorio()
	{
		return $this->belongsTo(Accesorio::class, 'AccesoriosSecuencial');
	}
}
