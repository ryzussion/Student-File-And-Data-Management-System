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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('stud_no', 10)->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('address');
            $table->string('state');
            $table->string('province');
            $table->integer('zip_code');
            $table->string('phone_no');
            $table->string('email');
            $table->string('nationality');
            $table->string('religion');
            $table->string('blood_type');
            $table->string('year');
            $table->string('section');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_no');
            $table->longText('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
