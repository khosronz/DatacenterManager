<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOstypeAPIRequest;
use App\Http\Requests\API\UpdateOstypeAPIRequest;
use App\Models\Ostype;
use App\Repositories\OstypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OstypeController
 * @package App\Http\Controllers\API
 */

class OstypeAPIController extends AppBaseController
{
    /** @var  OstypeRepository */
    private $ostypeRepository;

    public function __construct(OstypeRepository $ostypeRepo)
    {
        $this->ostypeRepository = $ostypeRepo;
    }

    /**
     * Display a listing of the Ostype.
     * GET|HEAD /ostypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $ostypes = $this->ostypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($ostypes->toArray(), 'Ostypes retrieved successfully');
    }

    /**
     * Store a newly created Ostype in storage.
     * POST /ostypes
     *
     * @param CreateOstypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOstypeAPIRequest $request)
    {
        $input = $request->all();

        $ostypes = $this->ostypeRepository->create($input);

        return $this->sendResponse($ostypes->toArray(), 'Ostype saved successfully');
    }

    /**
     * Display the specified Ostype.
     * GET|HEAD /ostypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Ostype $ostype */
        $ostype = $this->ostypeRepository->find($id);

        if (empty($ostype)) {
            return $this->sendError('Ostype not found');
        }

        return $this->sendResponse($ostype->toArray(), 'Ostype retrieved successfully');
    }

    /**
     * Update the specified Ostype in storage.
     * PUT/PATCH /ostypes/{id}
     *
     * @param int $id
     * @param UpdateOstypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOstypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ostype $ostype */
        $ostype = $this->ostypeRepository->find($id);

        if (empty($ostype)) {
            return $this->sendError('Ostype not found');
        }

        $ostype = $this->ostypeRepository->update($input, $id);

        return $this->sendResponse($ostype->toArray(), 'Ostype updated successfully');
    }

    /**
     * Remove the specified Ostype from storage.
     * DELETE /ostypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Ostype $ostype */
        $ostype = $this->ostypeRepository->find($id);

        if (empty($ostype)) {
            return $this->sendError('Ostype not found');
        }

        $ostype->delete();

        return $this->sendResponse($id, 'Ostype deleted successfully');
    }
}
