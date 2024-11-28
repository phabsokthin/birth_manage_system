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
        Schema::create('fathers', function (Blueprint $table) {
            $table->id('father_id');
            $table->string('fname_kh')->nullable();
            $table->string('lname_kh')->nullable();
            $table->string('fname_en')->nullable();
            $table->string('lname_en')->nullable();
            $table->string('gender');
            $table->string('phones');
            $table->string('nationality')->nullable();
            $table->integer('fstatus')->default(0);
            $table->string('day')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('job_title')->nullable();
            $table->text('photo')->nullable();
            $table->string('province_kh_name')->nullable();
            $table->string('district_kh_name')->nullable();
            $table->string('commune_kh_name')->nullable();
            $table->string('village_kh_name')->nullable();
            
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fathers');
    }
};
