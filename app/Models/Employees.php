<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'user_id',
        'department_id',
        'status_id',
        'role',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function work_employees()
    {
        return $this->hasMany(WorkEmployees::class);
    }
}
