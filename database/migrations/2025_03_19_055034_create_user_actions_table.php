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
        Schema::create('user_actions', function (Blueprint $table) {
            $table->id();
            $table->string('order');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('action_id')->constrained()->onDelete('cascade');
            $table->foreignId('shortcut_id')->constrained()->onDelete('cascade');
            $table->jsonb('inputs');
            $table->timestamps();
        
            // Multi-column index
            $table->index(['user_id', 'shortcut_id', 'action_id',  'created_at']);
        
            // Separate indexes
            $table->index('user_id');
            $table->index('shortcut_id');
        
            // Optional: Index a specific key inside the jsonb form if queried frequently
            // $table->index([DB::raw("(form->>'key')")]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_actions');
    }
};
