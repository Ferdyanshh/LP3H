<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('waktu');
            $table->string('kegiatan');
            $table->string('pic_narasumber');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
