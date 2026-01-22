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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('sub_title')->nullable();
            $table->longText('description')->nullable();
            // Media
            $table->string('thumbnail')->nullable();
            $table->json('gallery_images')->nullable();
            $table->string('image_alt')->nullable();
            // Status
            $table->boolean('is_active')->default(true);
            $table->boolean('show_on_landing_page')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
