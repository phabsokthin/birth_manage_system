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
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("commune_id");
            $table->foreign("commune_id")->references('commune_id')->on('communes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('village_code');
            $table->string('village_en_name');
            $table->string('village_kh_name');
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
        Schema::dropIfExists('villages');
    }
};
