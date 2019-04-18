<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConnectiontypeRequest;
use App\Http\Requests\UpdateConnectiontypeRequest;
use App\Repositories\ConnectiontypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ConnectiontypeController extends AppBaseController
{
    /** @var  ConnectiontypeRepository */
    private $connectiontypeRepository;

    public function __construct(ConnectiontypeRepository $connectiontypeRepo)
    {
        $this->connectiontypeRepository = $connectiontypeRepo;
    }

    /**
     * Display a listing of the Connectiontype.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $connectiontypes = $this->connectiontypeRepository->paginate(10);

        return view('connectiontypes.index')
            ->with('connectiontypes', $connectiontypes);
    }

    /**
     * Show the form for creating a new Connectiontype.
     *
     * @return Response
     */
    public function create()
    {
        return view('connectiontypes.create');
    }

    /**
     * Store a newly created Connectiontype in storage.
     *
     * @param CreateConnectiontypeRequest $request
     *
     * @return Response
     */
    public function store(CreateConnectiontypeRequest $request)
    {
        $input = $request->all();

        $connectiontype = $this->connectiontypeRepository->create($input);

        Flash::success('Connectiontype saved successfully.');

        return redirect(route('connectiontypes.index'));
    }

    /**
     * Display the specified Connectiontype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $connectiontype = $this->connectiontypeRepository->find($id);

        if (empty($connectiontype)) {
            Flash::error('Connectiontype not found');

            return redirect(route('connectiontypes.index'));
        }

        return view('connectiontypes.show')->with('connectiontype', $connectiontype);
    }

    /**
     * Show the form for editing the specified Connectiontype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $connectiontype = $this->connectiontypeRepository->find($id);

        if (empty($connectiontype)) {
            Flash::error('Connectiontype not found');

            return redirect(route('connectiontypes.index'));
        }

        return view('connectiontypes.edit')->with('connectiontype', $connectiontype);
    }

    /**
     * Update the specified Connectiontype in storage.
     *
     * @param int $id
     * @param UpdateConnectiontypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConnectiontypeRequest $request)
    {
        $connectiontype = $this->connectiontypeRepository->find($id);

        if (empty($connectiontype)) {
            Flash::error('Connectiontype not found');

            return redirect(route('connectiontypes.index'));
        }

        $connectiontype = $this->connectiontypeRepository->update($request->all(), $id);

        Flash::success('Connectiontype updated successfully.');

        return redirect(route('connectiontypes.index'));
    }

    /**
     * Remove the specified Connectiontype from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $connectiontype = $this->connectiontypeRepository->find($id);

        if (empty($connectiontype)) {
            Flash::error('Connectiontype not found');

            return redirect(route('connectiontypes.index'));
        }

        $this->connectiontypeRepository->delete($id);

        Flash::success('Connectiontype deleted successfully.');

        return redirect(route('connectiontypes.index'));
    }
}
