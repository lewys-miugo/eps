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
            // $table->string('last_name');
            $table->id();
            $table->string('full_name');
            $table->string('national_id')->unique()->nullable();
            $table->string('employee_no')->unique()->nullable();
            $table->unsignedInteger('age')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('campus')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_number2')->nullable();
            $table->bigInteger('campus_id')->unsigned()->nullable(); // Make it nullable if it can be optional
            $table->string('department')->nullable();
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->date('start_date')->nullable();
            $table->boolean('suspended')->default(false)->nullable();
            $table->string('job_grade')->nullable();
            $table->decimal('salary',10,2)->nullable();
            $table->boolean('fired')->default(false)->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('utype')->default('USR')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();
            // $table->foreign('campus_id')->nulllable()->references('id')->on('campuses')->onDelete('cascade');
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
