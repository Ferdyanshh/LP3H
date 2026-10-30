<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('test_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedSmallInteger('pre_test_score')->nullable();
            $table->unsignedSmallInteger('post_test_score')->nullable();
            $table->string('progress', 50)->nullable();
            $table->string('status', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('test_results');
    }
};
