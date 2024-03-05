<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'leaves';
    protected $fillable = ['name', 'duration', 'is_leave', 'noted'];
}
