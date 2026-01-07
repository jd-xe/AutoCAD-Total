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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete()
                ->comment('Estudiante evaluado');

            $table->foreignId('course_group_id')
                ->constrained('course_groups')
                ->cascadeOnDelete()
                ->comment('Grupo del curso');

            $table->string('evaluation_type', 50)
                ->default('final')
                ->comment('Tipo de evaluación: final, parcial, práctica, etc.');

            $table->decimal('score', 5, 2)
                ->comment('Calificación numérica');

            $table->text('comments')
                ->nullable()
                ->comment('Observaciones adicionales');

            $table->timestamps();

            $table->unique([
                'user_id',
                'course_group_id',
                'evaluation_type'
            ], 'grade_unique_record');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
