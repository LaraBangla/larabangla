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
        Schema::create('lessons', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('technology_id')->references('id')->on('technologies')->onDelete('cascade');
            $table->foreignId('version_id')->references('id')->on('versions')->onDelete('cascade');
            $table->foreignId('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->integer('order');
            $table->string('name');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('file')->unique();
            $table->integer('status')->default(1)->comment('1 for active, 0 for deactivate');
            // * for seo
            $table->string('keywords')->nullable()->comment('Keywords for SEO');
            $table->string('description')->nullable()->comment('Description for SEO');
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
        Schema::dropIfExists('lessons');
    }
};
