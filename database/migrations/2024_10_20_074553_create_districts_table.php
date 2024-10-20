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
        Schema::create('districts', function (Blueprint $table) {
            $table->id('dis_id');
            $table->unsignedBigInteger("province_id");
            $table->foreign("province_id")->references('province_id')->on('provinces')->onDelete('cascade')->onUpdate('cascade');
            $table->string('dis_code');
            $table->string('district_en_name');
            $table->string('district_kh_name');
            $table->string('status')->default(0);
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
        Schema::dropIfExists('districts');
    }
};
