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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->datetime('event_date');
            $table->text('description');
            $table->string('image')->nullable(); // Make it nullable, not default(NULL)
            $table->text('photo_description')->nullable(); // Make it nullable, not default(NULL)
            $table->string('marker_id')->nullable(); 
            $table->string('article_url')->nullable(); 
            $table->string('video_url')->nullable();
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
        Schema::dropIfExists('events');
    }
};
