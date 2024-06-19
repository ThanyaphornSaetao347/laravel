<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $primaryKey = 'major_id'; //กำหนดให้ major_id เป็น Primary Key

    public function students(){
        return $this->hasMany(MjuStudent::class,'major_id');
        //ความสัมพันธ์มากกว่า 1 คอลัมน์ที่ใช้ในการเชื่อมโยงคือ major_id.
    }
}
