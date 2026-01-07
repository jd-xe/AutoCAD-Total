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
        Schema::table('payment_concepts', function (Blueprint $table) {
            $table->enum('type', ['enrollment', 'document'])
                ->after('amount')
                ->comment('Specifies whether the concept is for enrollment or documents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_concepts', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
