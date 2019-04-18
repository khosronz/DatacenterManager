<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOsAPIRequest;
use App\Http\Requests\API\UpdateOsAPIRequest;
use App\Models\Os;
use App\Repositories\OsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OsController
 * @package App\Http\Controllers\API
 */

class OsAPIController extends AppBaseController
{
    /** @var  OsRepository */
    private $osRepository;

    public function __construct(OsRepository $osRepo)
    {
        $this->osRepository = $osRepo;
    }

    /**
     * Display a listing of the Os.
     * GET|HEAD /os
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $os = $this->osRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($os->toArray(), 'Os retrieved successfully');
    }

    /**
     * Store a newly created Os in storage.
     * POST /os
     *
     * @param CreateOsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOsAPIRequest $request)
    {
        $input = $request->all();

        $os = $this->osRepository->create($input);

        return $this->sendResponse($os->toArray(), 'Os saved successfully');
    }

    /**
     * Display the specified Os.
     * GET|HEAD /os/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Os $os */
        $os = $this->osRepository->find($id);

        if (empty($os)) {
            return $this->sendError('Os not found');
        }

        return $this->sendResponse($os->toArray(), 'Os retrieved successfully');
    }

    /**
     * Update the specified Os in storage.
     * PUT/PATCH /os/{id}
     *
     * @param int $id
     * @param UpdateOsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Os $os */
        $os = $this->osRepository->find($id);

        if (empty($os)) {
            return $this->sendError('Os not found');
        }

        $os = $this->osRepository->update($input, $id);

        return $this->sendResponse($os->toArray(), 'Os updated successfully');
    }

    /**
     * Remove the specified Os from storage.
     * DELETE /os/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Os $os */
        $os = $this->osRepository->find($id);

        if (empty($os)) {
            return $this->sendError('Os not found');
        }

        $os->delete();

        return $this->sendResponse($id, 'Os deleted successfully');
    }
}
