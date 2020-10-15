<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model {

    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'exam_type_id'
    ];

    public function type()
    {
        return $this->belongsTo(ExamType::class, 'exam_type_id');
    }
}
