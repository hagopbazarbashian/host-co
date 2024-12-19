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
        Schema::create('storegsystems', function (Blueprint $table) {
            $table->id();
            $table->string('session_id');         // Session ID to associate user session
            $table->string('name');               // Original file name
            $table->string('path');               // Path where the file is stored
            $table->string('type');               // File type (e.g., image, document)
            $table->unsignedBigInteger('size');   // File size in bytes
            $table->boolean('is_image')->default(false); // Flag if the file is an image
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
        Schema::dropIfExists('storegsystems');
    }
};
