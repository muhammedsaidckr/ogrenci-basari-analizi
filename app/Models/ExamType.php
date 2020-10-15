<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'name'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }
}
