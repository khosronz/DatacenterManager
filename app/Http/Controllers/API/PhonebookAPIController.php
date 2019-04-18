<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePhonebookAPIRequest;
use App\Http\Requests\API\UpdatePhonebookAPIRequest;
use App\Models\Phonebook;
use App\Repositories\PhonebookRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PhonebookController
 * @package App\Http\Controllers\API
 */

class PhonebookAPIController extends AppBaseController
{
    /** @var  PhonebookRepository */
    private $phonebookRepository;

    public function __construct(PhonebookRepository $phonebookRepo)
    {
        $this->phonebookRepository = $phonebookRepo;
    }

    /**
     * Display a listing of the Phonebook.
     * GET|HEAD /phonebooks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $phonebooks = $this->phonebookRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($phonebooks->toArray(), 'Phonebooks retrieved successfully');
    }

    /**
     * Store a newly created Phonebook in storage.
     * POST /phonebooks
     *
     * @param CreatePhonebookAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePhonebookAPIRequest $request)
    {
        $input = $request->all();

        $phonebooks = $this->phonebookRepository->create($input);

        return $this->sendResponse($phonebooks->toArray(), 'Phonebook saved successfully');
    }

    /**
     * Display the specified Phonebook.
     * GET|HEAD /phonebooks/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Phonebook $phonebook */
        $phonebook = $this->phonebookRepository->find($id);

        if (empty($phonebook)) {
            return $this->sendError('Phonebook not found');
        }

        return $this->sendResponse($phonebook->toArray(), 'Phonebook retrieved successfully');
    }

    /**
     * Update the specified Phonebook in storage.
     * PUT/PATCH /phonebooks/{id}
     *
     * @param int $id
     * @param UpdatePhonebookAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePhonebookAPIRequest $request)
    {
        $input = $request->all();

        /** @var Phonebook $phonebook */
        $phonebook = $this->phonebookRepository->find($id);

        if (empty($phonebook)) {
            return $this->sendError('Phonebook not found');
        }

        $phonebook = $this->phonebookRepository->update($input, $id);

        return $this->sendResponse($phonebook->toArray(), 'Phonebook updated successfully');
    }

    /**
     * Remove the specified Phonebook from storage.
     * DELETE /phonebooks/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Phonebook $phonebook */
        $phonebook = $this->phonebookRepository->find($id);

        if (empty($phonebook)) {
            return $this->sendError('Phonebook not found');
        }

        $phonebook->delete();

        return $this->sendResponse($id, 'Phonebook deleted successfully');
    }
}
