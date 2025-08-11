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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('type');
            $table->integer('passengers')->default(0);
            $table->integer('suitcases')->default(0);
            $table->string('free_waiting_time')->nullable();
            $table->enum('porter_service',[1,0])->default(1);
            $table->float('price')->default(0);
            $table->float('discount')->default(0);
            $table->boolean('apply_discount')->default(false);
            $table->string('images')->nullable();
            $table->string('short_descriptions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
