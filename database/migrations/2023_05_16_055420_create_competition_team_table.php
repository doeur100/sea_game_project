<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('competition_team', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('competition_id')->unsigned();
                $table->foreign('competition_id')->references('id')->on('competitions')->onDelete('cascade');
                $table->unsignedBigInteger('team_id')->unsigned();
                $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_team');
    }
};
