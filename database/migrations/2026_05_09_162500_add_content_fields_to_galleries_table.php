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
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('category')->default('Campus')->after('title');
            $table->text('description')->nullable()->after('category');
            $table->string('image')->nullable()->after('description');
            $table->date('published_at')->nullable()->after('image');
            $table->boolean('is_featured')->default(false)->after('published_at');
            $table->boolean('is_published')->default(true)->after('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'category',
                'description',
                'image',
                'published_at',
                'is_featured',
                'is_published',
            ]);
        });
    }
};
