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
        Schema::create('actions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('category_id');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->string('mobile_key')->nullable();
            $table->string('name');
            $table->string('icon')->nullable();
            $table->string('android_icon')->nullable();
            $table->string('gradient_start')->nullable();
            $table->string('gradient_end')->nullable();
            $table->jsonb('inputs')->nullable();
            $table->timestamps();

            $table->index(['name', 'created_at']);
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
