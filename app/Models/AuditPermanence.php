<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditPermanence extends Model
{
    use HasFactory;
    protected $table = 'audit_permanence';
    public $fillable = ['name', 'surname', 'email', 'gender', 'birth', 'audit_modification_id'];
}
