<?php

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository extends BaseRepository
{
    public function __construct(Payment $payment)
    {
        parent::__construct($payment);
    }

    public function store(array $data, $file_column = null, $file_path = null)
    {
        $model = $this->model->create($data);
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
