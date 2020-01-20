<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_sizes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')
                ->references('id')
                ->on('sizes')
                ->onDelete('restrict');

            $table->unsignedBigInteger('good_id');
            $table->foreign('good_id')
                ->references('id')
                ->on('goods')
                ->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_sizes');
    }
}
