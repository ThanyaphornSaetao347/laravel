<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $primaryKey = 'emp_no';

    public function salaries() {
        return $this->hasMany(Salaries::class,'emp_no');
    }
}
