<?php

namespace App\Repositories;

use App\Models\Pago;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PagoRepository
 * @package App\Repositories
 * @version October 14, 2018, 2:20 pm -05
 *
 * @method Pago findWithoutFail($id, $columns = ['*'])
 * @method Pago find($id, $columns = ['*'])
 * @method Pago first($columns = ['*'])
*/
class PagoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha',
        'monto',
        'observaciones'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pago::class;
    }
}
