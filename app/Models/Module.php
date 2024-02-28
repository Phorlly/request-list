<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'modules';
    protected $fillable = ['name', 'icon', 'url', 'roles', 'status', 'noted'];
}
