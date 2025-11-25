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
        Schema::create('materiaal', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description');
            $table->foreignId('material_type_id')->constrained(table: 'material_type', column: 'id')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories');
            $table->string('URL')->nullable();
            $table->string('file_path')->nullable();
            $table->dateTime('uploaded_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiaal');
    }
};
