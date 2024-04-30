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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->double('note');
            $table->string('commentaire');
            $table->date('date_evaluation');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('etablissement_id')->constrained()->onDelete('cascade');





        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
