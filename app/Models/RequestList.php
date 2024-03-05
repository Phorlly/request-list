<?php

namespace App\Models;

use App\Models\User;
use App\Models\Leave;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestList extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'request_lists';
    protected $fillable = ['leave_id', 'status', 'user_id','noted', 'started', 'ended'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function leave()
    {
        return $this->belongsTo(Leave::class, 'leave_id');
    }

}
