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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('address');
            $table->date('bdate');
            $table->string('gender');
            $table->string('phone');
            $table->string('email')->unique()->nullable();
            $table->string('picture')->nullable();
            $table->string('password');
            $table->tinyInteger('role')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->string('sched_status')->nullable();
            $table->bool('available')->nullable();
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
};
