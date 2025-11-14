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
<<<<<<< HEAD
            $table->string('title')->nullable();
            $table->string('description');
            $table->foreignId('material_type_id')->constrained(table: 'material_type', column: 'id')->onDelete('cascade');
            $table->string('youtube_url')->nullable();
            $table->string('file_path')->nullable();
            $table->dateTime('uploaded_at')->useCurrent();

=======
>>>>>>> ae545a6 (start migration)
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
