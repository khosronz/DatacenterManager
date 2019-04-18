<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSoftwareorganizationAPIRequest;
use App\Http\Requests\API\UpdateSoftwareorganizationAPIRequest;
use App\Models\Softwareorganization;
use App\Repositories\SoftwareorganizationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SoftwareorganizationController
 * @package App\Http\Controllers\API
 */

class SoftwareorganizationAPIController extends AppBaseController
{
    /** @var  SoftwareorganizationRepository */
    private $softwareorganizationRepository;

    public function __construct(SoftwareorganizationRepository $softwareorganizationRepo)
    {
        $this->softwareorganizationRepository = $softwareorganizationRepo;
    }

    /**
     * Display a listing of the Softwareorganization.
     * GET|HEAD /softwareorganizations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $softwareorganizations = $this->softwareorganizationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($softwareorganizations->toArray(), 'Softwareorganizations retrieved successfully');
    }

    /**
     * Store a newly created Softwareorganization in storage.
     * POST /softwareorganizations
     *
     * @param CreateSoftwareorganizationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSoftwareorganizationAPIRequest $request)
    {
        $input = $request->all();

        $softwareorganizations = $this->softwareorganizationRepository->create($input);

        return $this->sendResponse($softwareorganizations->toArray(), 'Softwareorganization saved successfully');
    }

    /**
     * Display the specified Softwareorganization.
     * GET|HEAD /softwareorganizations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Softwareorganization $softwareorganization */
        $softwareorganization = $this->softwareorganizationRepository->find($id);

        if (empty($softwareorganization)) {
            return $this->sendError('Softwareorganization not found');
        }

        return $this->sendResponse($softwareorganization->toArray(), 'Softwareorganization retrieved successfully');
    }

    /**
     * Update the specified Softwareorganization in storage.
     * PUT/PATCH /softwareorganizations/{id}
     *
     * @param int $id
     * @param UpdateSoftwareorganizationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSoftwareorganizationAPIRequest $request)
    {
        $input = $request->all();

        /** @var Softwareorganization $softwareorganization */
        $softwareorganization = $this->softwareorganizationRepository->find($id);

        if (empty($softwareorganization)) {
            return $this->sendError('Softwareorganization not found');
        }

        $softwareorganization = $this->softwareorganizationRepository->update($input, $id);

        return $this->sendResponse($softwareorganization->toArray(), 'Softwareorganization updated successfully');
    }

    /**
     * Remove the specified Softwareorganization from storage.
     * DELETE /softwareorganizations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Softwareorganization $softwareorganization */
        $softwareorganization = $this->softwareorganizationRepository->find($id);

        if (empty($softwareorganization)) {
            return $this->sendError('Softwareorganization not found');
        }

        $softwareorganization->delete();

        return $this->sendResponse($id, 'Softwareorganization deleted successfully');
    }
}
