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
        Schema::create('mothers', function (Blueprint $table) {
            $table->id('mother_id');

            $table->string('fname_kh')->nullable();
            $table->string('lname_kh')->nullable();
            $table->string('fname_en')->nullable();
            $table->string('lname_en')->nullable();
            
            $table->string('gender');
            $table->string('phones');
            $table->string('nationality')->nullable();
            $table->integer('mstatus')->default(0);
            $table->string('day')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('job_title')->nullable();
            $table->text('photo')->nullable();
            $table->unsignedBigInteger("village_id")->nullable();
            $table->foreign("village_id")->references('id')->on('villages')->onDelete('cascade')->onUpdate('cascade');


            $table->unsignedBigInteger("dis_id")->nullable();
            $table->foreign("dis_id")->references('dis_id')->on('districts')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger("commune_id")->nullable();
            $table->foreign("commune_id")->references('commune_id')->on('communes')->onDelete('cascade')->onUpdate('cascade');


            $table->unsignedBigInteger("province_id")->nullable();
            $table->foreign("province_id")->references('province_id')->on('provinces')->onDelete('cascade')->onUpdate('cascade');


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
        Schema::dropIfExists('mothers');
    }
};
