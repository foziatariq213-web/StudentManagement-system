<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('attendances', function (Blueprint $table) {

            // student_id safe add
            if (!Schema::hasColumn('attendances', 'student_id')) {
                $table->unsignedBigInteger('student_id')->nullable();
            }

            // attendance_date
            if (!Schema::hasColumn('attendances', 'attendance_date')) {
                $table->date('attendance_date')->nullable();
            }

            // status
            if (!Schema::hasColumn('attendances', 'status')) {
                $table->string('status')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropColumn(['student_id', 'attendance_date', 'status']);
        });
    }
};