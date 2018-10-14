<?php

namespace App\Models;

use App\Traits\HasArchivos;
use App\Traits\HasUser;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pago
 * @package App\Models
 * @version October 14, 2018, 2:20 pm -05
 *
 * @property string fecha
 * @property string monto
 * @property string observaciones
 * @property integer user_id
 */
class Pago extends Model
{
    use SoftDeletes;
    use HasUser;
    use HasArchivos;

    public $table = 'pagos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'fecha',
        'monto',
        'observaciones',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha' => 'string',
        'monto' => 'float',
        'observaciones' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha' => 'required',
        'monto' => 'required'
    ];

    
}
