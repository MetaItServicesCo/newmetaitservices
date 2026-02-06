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
        Schema::table('project_requests', function (Blueprint $table) {
            $table->softDeletes();
            
            // Add indexes if they don't exist
            $table->index('email');
            $table->index('selected_date');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_requests', function (Blueprint $table) {
            $table->dropSoftDeletes();
            
            // Drop indexes
            $table->dropIndex(['email']);
            $table->dropIndex(['selected_date']);
            $table->dropIndex(['created_at']);
        });
    }
};
