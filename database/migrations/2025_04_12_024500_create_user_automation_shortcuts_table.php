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
        Schema::create('user_automation_shortcuts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('order');
            
            $table->uuid('user_automation_id');
            $table->uuid('shortcut_id');

            $table->foreign('user_automation_id')
                ->references('id')
                ->on('user_automations')
                ->onDelete('cascade');
            $table->foreign('shortcut_id')
                ->references('id')
                ->on('shortcuts')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_automation_shortcuts');
    }
};
