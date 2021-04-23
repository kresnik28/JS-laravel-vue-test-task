<?php

namespace App\Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\Entities\CategoryEntity;
use App\Modules\Category\Models\Category;

/**
 * Class CategoryController
 * @package App\Modules\Category\Controllers
 */
class CategoryController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('modules.category.index');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('modules.category.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $categoryId
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $categoryId)
    {
        return view('modules.category.edit', compact('categoryId'));
    }

}
