<?php
namespace App\Repositories;

use App\Helper\Helper;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all($filters = [], $alias = '')
    {
        return $this->model
            ->filter($filters)
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
    
    public function first()
    {
        return $this->model->first();
    }

    public function store(array $data, $file_column = null, $file_path = null)
    {
        if ($file_column && request()->hasFile($file_column)) {
            $data[$file_column] = Helper::uploadFile(request()->file($file_column), $file_path);
        }
        return $this->model->create($data);
    }

    public function update($id, array $data, $file_column = null, $file_path = null)
    {
        $model = $this->model->find($id);
        if ($file_column && request()->hasFile($file_column)) {
            Helper::deleteFile($model->$file_column);
            $data[$file_column] = Helper::uploadFile(request()->file($file_column), $file_path);
        }
        return $model->update($data);
    }
    
    public function destroy($id, $file_column = null)
    {
        $model = $this->model->find($id);
        if ($file_column) {
            Helper::deleteFile($model->$file_column);
        }
        $model->delete();
        return true;
    }

    // Generalized WHERE method
    public function where(array $conditions)
    {
        $query = $this->model->query();

        foreach ($conditions as $column => $value) {
            if (is_array($value)) {
                $query->whereIn($column, $value); // Handle arrays with whereIn
            } else {
                $query->where($column, $value);
            }
        }

        return $query->get();
    }

    // Generalized WHERE method with pagination
    public function wherePaginate(array $conditions, $perPage = 10)
    {
        $query = $this->model->query();

        foreach ($conditions as $column => $value) {
            if (is_array($value)) {
                $query->whereIn($column, $value);
            } else {
                $query->where($column, $value);
            }
        }

        return $query->paginate($perPage);
    }
    public function allWithRelations($filters = [], $relations = '', $alias = '')
    {
        $model = $this->model;
        $model = $model->filter($filters);

        if($relations)
        {
            $model = $model->with($relations);
        }
        return $model
            ->paginate(20, ['*'], $alias)
            ->onEachSide(0);
    }
    
    public function getModelClassName()
    {
        return get_class($this->model);
    }
}