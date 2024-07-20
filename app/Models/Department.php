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
        'phone_number',
    ];

    public function employees()
    {
        $this->hasMany(Employees::class);
    }

    public function project()
    {
        $this->hasMany(Project::class);
    }
}
