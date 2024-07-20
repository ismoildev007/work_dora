<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amount extends Model
{
    use HasFactory;

    protected $table = 'amounts';

    protected $fillable = [
        'project_id',
        'profit',
        'outlay',
    ];

    public function project()
    {
        $this->belongsTo(Project::class);
    }
}
