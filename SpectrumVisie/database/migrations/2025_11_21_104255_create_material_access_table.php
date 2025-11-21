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
        Schema::create('material_access', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materiaal_id')->constrained('materiaal', 'id')->onDelete('cascade');
            $table->integer('role_id');
            $table->boolean('can_view');
            $table->boolean('can_download');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_access');
    }
};
