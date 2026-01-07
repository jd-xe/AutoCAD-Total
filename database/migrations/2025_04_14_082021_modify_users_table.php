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
        Schema::table('users', function (Blueprint $table) {

            $table->renameColumn('name', 'first_name');
            $table->string('last_name');

            $table->string('dni', 8)->unique()->after('last_name');
            $table->string('phone', 20)->nullable()->after('email');
            $table->date('birth_date')->nullable()->after('phone');
            $table->string('address')->nullable()->after('birth_date');

            $table->dropColumn('email_verified_at');
            $table->dropColumn('remember_token');
            $table->dropColumn('password');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('first_name', 'name');
            $table->dropColumn(['last_name', 'dni', 'phone', 'birth_date', 'address', 'deleted_at']);
        });
    }
};
