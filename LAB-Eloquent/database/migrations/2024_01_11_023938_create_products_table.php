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
        Schema::create('products', function (Blueprint $table) {
            // $table->id();
            $table->timestamps();

            $table->binary('photo');
            $table->unsignedBigInteger('product_type');
            $table->boolean('confirmed') ->default(0);
            $table->date('created_date')->nullable();
            $table->double('amount', 8, 2)->nullable();
            $table->integer('votes')->nullable();
            $table->string('name', 100);

            $table->unsignedBigInteger('code');
            $table->primary('code');

            // กรณีกําหนด Foreign Key โดยใช Column ตามที่ระบุ
            // $table->foreign('product_type')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
