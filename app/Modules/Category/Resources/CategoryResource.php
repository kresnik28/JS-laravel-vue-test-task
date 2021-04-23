<?php

namespace App\Modules\Category\Resources;

use App\Modules\Item\Resources\ItemResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'items' => ItemResource::collection($this->items)->pluck('id'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
