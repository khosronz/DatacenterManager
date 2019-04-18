<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePhonetypeRequest;
use App\Http\Requests\UpdatePhonetypeRequest;
use App\Repositories\PhonetypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PhonetypeController extends AppBaseController
{
    /** @var  PhonetypeRepository */
    private $phonetypeRepository;

    public function __construct(PhonetypeRepository $phonetypeRepo)
    {
        $this->phonetypeRepository = $phonetypeRepo;
    }

    /**
     * Display a listing of the Phonetype.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $phonetypes = $this->phonetypeRepository->paginate(10);

        return view('phonetypes.index')
            ->with('phonetypes', $phonetypes);
    }

    /**
     * Show the form for creating a new Phonetype.
     *
     * @return Response
     */
    public function create()
    {
        return view('phonetypes.create');
    }

    /**
     * Store a newly created Phonetype in storage.
     *
     * @param CreatePhonetypeRequest $request
     *
     * @return Response
     */
    public function store(CreatePhonetypeRequest $request)
    {
        $input = $request->all();

        $phonetype = $this->phonetypeRepository->create($input);

        Flash::success('Phonetype saved successfully.');

        return redirect(route('phonetypes.index'));
    }

    /**
     * Display the specified Phonetype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $phonetype = $this->phonetypeRepository->find($id);

        if (empty($phonetype)) {
            Flash::error('Phonetype not found');

            return redirect(route('phonetypes.index'));
        }

        return view('phonetypes.show')->with('phonetype', $phonetype);
    }

    /**
     * Show the form for editing the specified Phonetype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $phonetype = $this->phonetypeRepository->find($id);

        if (empty($phonetype)) {
            Flash::error('Phonetype not found');

            return redirect(route('phonetypes.index'));
        }

        return view('phonetypes.edit')->with('phonetype', $phonetype);
    }

    /**
     * Update the specified Phonetype in storage.
     *
     * @param int $id
     * @param UpdatePhonetypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePhonetypeRequest $request)
    {
        $phonetype = $this->phonetypeRepository->find($id);

        if (empty($phonetype)) {
            Flash::error('Phonetype not found');

            return redirect(route('phonetypes.index'));
        }

        $phonetype = $this->phonetypeRepository->update($request->all(), $id);

        Flash::success('Phonetype updated successfully.');

        return redirect(route('phonetypes.index'));
    }

    /**
     * Remove the specified Phonetype from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $phonetype = $this->phonetypeRepository->find($id);

        if (empty($phonetype)) {
            Flash::error('Phonetype not found');

            return redirect(route('phonetypes.index'));
        }

        $this->phonetypeRepository->delete($id);

        Flash::success('Phonetype deleted successfully.');

        return redirect(route('phonetypes.index'));
    }
}
