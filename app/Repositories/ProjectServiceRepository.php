<?php

namespace App\Repositories;

use App\Models\ProjectService;

class ProjectServiceRepository extends BaseRepository
{
    public function __construct(ProjectService $project_service)
    {
        parent::__construct($project_service);
    }

    public function update($id, array $data, $file_column = null, $file_path = null)
    {
        $model = $this->model->find($id);
        $model->update($data);
        $images = [];
        if (request()->hasFile('images')) {
            foreach (request()->file('images') as $file) {
                $images[] = [
                    'path' => $file,
                ];
            }
        }
        foreach ($images as $image) {
            $model->medias()->create($image);
        }

        return $model;
    }  
}
