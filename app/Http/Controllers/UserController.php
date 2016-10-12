<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStore;
use App\Http\Requests\UserUpdate;
use App\Service\DataMessage;
use App\Service\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    use DataMessage;

    private $userService;

    /**
     * UserController constructor.
     * @param User $userService
     */
    public function __construct(User $userService)
    {
        $this->userService = $userService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.users.list');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return $this->userService->datatableData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles'] = $this->userService->role()->all();
        return view('backend.users.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStore $request)
    {
        $this->userService->store($request->except('_token'));

        return backendRedirect('user')->with($this->getMessage('store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = $this->userService->getUserById($id);
        $data['roles'] = $this->userService->role()->all();
        $data['selectedRoles'] = $this->userService->selectedRoles($id);

        return view('backend.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdate $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $request, $id)
    {
        $this->userService->update($id, $request->only(['name', 'email', 'sites', 'roles']));

        return backendRedirect('user')->with($this->getMessage('update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userService->destroy($id);

        return backendRedirect('user')->with($this->getMessage('delete'));
    }
}
