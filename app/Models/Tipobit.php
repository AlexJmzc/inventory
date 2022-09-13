<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipobit
 * 
 * @property int $Secuencial
 * @property string $Nombre
 * @property int $Activo
 * 
 * @property Collection|Programa[] $programas
 *
 * @package App\Models
 */
class Tipobit extends Model
{
	protected $table = 'tipobits';
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

	public function programas()
	{
		return $this->hasMany(Programa::class, 'Bits');
	}
}
