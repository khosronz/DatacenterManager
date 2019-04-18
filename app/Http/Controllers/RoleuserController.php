<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleuserRequest;
use App\Http\Requests\UpdateRoleuserRequest;
use App\Repositories\RoleuserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class RoleuserController extends AppBaseController
{
    /** @var  RoleuserRepository */
    private $roleuserRepository;

    public function __construct(RoleuserRepository $roleuserRepo)
    {
        $this->roleuserRepository = $roleuserRepo;
    }

    /**
     * Display a listing of the Roleuser.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $roleusers = $this->roleuserRepository->paginate(10);

        return view('roleusers.index')
            ->with('roleusers', $roleusers);
    }

    /**
     * Show the form for creating a new Roleuser.
     *
     * @return Response
     */
    public function create()
    {
        return view('roleusers.create');
    }

    /**
     * Store a newly created Roleuser in storage.
     *
     * @param CreateRoleuserRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleuserRequest $request)
    {
        $input = $request->all();

        $roleuser = $this->roleuserRepository->create($input);

        Flash::success('Roleuser saved successfully.');

        return redirect(route('roleusers.index'));
    }

    /**
     * Display the specified Roleuser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roleuser = $this->roleuserRepository->find($id);

        if (empty($roleuser)) {
            Flash::error('Roleuser not found');

            return redirect(route('roleusers.index'));
        }

        return view('roleusers.show')->with('roleuser', $roleuser);
    }

    /**
     * Show the form for editing the specified Roleuser.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roleuser = $this->roleuserRepository->find($id);

        if (empty($roleuser)) {
            Flash::error('Roleuser not found');

            return redirect(route('roleusers.index'));
        }

        return view('roleusers.edit')->with('roleuser', $roleuser);
    }

    /**
     * Update the specified Roleuser in storage.
     *
     * @param int $id
     * @param UpdateRoleuserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleuserRequest $request)
    {
        $roleuser = $this->roleuserRepository->find($id);

        if (empty($roleuser)) {
            Flash::error('Roleuser not found');

            return redirect(route('roleusers.index'));
        }

        $roleuser = $this->roleuserRepository->update($request->all(), $id);

        Flash::success('Roleuser updated successfully.');

        return redirect(route('roleusers.index'));
    }

    /**
     * Remove the specified Roleuser from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roleuser = $this->roleuserRepository->find($id);

        if (empty($roleuser)) {
            Flash::error('Roleuser not found');

            return redirect(route('roleusers.index'));
        }

        $this->roleuserRepository->delete($id);

        Flash::success('Roleuser deleted successfully.');

        return redirect(route('roleusers.index'));
    }
}
