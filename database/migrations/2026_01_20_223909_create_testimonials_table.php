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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedTinyInteger('rating')
                ->comment('1 = worst, 5 = best');
            // Status
            $table->boolean('is_active')->default(true);

            // Descriptions
            $table->text('short_description')->nullable();
            // Audit

            // Highlight section
            $table->integer('highlight_percentage')->nullable(); // 50
            $table->string('highlight_title')->nullable(); // Increase in website engagement
            
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
