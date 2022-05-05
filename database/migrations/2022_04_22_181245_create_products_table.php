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
            $table->id()->autoIncrement();
            $table->integer('category_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('tax')->default(18);
            $table->longtext('detail')->nullable();
            $table->float('price')->nullable();
            $table->string('title',150);
            $table->string('durum')->nullable();
            $table->string('keywords')->nullable();
            $table->longtext('description')->nullable();
            $table->string('image',100)->nullable();
            $table->string('slug',150)->nullable();
            $table->string('status',5)->nullable()->default('False');
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
};
