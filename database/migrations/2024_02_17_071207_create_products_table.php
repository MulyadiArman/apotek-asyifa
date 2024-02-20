<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->string('slug')->unique(); // Membuat slug unik
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->text('description');
            $table->decimal('price', 8, 2); // Menggunakan decimal untuk harga
            $table->integer('stock');
            $table->integer('discount');
            $table->timestamps();
            $table->softDeletes(); // Menambahkan softDeletes

            //relationship category
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            //relationship user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
};
