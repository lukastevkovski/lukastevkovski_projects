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
        Schema::create('matches', function (Blueprint $table) {
    $table->id();
    $table->foreignId('home_team_id')->constrained('teams')->onDelete('cascade');
    $table->foreignId('away_team_id')->constrained('teams')->onDelete('cascade');
    $table->dateTime('scheduled_at');
    $table->unsignedSmallInteger('score_home')->nullable();
    $table->unsignedSmallInteger('score_away')->nullable();
    $table->boolean('played')->default(false);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_models');
    }
};
