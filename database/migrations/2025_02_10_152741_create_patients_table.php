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
        Schema::create('patients', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('age');
            $table->tinyInteger('gender');
            $table->string('phone_number');
            $table->string('occupation');
            $table->string('address');
            $table->longText('purpose_of_visit');
            $table->longText('health_screening');
            $table->longText('impression');
            $table->longText('service_provided');
            $table->longText('drugs_recommended');
           $table->ulid('user_id')->index();
           $table->ulid('pharmacy_id')->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
