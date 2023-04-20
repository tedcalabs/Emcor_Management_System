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
            $table->string('address');
            $table->string('phone');
            $table->longText('description');
            $table->string('branch');
            $table->string('category');
            $table->tinyInteger('acceptd')->nullable();
            $table->datetime('req_date')->nullable();
            $table->datetime('date_completed')->nullable();
            $table->string('technician')->nullable();
            $table->string('status')->nullable();
            $table->string('message')->nullable();
            $table->string('assessment')->nullable();
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
