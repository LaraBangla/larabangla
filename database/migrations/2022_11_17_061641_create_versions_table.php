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
        Schema::create('versions', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('technology_id')->comment('Technology ID')->references('id')->on('technologies')->onDelete('cascade');
            $table->string('name')->comment('Version Name');
            $table->string('slug')->unique()->comment('Version Slug');
            $table->string('path_folder_name', 50)->comment('Technology folder name, for store docs files');
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
        Schema::dropIfExists('versions');
    }
};
