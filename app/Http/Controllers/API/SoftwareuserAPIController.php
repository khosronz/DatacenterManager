<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSoftwareuserAPIRequest;
use App\Http\Requests\API\UpdateSoftwareuserAPIRequest;
use App\Models\Softwareuser;
use App\Repositories\SoftwareuserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SoftwareuserController
 * @package App\Http\Controllers\API
 */

class SoftwareuserAPIController extends AppBaseController
{
    /** @var  SoftwareuserRepository */
    private $softwareuserRepository;

    public function __construct(SoftwareuserRepository $softwareuserRepo)
    {
        $this->softwareuserRepository = $softwareuserRepo;
    }

    /**
     * Display a listing of the Softwareuser.
     * GET|HEAD /softwareusers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $softwareusers = $this->softwareuserRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($softwareusers->toArray(), 'Softwareusers retrieved successfully');
    }

    /**
     * Store a newly created Softwareuser in storage.
     * POST /softwareusers
     *
     * @param CreateSoftwareuserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSoftwareuserAPIRequest $request)
    {
        $input = $request->all();

        $softwareusers = $this->softwareuserRepository->create($input);

        return $this->sendResponse($softwareusers->toArray(), 'Softwareuser saved successfully');
    }

    /**
     * Display the specified Softwareuser.
     * GET|HEAD /softwareusers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Softwareuser $softwareuser */
        $softwareuser = $this->softwareuserRepository->find($id);

        if (empty($softwareuser)) {
            return $this->sendError('Softwareuser not found');
        }

        return $this->sendResponse($softwareuser->toArray(), 'Softwareuser retrieved successfully');
    }

    /**
     * Update the specified Softwareuser in storage.
     * PUT/PATCH /softwareusers/{id}
     *
     * @param int $id
     * @param UpdateSoftwareuserAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSoftwareuserAPIRequest $request)
    {
        $input = $request->all();

        /** @var Softwareuser $softwareuser */
        $softwareuser = $this->softwareuserRepository->find($id);

        if (empty($softwareuser)) {
            return $this->sendError('Softwareuser not found');
        }

        $softwareuser = $this->softwareuserRepository->update($input, $id);

        return $this->sendResponse($softwareuser->toArray(), 'Softwareuser updated successfully');
    }

    /**
     * Remove the specified Softwareuser from storage.
     * DELETE /softwareusers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Softwareuser $softwareuser */
        $softwareuser = $this->softwareuserRepository->find($id);

        if (empty($softwareuser)) {
            return $this->sendError('Softwareuser not found');
        }

        $softwareuser->delete();

        return $this->sendResponse($id, 'Softwareuser deleted successfully');
    }
}
