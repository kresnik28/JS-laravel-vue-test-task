<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateItemsTable
 */
class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'items',
            function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description');

                //relation with category
                $table->unsignedBigInteger('category_id');

                $table->timestamps();

                $table->foreign('category_id')->references('id')->on('categories')
                    ->cascadeOnDelete()->cascadeOnUpdate();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
