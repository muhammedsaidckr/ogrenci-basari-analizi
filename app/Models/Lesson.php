<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_type_id',
        'name'
    ];

    public function sub() {
        return $this->belongsToMany(SubTitle::class);
    }
}
