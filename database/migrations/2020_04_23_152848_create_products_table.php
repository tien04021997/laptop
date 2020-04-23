<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug')->index();
            $table->integer('category_id')->default(0)->index();
            $table->integer('price')->default(0);
            $table->tinyInteger('sale')->default(0);
            $table->integer('author_id')->default(0)->index();
            $table->tinyInteger('active')->default(0)->index();
            $table->tinyInteger('status')->default(1)->index()->comment('Trạng thái');
            $table->integer('view')->default(0);
            $table->string('avatar')->nullable();
            $table->longText('description')->nullable()->comment('Mô tả thông tin sản phẩm');
            $table->longText('content')->nullable()->comment('Mô tả sản phẩm');
            $table->longText('highlight')->nullable()->comment('Đặc điểm nổi bật sản phẩm');
            $table->longText('condition')->nullable()->comment('Điều kiện sử dụng sản phẩm');
            $table->string('title_seo')->nullable();
            $table->string('description_seo')->nullable();
            $table->string('keyword_seo')->nullable();
            $table->integer('total_rating')->default(0)->comment('Tổng số đánh giá');
            $table->integer('total_number')->default(0)->comment('Tổng số điểm đánh giá');
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
        Schema::dropIfExists('products');
    }
}
