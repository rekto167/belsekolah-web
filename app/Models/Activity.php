<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['bell'];

    public function bell()
    {
        return $this->belongsTo(Bell::class, 'bell_id', 'id');
    }
}
