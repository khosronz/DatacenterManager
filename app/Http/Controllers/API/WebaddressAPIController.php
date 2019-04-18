<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWebaddressAPIRequest;
use App\Http\Requests\API\UpdateWebaddressAPIRequest;
use App\Models\Webaddress;
use App\Repositories\WebaddressRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class WebaddressController
 * @package App\Http\Controllers\API
 */

class WebaddressAPIController extends AppBaseController
{
    /** @var  WebaddressRepository */
    private $webaddressRepository;

    public function __construct(WebaddressRepository $webaddressRepo)
    {
        $this->webaddressRepository = $webaddressRepo;
    }

    /**
     * Display a listing of the Webaddress.
     * GET|HEAD /webaddresses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $webaddresses = $this->webaddressRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($webaddresses->toArray(), 'Webaddresses retrieved successfully');
    }

    /**
     * Store a newly created Webaddress in storage.
     * POST /webaddresses
     *
     * @param CreateWebaddressAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateWebaddressAPIRequest $request)
    {
        $input = $request->all();

        $webaddresses = $this->webaddressRepository->create($input);

        return $this->sendResponse($webaddresses->toArray(), 'Webaddress saved successfully');
    }

    /**
     * Display the specified Webaddress.
     * GET|HEAD /webaddresses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Webaddress $webaddress */
        $webaddress = $this->webaddressRepository->find($id);

        if (empty($webaddress)) {
            return $this->sendError('Webaddress not found');
        }

        return $this->sendResponse($webaddress->toArray(), 'Webaddress retrieved successfully');
    }

    /**
     * Update the specified Webaddress in storage.
     * PUT/PATCH /webaddresses/{id}
     *
     * @param int $id
     * @param UpdateWebaddressAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWebaddressAPIRequest $request)
    {
        $input = $request->all();

        /** @var Webaddress $webaddress */
        $webaddress = $this->webaddressRepository->find($id);

        if (empty($webaddress)) {
            return $this->sendError('Webaddress not found');
        }

        $webaddress = $this->webaddressRepository->update($input, $id);

        return $this->sendResponse($webaddress->toArray(), 'Webaddress updated successfully');
    }

    /**
     * Remove the specified Webaddress from storage.
     * DELETE /webaddresses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Webaddress $webaddress */
        $webaddress = $this->webaddressRepository->find($id);

        if (empty($webaddress)) {
            return $this->sendError('Webaddress not found');
        }

        $webaddress->delete();

        return $this->sendResponse($id, 'Webaddress deleted successfully');
    }
}
