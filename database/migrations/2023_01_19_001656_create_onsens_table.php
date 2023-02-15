<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onsens', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('region', 255);
            $table->string('prefecture', 255);
            $table->string('area', 255);
            $table->string('address', 255);
            $table->string('category', 255);
            $table->string('categoryname', 255);
            $table->text('body');
            $table->text('html');
            $table->string('instagram', 255)->nullable();
            $table->string('twitter', 255)->nullable();
            $table->string('youtube', 255)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('tiktok', 255)->nullable();
            $table->string('google', 255)->nullable();
            $table->text('info1')->nullable();
            $table->string('label1')->nullable();
            $table->text('info2')->nullable();
            $table->string('label2')->nullable();
            $table->text('info3')->nullable();
            $table->string('label3')->nullable();
            $table->text('info4')->nullable();
            $table->string('label4')->nullable();
            $table->text('info5')->nullable();
            $table->string('label5')->nullable();
            $table->string('thumbnail1')->nullable();
            $table->string('thumbnail2')->nullable();
            $table->string('thumbnail3')->nullable();
            $table->string('thumbnail4')->nullable();
            $table->string('thumbnail5')->nullable();
            $table->string('thumbnail6')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('onsens');
    }
};
