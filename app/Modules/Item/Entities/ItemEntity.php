<?php

namespace App\Modules\Item\Entities;

use App\Model\Entity;
use App\Modules\Item\Models\Item;

/**
 * Class Item
 * @package App\Modules\Item\Entities
 */
class ItemEntity extends Entity
{
    /**
     * @return string
     */
    public function setModel(): string
    {
        return Item::class;
    }

    /**
     * @param $data
     */
    public function create($data)
    {
        /** @var Item $item */
        $this->model->create(
            [
                'name' => $data['name'],
                'description' => $data['description'],
                'category_id' => $data['category_id']
            ]
        );
    }


    /**
     * @param $data
     */
    public function update($id, $data)
    {
        $item = $this->model->findOrFail($id);
        /** @var Item $item */
        $item->name = $data['name'];
        $item->description = $data['description'];
        $item->category_id = $data['category_id'];
        $item->save();
    }
}
