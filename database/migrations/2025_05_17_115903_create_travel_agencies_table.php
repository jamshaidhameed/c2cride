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
        Schema::create('travel_agencies', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['Travel Agencies','Corporations','Holiday Homes']);
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('watsapp')->nullable();
            $table->string('business_name')->nullable();
            $table->string('company_website')->nullable();
            $table->string('position')->nullable();
            $table->string('country_of_registration')->nullable();
            $table->string('address')->nullable();
            $table->string('anticipated_booking')->nullable();
            $table->string('proposed_date')->nullable();
            $table->text('message')->nullable();
            $table->string('files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_agencies');
    }
};
