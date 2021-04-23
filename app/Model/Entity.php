<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoryEntity
 * @package App\Modules\Category\Entities
 */
class Entity
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * Set Model Class
     * @return string
     */
    public function setModel(): string
    {
        return Model::class;
    }

    public function __construct()
    {
        $model = $this->setModel();
        $this->model = app()->make($model);
    }

    public function getAll()
    {
        return $this->model->get();
    }

    /**
     * @return mixed
     */
    public function getRandomId()
    {
        return $this->model->query()->select('id')->inRandomOrder()->first()->id;
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public function findOneById(int $id)
    {
        return $this->model->query()->find($id);
    }

    /**
     *
     */
    public function delete($id)
    {
        $this->model->findOrFail($id)->delete($id);
    }
}
