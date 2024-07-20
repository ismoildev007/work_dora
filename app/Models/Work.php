<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $table = 'works';

    protected $fillable = [
        'project_id',
        'manager_id',
        'title',
        'description',
        'status',
        'deadline',
        'image',
        'images',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function work_employees()
    {
        return $this->hasMany(WorkEmployees::class);
    }
}
