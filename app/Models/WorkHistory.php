<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class WorkHistory extends Model
{
    use HasFactory;
    protected $fillable = ['position', 'company', 'start_date', 'end_date', 'employee_id'];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
