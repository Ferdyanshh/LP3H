<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 20)->default('peserta')->after('password');
            $table->string('alamat')->nullable()->after('role');
            $table->string('no_telp', 20)->nullable()->after('alamat');
            $table->string('pendidikan_terakhir', 100)->nullable()->after('no_telp');
            $table->string('pekerjaan', 100)->nullable()->after('pendidikan_terakhir');
            $table->string('ktp_path')->nullable()->after('pekerjaan');
            $table->index('role');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['role']);
            $table->dropColumn(['role', 'alamat', 'no_telp', 'pendidikan_terakhir', 'pekerjaan', 'ktp_path']);
        });
    }
};
