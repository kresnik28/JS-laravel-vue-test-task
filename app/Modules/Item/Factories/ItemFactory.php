<?php

namespace App\Modules\Item\Factories;

use App\Modules\Category\Entities\CategoryEntity;
use App\Modules\Item\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * Class CategoryFactory
 * @package App\Modules\Category\Factories
 */
class ItemFactory extends Factory
{

    /**
     * ItemFactory constructor.
     * @param null $count
     * @param Collection|null $states
     * @param Collection|null $has
     * @param Collection|null $for
     * @param Collection|null $afterMaking
     * @param Collection|null $afterCreating
     * @param null $connection
     */
    public function __construct(
        $count = null,
        ?Collection $states = null,
        ?Collection $has = null,
        ?Collection $for = null,
        ?Collection $afterMaking = null,
        ?Collection $afterCreating = null,
        $connection = null
    ) {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);
    }

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->realText(),
            'category_id' => app()->make(CategoryEntity::class)->getRandomId()
        ];
    }
}
