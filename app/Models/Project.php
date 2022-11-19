<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    public function employe()
    {
        return $this->belongsTo(employe::class);
    }

    public function client()
    {
        return $this->belongsTo(client::class);
    }

}
