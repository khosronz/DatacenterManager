<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSoftwareuserRequest;
use App\Http\Requests\UpdateSoftwareuserRequest;
use App\Repositories\SoftwareuserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SoftwareuserController extends AppBaseController
{
    /** @var  SoftwareuserRepository */
    private $softwareuserRepository;

    public function __construct(SoftwareuserRepository $softwareuserRepo)
    {
        $this->softwareuserRepository = $softwareuserRepo;
    }

    /**
     * Display a listing of the Softwareuser.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $softwareusers = $this->softwareuserRepository->paginate(10);

        return view('softwareusers.index')
            ->with('softwareusers', $softwareusers);
    }

    /**
     * Show the form for creating a new Softwareuser.
     *
     * @return Response
     */
    public function create()
    {
        return view('softwareusers.create');
    }

    /**
     * Store a newly created Softwareuser in storage.
     *
     * @param CreateSoftwareuserRequest $request
     *
     * @return Response
     */
    public function store(CreateSoftwareuserRequest $request)
    {
        $input = $request->all();

        $softwareuser = $this->softwareuserRepository->create($input);

        Flash::success('Softwareuser saved successfully.');

        return redirect(route('softwareusers.index'));
    }

    /**
     * Display the specified Softwareuser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $softwareuser = $this->softwareuserRepository->find($id);

        if (empty($softwareuser)) {
            Flash::error('Softwareuser not found');

            return redirect(route('softwareusers.index'));
        }

        return view('softwareusers.show')->with('softwareuser', $softwareuser);
    }

    /**
     * Show the form for editing the specified Softwareuser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $softwareuser = $this->softwareuserRepository->find($id);

        if (empty($softwareuser)) {
            Flash::error('Softwareuser not found');

            return redirect(route('softwareusers.index'));
        }

        return view('softwareusers.edit')->with('softwareuser', $softwareuser);
    }

    /**
     * Update the specified Softwareuser in storage.
     *
     * @param int $id
     * @param UpdateSoftwareuserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSoftwareuserRequest $request)
    {
        $softwareuser = $this->softwareuserRepository->find($id);

        if (empty($softwareuser)) {
            Flash::error('Softwareuser not found');

            return redirect(route('softwareusers.index'));
        }

        $softwareuser = $this->softwareuserRepository->update($request->all(), $id);

        Flash::success('Softwareuser updated successfully.');

        return redirect(route('softwareusers.index'));
    }

    /**
     * Remove the specified Softwareuser from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $softwareuser = $this->softwareuserRepository->find($id);

        if (empty($softwareuser)) {
            Flash::error('Softwareuser not found');

            return redirect(route('softwareusers.index'));
        }

        $this->softwareuserRepository->delete($id);

        Flash::success('Softwareuser deleted successfully.');

        return redirect(route('softwareusers.index'));
    }
}
