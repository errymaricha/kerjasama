<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('ias', function (Blueprint $table) {
            $table->unsignedBigInteger('id_partner')->nullable()->after('number_partner');

            $table->foreign('id_partner')
                  ->references('id')
                  ->on('partners')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('ias', function (Blueprint $table) {
            $table->dropForeign(['id_partner']);
            $table->dropColumn('id_partner');
        });
    }
};
