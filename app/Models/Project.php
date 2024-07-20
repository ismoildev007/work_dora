<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'department_id',
        'title',
        'description',
        'status',
        'image',
        'images',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function department()
    {
        $this->belongsTo(Department::class);
    }
}
