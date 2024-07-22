<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'status_id',
        'phone_number',
        'website',
        'address',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function project()
    {
        $this->hasMany(Project::class);
    }
}
