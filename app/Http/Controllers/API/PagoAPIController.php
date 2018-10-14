<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePagoAPIRequest;
use App\Http\Requests\API\UpdatePagoAPIRequest;
use App\Models\Pago;
use App\Repositories\PagoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PagoController
 * @package App\Http\Controllers\API
 */

class PagoAPIController extends AppBaseController
{
    /** @var  PagoRepository */
    private $pagoRepository;

    public function __construct(PagoRepository $pagoRepo)
    {
        $this->pagoRepository = $pagoRepo;
    }

    /**
     * Display a listing of the Pago.
     * GET|HEAD /pagos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pagoRepository->pushCriteria(new RequestCriteria($request));
        $this->pagoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pagos = $this->pagoRepository->all();

        return $this->sendResponse($pagos->toArray(), 'Pagos retrieved successfully');
    }

    /**
     * Store a newly created Pago in storage.
     * POST /pagos
     *
     * @param CreatePagoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePagoAPIRequest $request)
    {
        $input = $request->all();

        $pagos = $this->pagoRepository->create($input);

        return $this->sendResponse($pagos->toArray(), 'Pago saved successfully');
    }

    /**
     * Display the specified Pago.
     * GET|HEAD /pagos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pago $pago */
        $pago = $this->pagoRepository->findWithoutFail($id);

        if (empty($pago)) {
            return $this->sendError('Pago not found');
        }

        return $this->sendResponse($pago->toArray(), 'Pago retrieved successfully');
    }

    /**
     * Update the specified Pago in storage.
     * PUT/PATCH /pagos/{id}
     *
     * @param  int $id
     * @param UpdatePagoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePagoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pago $pago */
        $pago = $this->pagoRepository->findWithoutFail($id);

        if (empty($pago)) {
            return $this->sendError('Pago not found');
        }

        $pago = $this->pagoRepository->update($input, $id);

        return $this->sendResponse($pago->toArray(), 'Pago updated successfully');
    }

    /**
     * Remove the specified Pago from storage.
     * DELETE /pagos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pago $pago */
        $pago = $this->pagoRepository->findWithoutFail($id);

        if (empty($pago)) {
            return $this->sendError('Pago not found');
        }

        $pago->delete();

        return $this->sendResponse($id, 'Pago deleted successfully');
    }
}
