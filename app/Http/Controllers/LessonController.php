<?php

namespace App\Http\Controllers;

use App\Models\ExamResult;
use Illuminate\Http\Request;

class LessonController extends Controller {

    public function destroy(ExamResult $examResult)
    {
        $examResult->delete();
        return redirect()->back()
            ->with('message', 'Sınav sonucu başarıyla silindi');
    }
}
