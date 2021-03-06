<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageManipulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_manipulations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('path');
            $table->string('type', 25);
            $table->text('data');
            $table->string('output_path');
            $table->timestamps();

            $table->foreignIdFor(\App\Models\User::class, 'user_id');
            $table->foreignIdFor(\App\Models\Album::class, 'album_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_manipulations');
    }
}
