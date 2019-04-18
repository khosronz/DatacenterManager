<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePhonebookRequest;
use App\Http\Requests\UpdatePhonebookRequest;
use App\Repositories\PhonebookRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PhonebookController extends AppBaseController
{
    /** @var  PhonebookRepository */
    private $phonebookRepository;

    public function __construct(PhonebookRepository $phonebookRepo)
    {
        $this->phonebookRepository = $phonebookRepo;
    }

    /**
     * Display a listing of the Phonebook.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $phonebooks = $this->phonebookRepository->paginate(10);

        return view('phonebooks.index')
            ->with('phonebooks', $phonebooks);
    }

    /**
     * Show the form for creating a new Phonebook.
     *
     * @return Response
     */
    public function create()
    {
        return view('phonebooks.create');
    }

    /**
     * Store a newly created Phonebook in storage.
     *
     * @param CreatePhonebookRequest $request
     *
     * @return Response
     */
    public function store(CreatePhonebookRequest $request)
    {
        $input = $request->all();

        $phonebook = $this->phonebookRepository->create($input);

        Flash::success('Phonebook saved successfully.');

        return redirect(route('phonebooks.index'));
    }

    /**
     * Display the specified Phonebook.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $phonebook = $this->phonebookRepository->find($id);

        if (empty($phonebook)) {
            Flash::error('Phonebook not found');

            return redirect(route('phonebooks.index'));
        }

        return view('phonebooks.show')->with('phonebook', $phonebook);
    }

    /**
     * Show the form for editing the specified Phonebook.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $phonebook = $this->phonebookRepository->find($id);

        if (empty($phonebook)) {
            Flash::error('Phonebook not found');

            return redirect(route('phonebooks.index'));
        }

        return view('phonebooks.edit')->with('phonebook', $phonebook);
    }

    /**
     * Update the specified Phonebook in storage.
     *
     * @param int $id
     * @param UpdatePhonebookRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePhonebookRequest $request)
    {
        $phonebook = $this->phonebookRepository->find($id);

        if (empty($phonebook)) {
            Flash::error('Phonebook not found');

            return redirect(route('phonebooks.index'));
        }

        $phonebook = $this->phonebookRepository->update($request->all(), $id);

        Flash::success('Phonebook updated successfully.');

        return redirect(route('phonebooks.index'));
    }

    /**
     * Remove the specified Phonebook from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $phonebook = $this->phonebookRepository->find($id);

        if (empty($phonebook)) {
            Flash::error('Phonebook not found');

            return redirect(route('phonebooks.index'));
        }

        $this->phonebookRepository->delete($id);

        Flash::success('Phonebook deleted successfully.');

        return redirect(route('phonebooks.index'));
    }
}
