<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Repositories\UsersRepo;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagemetn\UserManagementStoreRequest;
use App\Http\Requests\UserManagemetn\UserManagementUpdateRequest;

class UserController extends Controller
{
    protected $usersRepo;
    public function __construct(UsersRepo $usersRepo)
    {
        $this->usersRepo = $usersRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Manajemen Pengguna -'  . request()->get('role') ? request()->get('role') : 'Semua';
        $data['users'] = $this->usersRepo->all(['role' => request()->get('role')]  );
        $data['role'] = request()->get('role');
        return view('page.dashboard.userManagement.wrapper', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $html = view('page.dashboard.userManagement.render.create')->render();
        return Helper::resJson('success', ['html' => $html], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserManagementStoreRequest $request)
    {
        $data = $request->validated();

        $this->usersRepo->store($data);
        return redirect()->route('dashboard.transaction.users.index', ['role' => request()->get('role')])->with('success', 'Pengguna berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['title']  = 'Detail Pengguna';
        $data['user']   = $this->usersRepo->find($id);
        return view('page.dashboard.userManagement.render.detail.wrapper', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['title']  = 'Ubah Pengguna';
        $data['user']  = $this->usersRepo->find($id);
        $data['roles'] = Role::all();
        $data['role'] = request()->get('role');
        return view('page.dashboard.userManagement.render.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserManagementUpdateRequest $request, $id)
    {
        $user = $this->usersRepo->find($id);
        if (!$user) {
            return Helper::resJson('User not found', [], 404);
        }
        $data = $request->validated();

        if(empty($data['password']))
        {
            unset($data['password']);
        }
        $this->usersRepo->update($id, $data);
        return redirect()->route('dashboard.transaction.users.edit', ['user' => $user->id, 'role' => request()->get('role')])->with('success', 'Pengguna berhasil diperbaharui');
    }

    public function destroy(string $id)
    {
        $this->usersRepo->destroy($id);
        return redirect()->route('dashboard.transaction.users.index')->with('success', 'Pengguna berhasil dihapus');
    }
}
