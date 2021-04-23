<?php

namespace App\Modules\Item\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Item\Entities\ItemEntity;
use App\Modules\Item\Models\Item;
use App\Modules\Item\Resources\ItemResource;
use Illuminate\Http\Request;
use App\Modules\Item\Validators\ItemValidator;


/**
 * Class CategoryController
 */
class ItemController extends Controller
{

    /**
     * @var ItemEntity $ItemEntity
     */
    private ItemEntity $itemEntity;

    /**
     * CategoryController constructor.
     * @param ItemEntity $ItemEntity
     */
    public function __construct(ItemEntity $ItemEntity)
    {
        $this->itemEntity = $ItemEntity;
    }


    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAll(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ItemResource::collection($this->itemEntity->getAll());
    }

    /**
     * @param int $id
     * @return ItemResource
     */
    public function get(int $id): ItemResource
    {
        return new ItemResource($this->itemEntity->findOneById($id));
    }


    /**
     * @param ItemValidator $request
     */
    public function store(ItemValidator $request)
    {
        $this->itemEntity->create($request);
        return response()->json(['success' => true]);
    }

    /**
     * @param $id
     * @param ItemValidator $request
     */
    public function update($id, ItemValidator $request)
    {
        $this->itemEntity->update($id, $request);
        return response()->json(['success' => true]);
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $this->itemEntity->delete($id);
    }
}
