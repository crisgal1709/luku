<?php

namespace App\Repositories;

use App\Models\Archivo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ArchivoRepository
 * @package App\Repositories
 * @version October 14, 2018, 2:58 pm -05
 *
 * @method Archivo findWithoutFail($id, $columns = ['*'])
 * @method Archivo find($id, $columns = ['*'])
 * @method Archivo first($columns = ['*'])
*/
class ArchivoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'path',
        'nombre',
        'tamanio'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Archivo::class;
    }
}
