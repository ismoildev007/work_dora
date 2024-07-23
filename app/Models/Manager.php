<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    protected $table = 'managers';

    protected $fillable = [
        'user_id',
        'status_id',
        'role_id',
        'role',
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
