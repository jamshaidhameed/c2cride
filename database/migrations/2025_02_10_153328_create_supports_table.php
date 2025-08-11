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
        Schema::create('supports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('question')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('subject')->nullable();
            $table->longText('message')->nullable();
            $table->enum('status', [1, 2, 3, 4])->comment('1 is completed and 2 is pending and 3 is cancel and 4 is confirm')->default(2);
            $table->longText('review')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
