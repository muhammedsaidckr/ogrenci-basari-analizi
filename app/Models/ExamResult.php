<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model {

    use HasFactory;

    protected $fillable = [
        'exam_id',
        'lesson_id',
        'student_id',
        'true',
        'false',
        'empty',
        'net'
    ];

    public function results()
    {
        return $this->hasMany(SubTitleResult::class);
    }

    public function deleteResults()
    {
        $this->results()->delete();
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
