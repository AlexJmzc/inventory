<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipobit
 * 
 * @property int $Secuencial
 * @property string $Nombre
 * @property int $Activo
 * 
 * @property Programaequipo $programaequipo
 *
 * @package App\Models
 */
class Tipobit extends Model
{
	protected $table = 'tipobits';
	protected $primaryKey = 'Secuencial';
	public $timestamps = false;

	protected $casts = [
		'Activo' => 'int'
	];

	protected $fillable = [
		'Nombre',
		'Activo'
	];

	public function programaequipo()
	{
		return $this->hasOne(Programaequipo::class, 'Bits');
	}
}
