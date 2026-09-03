<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('birthdays', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->default('Student'); // Student, Teacher, Staff, Star Student
            $table->string('class_or_role')->nullable(); // e.g. Class 5th - A, PGT Physics
            $table->date('birth_date')->nullable();
            $table->string('image')->nullable();
            $table->text('wishes')->nullable();
            $table->string('badge')->default('Birthday Star');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role')->nullable(); // e.g. Parent of Class XII Student
            $table->unsignedTinyInteger('rating')->default(5);
            $table->text('quote');
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(true);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('badge')->default('Admissions');
            $table->date('notice_date')->nullable();
            $table->string('link_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('icon')->default('classroom');
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('academic_wings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('classes');
            $table->string('tag')->nullable();
            $table->text('description');
            $table->json('highlights')->nullable();
            $table->string('badge_color')->default('blue');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('leadership_messages', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g. Chairman's Message
            $table->string('name');
            $table->string('role');
            $table->text('designation')->nullable();
            $table->string('image')->nullable();
            $table->text('message');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->string('category')->default('General');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('school_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->longText('value')->nullable();
            $table->string('group')->default('general');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_settings');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('leadership_messages');
        Schema::dropIfExists('academic_wings');
        Schema::dropIfExists('facilities');
        Schema::dropIfExists('notices');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('birthdays');
    }
};
