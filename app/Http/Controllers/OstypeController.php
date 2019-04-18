<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOstypeRequest;
use App\Http\Requests\UpdateOstypeRequest;
use App\Repositories\OstypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class OstypeController extends AppBaseController
{
    /** @var  OstypeRepository */
    private $ostypeRepository;

    public function __construct(OstypeRepository $ostypeRepo)
    {
        $this->ostypeRepository = $ostypeRepo;
    }

    /**
     * Display a listing of the Ostype.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ostypes = $this->ostypeRepository->paginate(10);

        return view('ostypes.index')
            ->with('ostypes', $ostypes);
    }

    /**
     * Show the form for creating a new Ostype.
     *
     * @return Response
     */
    public function create()
    {
        return view('ostypes.create');
    }

    /**
     * Store a newly created Ostype in storage.
     *
     * @param CreateOstypeRequest $request
     *
     * @return Response
     */
    public function store(CreateOstypeRequest $request)
    {
        $input = $request->all();

        $ostype = $this->ostypeRepository->create($input);

        Flash::success('Ostype saved successfully.');

        return redirect(route('ostypes.index'));
    }

    /**
     * Display the specified Ostype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ostype = $this->ostypeRepository->find($id);

        if (empty($ostype)) {
            Flash::error('Ostype not found');

            return redirect(route('ostypes.index'));
        }

        return view('ostypes.show')->with('ostype', $ostype);
    }

    /**
     * Show the form for editing the specified Ostype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ostype = $this->ostypeRepository->find($id);

        if (empty($ostype)) {
            Flash::error('Ostype not found');

            return redirect(route('ostypes.index'));
        }

        return view('ostypes.edit')->with('ostype', $ostype);
    }

    /**
     * Update the specified Ostype in storage.
     *
     * @param int $id
     * @param UpdateOstypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOstypeRequest $request)
    {
        $ostype = $this->ostypeRepository->find($id);

        if (empty($ostype)) {
            Flash::error('Ostype not found');

            return redirect(route('ostypes.index'));
        }

        $ostype = $this->ostypeRepository->update($request->all(), $id);

        Flash::success('Ostype updated successfully.');

        return redirect(route('ostypes.index'));
    }

    /**
     * Remove the specified Ostype from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ostype = $this->ostypeRepository->find($id);

        if (empty($ostype)) {
            Flash::error('Ostype not found');

            return redirect(route('ostypes.index'));
        }

        $this->ostypeRepository->delete($id);

        Flash::success('Ostype deleted successfully.');

        return redirect(route('ostypes.index'));
    }
}
