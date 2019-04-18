<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDatabaseRequest;
use App\Http\Requests\UpdateDatabaseRequest;
use App\Repositories\DatabaseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DatabaseController extends AppBaseController
{
    /** @var  DatabaseRepository */
    private $databaseRepository;

    public function __construct(DatabaseRepository $databaseRepo)
    {
        $this->databaseRepository = $databaseRepo;
    }

    /**
     * Display a listing of the Database.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $databases = $this->databaseRepository->paginate(10);

        return view('databases.index')
            ->with('databases', $databases);
    }

    /**
     * Show the form for creating a new Database.
     *
     * @return Response
     */
    public function create()
    {
        return view('databases.create');
    }

    /**
     * Store a newly created Database in storage.
     *
     * @param CreateDatabaseRequest $request
     *
     * @return Response
     */
    public function store(CreateDatabaseRequest $request)
    {
        $input = $request->all();
        $input['password'] = encrypt($input['password']);

        $database = $this->databaseRepository->create($input);

        Flash::success('Database saved successfully.');

        return redirect(route('databases.index'));
    }

    /**
     * Display the specified Database.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $database = $this->databaseRepository->find($id);

        if (empty($database)) {
            Flash::error('Database not found');

            return redirect(route('databases.index'));
        }

        return view('databases.show')->with('database', $database);
    }

    /**
     * Show the form for editing the specified Database.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $database = $this->databaseRepository->find($id);

        if (empty($database)) {
            Flash::error('Database not found');

            return redirect(route('databases.index'));
        }

        return view('databases.edit')->with('database', $database);
    }

    /**
     * Update the specified Database in storage.
     *
     * @param int $id
     * @param UpdateDatabaseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDatabaseRequest $request)
    {
        $input = $request->all();
        $input['password'] = encrypt($input['password']);

        $database = $this->databaseRepository->find($id);

        if (empty($database)) {
            Flash::error('Database not found');

            return redirect(route('databases.index'));
        }

        $database = $this->databaseRepository->update($input, $id);

        Flash::success('Database updated successfully.');

        return redirect(route('databases.index'));
    }

    /**
     * Remove the specified Database from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $database = $this->databaseRepository->find($id);

        if (empty($database)) {
            Flash::error('Database not found');

            return redirect(route('databases.index'));
        }

        $this->databaseRepository->delete($id);

        Flash::success('Database deleted successfully.');

        return redirect(route('databases.index'));
    }
}
