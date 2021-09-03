<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $fillable = ['name', 'surname', 'email', 'gender', 'birth'];
    public $timestamps = false;
}
