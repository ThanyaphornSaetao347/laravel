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
        //สร้างตารางในฐานข้อมูล
        Schema::create('majors', function (Blueprint $table) {
            // $table->id();
            //สร้างตาราง
            $table->unsignedBigInteger('major_id')->autoIncrement();
            //สร้างคอลัมเก็บข้อมูลและกำหนดเป็น primary key
            $table->string('name');
            //สร้างคอลัมเก็บชื่อ major
            $table->string('name_en');
            //สร้างคอลัมเก็บชื่อ major ภาษาอังกฤษ
            $table->timestamps();
            // สร้างคอลัมเก็บข้อมูลเวลาที่สร้างและอัพเดต record
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('majors');
    }
};
