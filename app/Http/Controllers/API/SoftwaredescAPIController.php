<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSoftwaredescAPIRequest;
use App\Http\Requests\API\UpdateSoftwaredescAPIRequest;
use App\Models\Softwaredesc;
use App\Repositories\SoftwaredescRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SoftwaredescController
 * @package App\Http\Controllers\API
 */

class SoftwaredescAPIController extends AppBaseController
{
    /** @var  SoftwaredescRepository */
    private $softwaredescRepository;

    public function __construct(SoftwaredescRepository $softwaredescRepo)
    {
        $this->softwaredescRepository = $softwaredescRepo;
    }

    /**
     * Display a listing of the Softwaredesc.
     * GET|HEAD /softwaredescs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $softwaredescs = $this->softwaredescRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($softwaredescs->toArray(), 'Softwaredescs retrieved successfully');
    }

    /**
     * Store a newly created Softwaredesc in storage.
     * POST /softwaredescs
     *
     * @param CreateSoftwaredescAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSoftwaredescAPIRequest $request)
    {
        $input = $request->all();

        $softwaredescs = $this->softwaredescRepository->create($input);

        return $this->sendResponse($softwaredescs->toArray(), 'Softwaredesc saved successfully');
    }

    /**
     * Display the specified Softwaredesc.
     * GET|HEAD /softwaredescs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Softwaredesc $softwaredesc */
        $softwaredesc = $this->softwaredescRepository->find($id);

        if (empty($softwaredesc)) {
            return $this->sendError('Softwaredesc not found');
        }

        return $this->sendResponse($softwaredesc->toArray(), 'Softwaredesc retrieved successfully');
    }

    /**
     * Update the specified Softwaredesc in storage.
     * PUT/PATCH /softwaredescs/{id}
     *
     * @param int $id
     * @param UpdateSoftwaredescAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSoftwaredescAPIRequest $request)
    {
        $input = $request->all();

        /** @var Softwaredesc $softwaredesc */
        $softwaredesc = $this->softwaredescRepository->find($id);

        if (empty($softwaredesc)) {
            return $this->sendError('Softwaredesc not found');
        }

        $softwaredesc = $this->softwaredescRepository->update($input, $id);

        return $this->sendResponse($softwaredesc->toArray(), 'Softwaredesc updated successfully');
    }

    /**
     * Remove the specified Softwaredesc from storage.
     * DELETE /softwaredescs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Softwaredesc $softwaredesc */
        $softwaredesc = $this->softwaredescRepository->find($id);

        if (empty($softwaredesc)) {
            return $this->sendError('Softwaredesc not found');
        }

        $softwaredesc->delete();

        return $this->sendResponse($id, 'Softwaredesc deleted successfully');
    }
}
