<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Models\User;

class UsersRepo extends BaseRepository
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }
    public function find($id)
    {
        return $this->model->find($id);
    }
    public function findTrashUser($id)
    {
        return $this->model->withTrashed()->find($id);
    }
    public function first()
    {
        return $this->model->first();
    }
    public function store(array $data, $file_column = null, $file_path = null)
    {
        if($data['password']){
            $data['password'] = bcrypt($data['password']);
        }

        $user = $this->model->create($data);
        if($data['role'])
        {
            $user->assignRole($data['role']);
        }

        return $user;
    }

    public function update($id, array $data, $file_column = null, $file_path = null)
    {
        $user = $this->model->find($id);
        if (!empty($data['role'])) {
            $user->syncRoles($data['role']);
        }

        if (!empty($data['password'])) {
            $user->update([
                'password' => bcrypt($data['password'])
            ]);
        }

        return $user->update($data);
    }


    public function restoreUser($id)
    {
        $user = $this->model->withTrashed()->find($id);
        return $user->restore();
    }
    public function forceDestroy($id)
    {
        $user = $this->model->withTrashed()->find($id);
        Helper::deleteFile($user->photo);
        return $user->forceDelete();
    }
}
