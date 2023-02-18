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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            // create a foreign key to the users table named faculty_id but also check if that user table role is faculty
            $table->foreignId('faculty_id')->constrained('users')->where('role', 'faculty');
            $table->foreignId('course_id')->constrained('courses');
            $table->integer('rating');
            $table->text('review');
            $table->boolean('isAnonymous');
            $table->boolean('isApproved');
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
        Schema::dropIfExists('reviews');
    }
};
