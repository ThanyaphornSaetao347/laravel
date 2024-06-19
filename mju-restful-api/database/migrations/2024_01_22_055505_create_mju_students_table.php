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
        // สร้างตาราง mju_students ในฐานข้อมูล
        Schema::create('mju_students', function (Blueprint $table) {
            // $table->id();
            //สร้างตาราง
            $table->string('student_code')->primary();
            $table->string('first_name');
            $table->string('nick_name');
            $table->string('last_name')->nullable(); // ต้องการค่าว่าง
            $table->string('first_name_en');
            $table->string('last_name_en')->nullable();
            $table->unsignedBigInteger('major_id'); // FK -> major
            $table->string('idcard');
            $table->date('birthdate')->nullable();
            $table->char('gender',1)->nullable();
            $table->string('address');
            $table->string('phone');
            $table->string('email')->unique(); // unique ข้อมูลไม่สามารถซ้ำกันได้
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('major_id') // กำหนดเส้น
            ->references('major_id') // ระบุ primaryKey ที่ต้องการทำให้เป็น foreignKey
            ->on('majors') //อ้างอิงที่ majors คือต้องการให้เป็นที่ตาราง majors
            ->onDelete('cascade'); //เมื่อข้อมูลใน majors โดนลบ foreignKey ใน mju_students จะถูกลบไปด้วย
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mju_students',function(Blueprint $table){
            //drop fk constraint
            $table->dropForeign(['major_id']);
            //นี่คือการลบ Foreign Key constraint ที่ถูกกำหนดในตาราง mju_students ด้วยคอลัมน์ major_id.
        });
        Schema::dropIfExists('mju_students');
        //ลบตาราง mju_students ทั้งหมด
    }
};
