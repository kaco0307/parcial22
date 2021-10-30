<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bodega
 *
 * @property $Codigo_produc
 * @property $Nombre_Producto
 * @property $Numero_Cajas
 * @property $Edad_Minima
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bodega extends Model
{
    
    static $rules = [
		'Codigo_produc' => 'required|unique:bodegas',
		'Nombre_Producto' => 'required',
		'Numero_Cajas' => 'required',
		'Edad_Minima' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $table = "bodegas";
    protected $primaryKey = 'Codigo_produc';
    protected $fillable = ['Codigo_produc','Nombre_Producto','Numero_Cajas','Edad_Minima'];



}
