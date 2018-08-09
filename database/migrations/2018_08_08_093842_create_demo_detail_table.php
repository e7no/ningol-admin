<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemoDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('demo_id')->comment('案例ID');
            $table->string('qrcode_url')->comment('二维码地址');
            $table->string('img1')->comment('图片1');
            $table->string('img2')->comment('图片2')->nullable();
            $table->string('img3')->comment('图片3')->nullable();
            $table->string('img4')->comment('图片4')->nullable();
            $table->string('img5')->comment('图片5')->nullable();
            $table->tinyInteger('watermark')->comment('是否有水印（1有0没有）');
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
        Schema::dropIfExists('demo_detail');
    }
}
