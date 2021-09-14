<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditModification extends Model
{
    use HasFactory;


    protected $fillable = [
        'type',
        'status',
        'data',
        'audit_id'
    ];
}
