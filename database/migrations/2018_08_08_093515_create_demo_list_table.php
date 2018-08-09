<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemoListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('案例名');
            $table->integer('cat_id')->comment('分类ID');
            $table->string('l_url')->comment('大图')->nullable();
            $table->string('m_url')->comment('小图')->nullable();
            $table->text('abstract')->comment('简介')->nullable();
            $table->string('remark')->comment('备注')->nullable();
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
        Schema::dropIfExists('demo_list');
    }
}
