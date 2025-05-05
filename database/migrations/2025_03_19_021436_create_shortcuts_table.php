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
        Schema::create('shortcuts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->uuid('service_id')->nullable();
            $table->uuid('original_shortcut_id')->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('cascade');
            
            $table->integer('order');
            $table->string('name');
            $table->string('icon')->nullable();
            $table->string('android_icon')->nullable();
            $table->string('description');
            $table->string('gradient_start');
            $table->string('gradient_end');
            $table->timestamps();

            $table->index(['user_id', 'service_id', 'name', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shortcuts');
    }
};
