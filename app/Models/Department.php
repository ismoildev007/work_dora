<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $fillable = [
        'name',
        'status_id',
        'phone_number',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function employees()
    {
        return $this->hasMany(Employees::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
