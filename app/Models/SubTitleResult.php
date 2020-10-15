<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTitleResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_title_id',
        'exam_result_id',
        'true',
        'false',
        'empty'
    ];

    public function exam() {
        return $this->belongsTo(ExamResult::class, 'exam_result_id');
    }

    public function sub() {
        return $this->belongsTo(SubTitle::class, 'sub_title_id');
    }
}
