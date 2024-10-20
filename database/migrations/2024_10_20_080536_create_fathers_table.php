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
            $table->string('fname_kh');
            $table->string('lname_kh');
            $table->string('fname_en');
            $table->string('lname_en');
            $table->string('gender');
            $table->string('phones');
            $table->string('nationality');
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->string('job_title');
            $table->text('photo');
            $table->unsignedBigInteger("village_id");
            $table->foreign("village_id")->references('id')->on('villages')->onDelete('cascade')->onUpdate('cascade');


            $table->unsignedBigInteger("dis_id");
            $table->foreign("dis_id")->references('dis_id')->on('districts')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger("commune_id");
            $table->foreign("commune_id")->references('commune_id')->on('communes')->onDelete('cascade')->onUpdate('cascade');


            $table->unsignedBigInteger("province_id");
            $table->foreign("province_id")->references('province_id')->on('provinces')->onDelete('cascade')->onUpdate('cascade');


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
