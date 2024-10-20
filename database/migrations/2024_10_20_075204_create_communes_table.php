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
        Schema::create('communes', function (Blueprint $table) {
            $table->id('commune_id');
            $table->unsignedBigInteger("dis_id");
            $table->foreign("dis_id")->references('dis_id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->string('commune_code');
            $table->string('commune_en_name');
            $table->string('commune_kh_name');
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
        Schema::dropIfExists('communes');
    }
};
