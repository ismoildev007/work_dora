<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkEmployees extends Model
{
    use HasFactory;

    protected $table = 'work_employees';

    protected $fillable = [
        'employee_id',
        'work_id'
    ];

    public function work()
    {
        return $this->belongsTo(Work::class, 'work_id');
    }

    public function employee()
    {
        $this->belongsTo(Employees::class, 'employee_id');
    }
}
