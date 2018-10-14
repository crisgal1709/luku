<?php

namespace App\Models;

use App\Traits\HasUser;
use Eloquent as Model;
use Exception, Storage;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Archivo
 * @package App\Models
 * @version October 14, 2018, 2:58 pm -05
 *
 * @property string path
 * @property string nombre
 * @property string tamanio
 * @property integer user_id
 */
class Archivo extends Model
{
    use SoftDeletes;
    use HasUser;

    public $table = 'archivos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'path',
        'nombre',
        'tamanio',
        'disk',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'path' => 'string',
        'nombre' => 'string',
        'tamanio' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function archivable(){
        return $this->morphTo();
    }

    public function getArchivo()
    {
        $disk = $this->disk;

        try {
            $archivo = Storage::disk($disk)->get($this->path);
            return $archivo;
        } catch (FileNotFoundException $e) {
            return false;
        }
    }
    
}
