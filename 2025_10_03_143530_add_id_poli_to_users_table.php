<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            // hapus foreign key lama kalau ada
            $table->dropForeign(['id_poli']);

            // ubah kolom agar match dengan poli.id
            $table->unsignedBigInteger('id_poli')->nullable()->change();

            // buat ulang foreign key
            $table->foreign('id_poli')
                  ->references('id')
                  ->on('poli')
                  ->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_poli']);
        });
    }
};

