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
        Schema::create('event_historical_figure', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('event_id');
            $table->bigInteger('historical_figure_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('historical_figure_id')->references('id')->on('historical_figures')->onDelete('cascade');
            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events_historical_figures');
    }
};
