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
        Schema::create('sub_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')
                ->constrained('services')
                ->cascadeOnDelete();

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->text('short_description')->nullable();

            // Small bullet points (top highlights)
            $table->json('main_points')->nullable();

            // COMPLETE PAGE CONTENT
            $table->json('page_content')->nullable();

            $table->boolean('is_active')->default(true);
            $table->boolean('show_on_services_page')->default(false);

            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_services');
    }
};
