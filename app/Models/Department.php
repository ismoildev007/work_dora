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
        $this->belongsTo(Status::class, 'id', 'status_id');
    }

    public function employees()
    {
        $this->hasMany(Employees::class);
    }

    public function project()
    {
        $this->hasMany(Project::class);
    }
}
