<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function result()
    {
        return $this->hasMany(ExamResult::class);
    }

    public function exam()
    {
        return $this->result->map->exam->flatten()->pluck('name', 'id');
    }
}
