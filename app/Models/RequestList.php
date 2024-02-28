<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestList extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'request_lists';
    protected $fillable = ['type', 'status', 'user', 'department', 'noted', 'started', 'ended'];
}
