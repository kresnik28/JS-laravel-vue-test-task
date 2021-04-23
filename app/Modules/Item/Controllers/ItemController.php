<?php

namespace App\Modules\Item\Controllers;

use App\Http\Controllers\Controller;

/**
 * Class CategoryController
 * @package App\Modules\Category\Controllers
 */
class ItemController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('modules.item.index');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('modules.item.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $itemId
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(int $itemId)
    {
        return view('modules.item.edit', compact('itemId'));
    }

}
