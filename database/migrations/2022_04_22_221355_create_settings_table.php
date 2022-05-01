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
        Schema::create('settings', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title',150);
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('company',100)->nullable();
            $table->string('address',150)->nullable();
            $table->string('phone',150)->nullable();
            $table->string('fax',150)->nullable();
            $table->string('email',150)->nullable();
            $table->string('smtpserver',150)->nullable();
            $table->string('smtpemail',150)->nullable();
            $table->string('smtppassword',150)->nullable();
            $table->string('smtpport',150)->nullable();
            $table->string('facebook',150)->nullable();
            $table->string('instagram',150)->nullable();
            $table->string('twitter',150)->nullable();
            $table->string('youtube',150)->nullable();
            $table->text('aboutus')->nullable();
            $table->text('contact')->nullable();
            $table->text('references')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
