<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskInput extends Model
{
    use HasFactory;

    public function taskinputters()
    {
        return $this->belongsTo(User::class,'user_id');
    }


}
