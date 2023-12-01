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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id')->index()->default(0);
            $table->bigInteger('vehicle_id')->index();
            $table->string('status')->default('pending');
            $table->date('booking_date');
            $table->bigInteger('site_manager')->index();
            $table->bigInteger('branch_manager')->index();
            $table->string('cancel_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
