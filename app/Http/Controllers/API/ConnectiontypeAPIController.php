<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConnectiontypeAPIRequest;
use App\Http\Requests\API\UpdateConnectiontypeAPIRequest;
use App\Models\Connectiontype;
use App\Repositories\ConnectiontypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ConnectiontypeController
 * @package App\Http\Controllers\API
 */

class ConnectiontypeAPIController extends AppBaseController
{
    /** @var  ConnectiontypeRepository */
    private $connectiontypeRepository;

    public function __construct(ConnectiontypeRepository $connectiontypeRepo)
    {
        $this->connectiontypeRepository = $connectiontypeRepo;
    }

    /**
     * Display a listing of the Connectiontype.
     * GET|HEAD /connectiontypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $connectiontypes = $this->connectiontypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($connectiontypes->toArray(), 'Connectiontypes retrieved successfully');
    }

    /**
     * Store a newly created Connectiontype in storage.
     * POST /connectiontypes
     *
     * @param CreateConnectiontypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateConnectiontypeAPIRequest $request)
    {
        $input = $request->all();

        $connectiontypes = $this->connectiontypeRepository->create($input);

        return $this->sendResponse($connectiontypes->toArray(), 'Connectiontype saved successfully');
    }

    /**
     * Display the specified Connectiontype.
     * GET|HEAD /connectiontypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Connectiontype $connectiontype */
        $connectiontype = $this->connectiontypeRepository->find($id);

        if (empty($connectiontype)) {
            return $this->sendError('Connectiontype not found');
        }

        return $this->sendResponse($connectiontype->toArray(), 'Connectiontype retrieved successfully');
    }

    /**
     * Update the specified Connectiontype in storage.
     * PUT/PATCH /connectiontypes/{id}
     *
     * @param int $id
     * @param UpdateConnectiontypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConnectiontypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Connectiontype $connectiontype */
        $connectiontype = $this->connectiontypeRepository->find($id);

        if (empty($connectiontype)) {
            return $this->sendError('Connectiontype not found');
        }

        $connectiontype = $this->connectiontypeRepository->update($input, $id);

        return $this->sendResponse($connectiontype->toArray(), 'Connectiontype updated successfully');
    }

    /**
     * Remove the specified Connectiontype from storage.
     * DELETE /connectiontypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Connectiontype $connectiontype */
        $connectiontype = $this->connectiontypeRepository->find($id);

        if (empty($connectiontype)) {
            return $this->sendError('Connectiontype not found');
        }

        $connectiontype->delete();

        return $this->sendResponse($id, 'Connectiontype deleted successfully');
    }
}
