<?php

namespace App\Modules\Item\Models;

use App\Modules\Category\Models\Category;
use App\Modules\Item\Factories\ItemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['id', 'name', 'description', 'category_id'];

    /**
     * @return ItemFactory
     */
    protected static function newFactory(): ItemFactory
    {
        return ItemFactory::new();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
