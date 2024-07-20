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
        'role',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function department()
    {
        $this->belongsTo(Department::class);
    }

    public function work_employees()
    {
        return $this->hasMany(WorkEmployees::class);
    }
}
