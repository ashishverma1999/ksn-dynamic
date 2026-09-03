<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admission_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('guardian_name')->nullable();
            $table->string('phone', 30);
            $table->string('email')->nullable();
            $table->string('class_applied', 60);
            $table->unsignedTinyInteger('student_age')->nullable();
            $table->date('preferred_visit_date')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('new');
            $table->string('source')->default('website');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admission_enquiries');
    }
};
