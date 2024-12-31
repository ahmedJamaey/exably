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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->integer('national_id')->unique();
            $table->string('mobile_number');
            $table->string('country');
            $table->string('city');
            $table->timestamps();
        });

        Schema::create('centers', function (Blueprint $table) {
            $table->id();
            $table->string('rank');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('prizes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
            $table->text('description')->nullable();

            $table->foreignId('center_id')->constrained('centers')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('winners', function (Blueprint $table) {
            $table->id();
            $table->dateTime('win_date');

            $table->foreignId('center_id')->constrained('centers')->onDelete('cascade');
            $table->foreignId('prize_id')->constrained('prizes')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('lots', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->text('description')->nullable();
            $table->jsonb('rule');
            $table->jsonb('type');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('lot_participant', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lot_id')->constrained('lots')->onDelete('cascade');
            $table->foreignId('participant_id')->constrained('participants')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['lot_id','participant_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
