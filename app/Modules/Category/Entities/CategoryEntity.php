<?php

namespace App\Modules\Category\Entities;

use App\Model\Entity;
use App\Modules\Category\Models\Category;
use App\Modules\Item\Entities\ItemEntity;

/**
 * Class CategoryEntity
 * @package App\Modules\Category\Entities
 */
class CategoryEntity extends Entity
{
    /**
     * @var ItemEntity
     */
    protected ItemEntity $itemEntity;

    /**
     * @return string
     */
    public function setModel(): string
    {
        return Category::class;
    }

    /**
     * CategoryEntity constructor.
     * @param ItemEntity $itemEntity
     */
    public function __construct(ItemEntity $itemEntity)
    {
        parent::__construct();
        $this->itemEntity = $itemEntity;
    }

    /**
     * @param $data
     */
    public function create($data)
    {
        /** @var Category $category */
        $category = $this->model->create(
            [
                'name' => $data['name'],
                'description' => $data['description'],
            ]
        );
        $this->attachItems($category->id, $data['items']);
    }


    /**
     * @param $data
     */
    public function update($id, $data)
    {
        $category = $this->model->findOrFail($id);
        /** @var Category $category */
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->save();
        $this->attachItems($category->id, $data['items']);
    }

    /**
     * @param $categoryId
     * @param $itemIds
     */
    private function attachItems($categoryId, $itemIds)
    {
        $this->itemEntity->model->whereIn('id', $itemIds)->update(['category_id' => $categoryId]);
    }
}
