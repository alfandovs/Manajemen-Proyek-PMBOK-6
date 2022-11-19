<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charter extends Model
{
    public function Project()
    {
        return $this->belongsTo(Project::class);
    }

}
