<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ganchart extends Model
{
    // use HasFactory;
    public function project()
    {
        return $this->belongsTo(project::class);
    }
}
