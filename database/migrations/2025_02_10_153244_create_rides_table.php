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
        Schema::create('rides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('email');
            $table->string('source')->nullable();
            $table->string('destination')->nullable();
            $table->string('booking_code')->nullable();
            $table->unsignedBigInteger('ride_type_id');
            // $table->foreign('ride_type_id')->references('id')->on('ride_types')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            $table->enum('way', [1, 2])->comment('1 is one way and 2 is return');
            $table->integer('adults')->unsigned()->nullable();
            $table->integer('children')->unsigned()->nullable();
            $table->integer('luggage')->unsigned()->nullable();
            $table->integer('child_seats')->unsigned()->nullable();
            $table->dateTime('date_time')->nullable();
            $table->date('ride_date')->nullable();
            $table->time('ride_time')->nullable();
            $table->dateTime('old_date_time')->nullable()->default(null);
            $table->enum('car', ['economy', 'comfort', 'business', 'suv','ex-suv']);
            $table->enum('payment_method', ['cash', 'card']);
            $table->float('price', 10, 2)->nullable()->default(0);
            $table->string('flight_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('meet_greet')->nullable();
            $table->string('display_name')->nullable();
            $table->string('duration')->nullable();
            $table->string('distance')->nullable();
            $table->string('driver_weeks')->nullable();
            $table->string('driver_days')->nullable();
            $table->string('photograph')->nullable();
            $table->string('tour_city')->nullable();
            $table->boolean('is_past')->default(false)->nullable();
            $table->enum('status', [1, 2, 3, 4])->comment('1 is completed and 2 is pending and 3 is cancel and 4 is confirm');
            $table->bigInteger('currency_id')->unsigned()->default(1);
            // $table->foreign('currency_id')->references('id')->on('currencies');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rides');
    }
};
