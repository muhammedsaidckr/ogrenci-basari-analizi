<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTitle extends Model
{
    use HasFactory;
    protected $fillable = [
        'lesson_id',
        'name'
    ];

    public function lessons() {
        return $this->belongsTo(Lesson::class);
    }


    public function results() {
        return $this->hasMany(SubTitleResult::class);
    }
}
