<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('house_no')->nullable();
            $table->string('purok')->nullable();
            $table->string('barangay')->nullable();
            $table->string('city_m')->nullable();
            $table->string('w_status')->nullable();

            $table->string('address');
            $table->string('phone');
            $table->string('model')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('unit_info')->nullable();
            $table->longText('description');
            $table->string('branch');
            $table->string('category');
            $table->tinyInteger('acceptd')->nullable();
            $table->datetime('req_date')->nullable();
            $table->datetime('date_completed')->nullable();
            $table->unsignedBigInteger('technician_id')->nullable();
            $table->unsignedBigInteger('technicianb_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('technician_id')->references('id')->on('users');
            $table->string('technician')->nullable();
            $table->string('status')->nullable();
            $table->string('message')->nullable();
            $table->string('assessment')->nullable();
            $table->string('image')->nullable();
            $table->string('reference_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenances');
    }
};
