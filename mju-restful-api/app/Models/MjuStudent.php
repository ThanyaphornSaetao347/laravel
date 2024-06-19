<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MjuStudent extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_code'; //กำหนดให้ student_code เป็น Primary Key ของโมเดล MjuStudent

    public function major(){
        return $this->belongsTo(Major::class,'major_id');
        //กำหนดความสัมพันธ์ MjuStudent กับ Major โดยใช้ belongsTo หมายถึงว่า 1 นักศึกษา MjuStudent จะเป็นของ 1 แผนก Major และคอลัมน์ที่ใช้ในการเชื่อมโยงคือ major_id
    }

    protected $fillable = [ //กำหนดattributes ที่สามารถให้ผู้ใช้ create หรือ update ได้ โดยระบุชื่อคอลัมน์ที่ยอมรับข้อมูล.
        'student_code',
        'first_name',
        'nick_name',
        'first_name_en' ,
        'major_id' ,
        'idcard',
        'gender',
        'birthdate',
        'address',
        'phone' ,
        'email',
    ];

}
