<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDatabasetypeRequest;
use App\Http\Requests\UpdateDatabasetypeRequest;
use App\Repositories\DatabasetypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DatabasetypeController extends AppBaseController
{
    /** @var  DatabasetypeRepository */
    private $databasetypeRepository;

    public function __construct(DatabasetypeRepository $databasetypeRepo)
    {
        $this->databasetypeRepository = $databasetypeRepo;
    }

    /**
     * Display a listing of the Databasetype.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $databasetypes = $this->databasetypeRepository->paginate(10);

        return view('databasetypes.index')
            ->with('databasetypes', $databasetypes);
    }

    /**
     * Show the form for creating a new Databasetype.
     *
     * @return Response
     */
    public function create()
    {
        return view('databasetypes.create');
    }

    /**
     * Store a newly created Databasetype in storage.
     *
     * @param CreateDatabasetypeRequest $request
     *
     * @return Response
     */
    public function store(CreateDatabasetypeRequest $request)
    {
        $input = $request->all();

        $databasetype = $this->databasetypeRepository->create($input);

        Flash::success('Databasetype saved successfully.');

        return redirect(route('databasetypes.index'));
    }

    /**
     * Display the specified Databasetype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $databasetype = $this->databasetypeRepository->find($id);

        if (empty($databasetype)) {
            Flash::error('Databasetype not found');

            return redirect(route('databasetypes.index'));
        }

        return view('databasetypes.show')->with('databasetype', $databasetype);
    }

    /**
     * Show the form for editing the specified Databasetype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $databasetype = $this->databasetypeRepository->find($id);

        if (empty($databasetype)) {
            Flash::error('Databasetype not found');

            return redirect(route('databasetypes.index'));
        }

        return view('databasetypes.edit')->with('databasetype', $databasetype);
    }

    /**
     * Update the specified Databasetype in storage.
     *
     * @param int $id
     * @param UpdateDatabasetypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDatabasetypeRequest $request)
    {
        $databasetype = $this->databasetypeRepository->find($id);

        if (empty($databasetype)) {
            Flash::error('Databasetype not found');

            return redirect(route('databasetypes.index'));
        }

        $databasetype = $this->databasetypeRepository->update($request->all(), $id);

        Flash::success('Databasetype updated successfully.');

        return redirect(route('databasetypes.index'));
    }

    /**
     * Remove the specified Databasetype from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $databasetype = $this->databasetypeRepository->find($id);

        if (empty($databasetype)) {
            Flash::error('Databasetype not found');

            return redirect(route('databasetypes.index'));
        }

        $this->databasetypeRepository->delete($id);

        Flash::success('Databasetype deleted successfully.');

        return redirect(route('databasetypes.index'));
    }
}
