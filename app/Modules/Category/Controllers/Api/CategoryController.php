<?php

namespace App\Modules\Category\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Category\Entities\CategoryEntity;
use App\Modules\Category\Resources\CategoryResource;
use App\Modules\Category\Validators\CategoryValidator;


/**
 * Class CategoryController
 */
class CategoryController extends Controller
{

    /**
     * @var CategoryEntity $categoryEntity
     */
    private CategoryEntity $categoryEntity;

    /**
     * CategoryController constructor.
     * @param CategoryEntity $categoryEntity
     */
    public function __construct(CategoryEntity $categoryEntity)
    {
        $this->categoryEntity = $categoryEntity;
    }


    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAll(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return CategoryResource::collection($this->categoryEntity->getAll());
    }

    /**
     * @param int $id
     * @return CategoryResource
     */
    public function get(int $id): CategoryResource
    {
        return new CategoryResource($this->categoryEntity->findOneById($id));
    }


    /**
     * @param CategoryValidator $request
     */
    public function store(CategoryValidator $request)
    {
        $this->categoryEntity->create($request);
        return response()->json(['success' => true]);
    }

    /**
     * @param $id
     * @param CategoryValidator $request
     */
    public function update($id, CategoryValidator $request)
    {
        $this->categoryEntity->update($id, $request);
        return response()->json(['success' => true]);
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $this->categoryEntity->delete($id);
    }
}
