<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('moas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_partner')->nullable()->after('number');

            // foreign key ke tabel partners
            $table->foreign('id_partner')->references('id')->on('partners')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('moas', function (Blueprint $table) {
            $table->dropForeign(['id_partner']);
            $table->dropColumn('id_partner');
        });
    }
};
