<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;
use App\Models\Education;
use App\Models\WorkHistory;
use App\Models\Department;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'address', 'dob', 'position_id', 'photo'];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function educations()
    {
        return $this->hasMany(Education::class);
    }
    public function workHistories()
    {
        return $this->hasMany(WorkHistory::class);
    }
}
