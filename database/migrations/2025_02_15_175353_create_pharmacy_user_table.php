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
        Schema::create('pharmacy_user', function (Blueprint $table) {
            $table->ulid('pharmacy_id');
            $table->ulid('user_id');
            $table->tinyInteger('role');
            $table->timestamps();

            $table->primary(['pharmacy_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacy_user');
    }
};
