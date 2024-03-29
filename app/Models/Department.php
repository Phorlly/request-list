<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'departments';
    protected $fillable = ['name','short', 'noted'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
