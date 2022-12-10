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
        Schema::create('technologies', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('technology_division_id')->references('id')->on('technology_divisions')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->unique();
            $table->string('path_folder_name', 50)->unique()->comment('Technology folder name, for store docs files');
            $table->integer('status')->default(1)->comment('1 for active, 0 for deactivate');
            $table->integer('order');
            // * for seo
            $table->string('keywords')->nullable()->comment('Keywords for SEO');
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
        Schema::dropIfExists('technologies');
    }
};
