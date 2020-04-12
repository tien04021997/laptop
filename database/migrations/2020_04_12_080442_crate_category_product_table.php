<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('slug')->index();
            $table->char('icon')->nullable();
            $table->string('avatar')->nullable();
            $table->tinyInteger('active')->default(1)->index();
            $table->tinyInteger('status')->default(1)->index()->comment('Trạng thái');
            $table->integer('total_product')->default(0);
            $table->string('title_seo')->nullable();
            $table->string('description_seo')->nullable();
            $table->string('keyword')->nullable();
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
        Schema::dropIfExists('categories_products');
    }
}
