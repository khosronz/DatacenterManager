<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSoftwareAPIRequest;
use App\Http\Requests\API\UpdateSoftwareAPIRequest;
use App\Models\Software;
use App\Repositories\SoftwareRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SoftwareController
 * @package App\Http\Controllers\API
 */

class SoftwareAPIController extends AppBaseController
{
    /** @var  SoftwareRepository */
    private $softwareRepository;

    public function __construct(SoftwareRepository $softwareRepo)
    {
        $this->softwareRepository = $softwareRepo;
    }

    /**
     * Display a listing of the Software.
     * GET|HEAD /software
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $software = $this->softwareRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($software->toArray(), 'Software retrieved successfully');
    }

    /**
     * Store a newly created Software in storage.
     * POST /software
     *
     * @param CreateSoftwareAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSoftwareAPIRequest $request)
    {
        $input = $request->all();

        $software = $this->softwareRepository->create($input);

        return $this->sendResponse($software->toArray(), 'Software saved successfully');
    }

    /**
     * Display the specified Software.
     * GET|HEAD /software/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Software $software */
        $software = $this->softwareRepository->find($id);

        if (empty($software)) {
            return $this->sendError('Software not found');
        }

        return $this->sendResponse($software->toArray(), 'Software retrieved successfully');
    }

    /**
     * Update the specified Software in storage.
     * PUT/PATCH /software/{id}
     *
     * @param int $id
     * @param UpdateSoftwareAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSoftwareAPIRequest $request)
    {
        $input = $request->all();

        /** @var Software $software */
        $software = $this->softwareRepository->find($id);

        if (empty($software)) {
            return $this->sendError('Software not found');
        }

        $software = $this->softwareRepository->update($input, $id);

        return $this->sendResponse($software->toArray(), 'Software updated successfully');
    }

    /**
     * Remove the specified Software from storage.
     * DELETE /software/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Software $software */
        $software = $this->softwareRepository->find($id);

        if (empty($software)) {
            return $this->sendError('Software not found');
        }

        $software->delete();

        return $this->sendResponse($id, 'Software deleted successfully');
    }
}
