<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pendamping');
            $table->string('email_pendamping');
            $table->string('nomor_hp', 15)->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('bidang_usaha')->nullable();
            $table->string('jenis_tugas')->nullable();
            $table->text('deskripsi_tugas')->nullable();
            $table->text('kendala')->nullable();
            $table->text('catatan_tambahan')->nullable();
            $table->enum('status', ['menunggu', 'approved', 'rejected'])->default('menunggu')->index();
            $table->timestamp('tanggal_submit')->useCurrent();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();

            $table->string('dokumen_nib')->nullable();
            $table->string('dokumen_sjph')->nullable();
            $table->string('screenshot_oss')->nullable();
            $table->string('screenshot_sihalal')->nullable();
            $table->string('laporan_tugas')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};
