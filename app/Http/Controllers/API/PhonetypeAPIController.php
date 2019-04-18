<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePhonetypeAPIRequest;
use App\Http\Requests\API\UpdatePhonetypeAPIRequest;
use App\Models\Phonetype;
use App\Repositories\PhonetypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PhonetypeController
 * @package App\Http\Controllers\API
 */

class PhonetypeAPIController extends AppBaseController
{
    /** @var  PhonetypeRepository */
    private $phonetypeRepository;

    public function __construct(PhonetypeRepository $phonetypeRepo)
    {
        $this->phonetypeRepository = $phonetypeRepo;
    }

    /**
     * Display a listing of the Phonetype.
     * GET|HEAD /phonetypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $phonetypes = $this->phonetypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($phonetypes->toArray(), 'Phonetypes retrieved successfully');
    }

    /**
     * Store a newly created Phonetype in storage.
     * POST /phonetypes
     *
     * @param CreatePhonetypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePhonetypeAPIRequest $request)
    {
        $input = $request->all();

        $phonetypes = $this->phonetypeRepository->create($input);

        return $this->sendResponse($phonetypes->toArray(), 'Phonetype saved successfully');
    }

    /**
     * Display the specified Phonetype.
     * GET|HEAD /phonetypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Phonetype $phonetype */
        $phonetype = $this->phonetypeRepository->find($id);

        if (empty($phonetype)) {
            return $this->sendError('Phonetype not found');
        }

        return $this->sendResponse($phonetype->toArray(), 'Phonetype retrieved successfully');
    }

    /**
     * Update the specified Phonetype in storage.
     * PUT/PATCH /phonetypes/{id}
     *
     * @param int $id
     * @param UpdatePhonetypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePhonetypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Phonetype $phonetype */
        $phonetype = $this->phonetypeRepository->find($id);

        if (empty($phonetype)) {
            return $this->sendError('Phonetype not found');
        }

        $phonetype = $this->phonetypeRepository->update($input, $id);

        return $this->sendResponse($phonetype->toArray(), 'Phonetype updated successfully');
    }

    /**
     * Remove the specified Phonetype from storage.
     * DELETE /phonetypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Phonetype $phonetype */
        $phonetype = $this->phonetypeRepository->find($id);

        if (empty($phonetype)) {
            return $this->sendError('Phonetype not found');
        }

        $phonetype->delete();

        return $this->sendResponse($id, 'Phonetype deleted successfully');
    }
}
