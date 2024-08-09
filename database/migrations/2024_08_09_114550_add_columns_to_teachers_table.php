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
        Schema::table('teachers', function (Blueprint $table) {
            $table->string('ttl')->nullable()->after('nik');
            $table->string('no_telp')->nullable()->after('ttl');
            $table->string('email')->unique()->nullable()->after('no_telp');
            $table->string('educational')->nullable()->after('email');
            $table->string('expertise')->nullable()->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            //
        });
    }
};
