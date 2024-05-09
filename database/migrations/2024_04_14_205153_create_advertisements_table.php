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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['musician', 'band']);
            $table->string('city');
            $table->string('group_experience');
            $table->string('stage_name');
            $table->string('musician_experience');
            $table->string('instrument');
            $table->boolean('concert_experience');
            $table->json('genres');
            $table->string('age')->nullable();
            $table->boolean('own_material');
            $table->boolean('commercial_project');
            $table->string('requirements', 2000);
            $table->string('description', 2000);
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('social_media')->nullable();
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('advertisements');
    }
};
