<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;
use App\Models\Employee;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name'];
    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
