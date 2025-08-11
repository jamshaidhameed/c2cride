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
        Schema::create('car_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('car_type');
            $table->string('slug');
            $table->string('fixed_price')->nullable();;
            $table->string('above_fifty')->nullable();;
            $table->string('above_seventy')->nullable();;
            $table->string('above_hundred')->nullable();;
            $table->string('above_hundred_thirty')->nullable();;
            $table->string('ariport_additional')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_types');
    }
};
