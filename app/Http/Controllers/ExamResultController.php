<?php

namespace App\Http\Controllers;

use App\Models\ExamResult;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamResultController extends Controller {

    public function create($slug)
    {
        $examType = \App\Models\ExamType::query()->where('slug', $slug)->pluck('name', 'id');
        return view('cms.exam-result.create', compact('examType'));
    }

}
