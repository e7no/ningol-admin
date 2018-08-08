<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemoCatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_cat', function (Blueprint $table) {
            $table->increments('cat_id');
            $table->string('cat_name')->comment('分类名')->nullable();
            $table->string('cat_path')->comment('分类路径');
            $table->tinyInteger('parent_id')->comment('父类ID');
            $table->integer('p_order')->comment('排序');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demo_cat');
    }
}
