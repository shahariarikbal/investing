<?php

namespace App\Repositories;

trait BaseRepository
{
    /**
     * Save the input's data.
     *
     * @param  $model
     * @param  $input
     *
     * @return $model
     */
    public function save($model, $input)
    {
        $model->fill($input);
        // dd($input, $model);
        if ($model->save()) {
            return $model;
        }
    }
}