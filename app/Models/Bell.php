<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bell extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function activity()
    {
        return $this->hasOne(Activity::class);
    }
}
