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
        Schema::create('copy_births', function (Blueprint $table) {
            $table->id('copy_id');
            //note day 
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('commune')->nullable();
            $table->string('copy_no')->nullable();
            $table->string('copy_note')->nullable();
            $table->string('note_day')->nullable();
            $table->string('note_month')->nullable();
            $table->string('note_year')->nullable();
            //baby
            $table->string('ba_fname_kh')->nullable();
            $table->string('ba_lname_kh')->nullable();
            $table->string('ba_fname_en')->nullable();
            $table->string('ba_lname_en')->nullable();
            $table->string('ba_gender')->nullable();
            $table->string(column: 'ba_nationality')->nullable();
            $table->string('ba_day')->nullable();
            $table->string('ba_month')->nullable();
            $table->string('ba_year')->nullable();
            $table->string('ba_province')->nullable();
            $table->string('ba_district')->nullable();
            $table->string('ba_commune')->nullable();
            $table->string('ba_village')->nullable();
            $table->string('ba_country')->nullable();
            //father
            $table->string('fa_fname_kh')->nullable();
            $table->string('fa_lname_kh')->nullable();
            $table->string('fa_fname_en')->nullable();
            $table->string('fa_lname_en')->nullable();
            $table->string(column: 'fa_nationality')->nullable();
            $table->string('fa_day')->nullable();
            $table->string('fa_month')->nullable();
            $table->string('fa_year')->nullable();
            $table->string('fa_province')->nullable();
            $table->string('fa_district')->nullable();
            $table->string('fa_commune')->nullable();
            $table->string('fa_village')->nullable();
            $table->string('fa_country')->nullable();
            //mother
            $table->string('mo_fname_kh')->nullable();
            $table->string('mo_lname_kh')->nullable();
            $table->string('mo_fname_en')->nullable();
            $table->string('mo_lname_en')->nullable();
            $table->string(column: 'mo_nationality')->nullable();
            $table->string('mo_day')->nullable();
            $table->string('mo_month')->nullable();
            $table->string('mo_year')->nullable();
            $table->string('mo_province')->nullable();
            $table->string('mo_district')->nullable();
            $table->string('mo_commune')->nullable();
            $table->string('mo_village')->nullable();
            $table->string('mo_country')->nullable();
            //baby image
            $table->text('photo')->nullable();
            //date start 
            $table->string('place_start')->nullable();
            $table->string('sta_day')->nullable();
            $table->string('sta_month')->nullable();
            $table->string('sta_year')->nullable();

            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copy_births');
    }
};
