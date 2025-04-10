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
            $table->uuid('id')->primary();
            $table->integer('order');

            $table->uuid('user_id');
            $table->uuid('action_id');
            $table->uuid('shortcut_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('action_id')
                ->references('id')
                ->on('actions')
                ->onDelete('cascade');
            $table->foreign('shortcut_id')
                ->references('id')
                ->on('shortcuts')
                ->onDelete('cascade');
                
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
