<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller {


    public function index()
    {
        $exams = Exam::where('user_id', Auth::user()->id)->get();

        return view('cms.exam.index', compact('exams'));
    }

    public function create()
    {
        $types = ExamType::query()->pluck('name', 'id');

        return view('cms.exam.create', compact('types'));
    }

    public function edit(Exam $exam)
    {
        $types = ExamType::query()->pluck('name', 'id');

        return view('cms.exam.edit', compact('exam', 'types'));
    }

    public function update(Exam $exam)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'exam_type_id' => '',
        ], ['name.required' => 'Lütfen deneme adını giriniz']);
        $attributes['user_id'] = Auth::user()->id;
        $exam->update($attributes);

        return redirect()
            ->route('ex.index')
            ->with('message', 'Deneme kaydı başarıyla güncellendi');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'exam_type_id' => '',
        ], ['name.required' => 'Lütfen deneme adını giriniz']);
        $attributes['user_id'] = Auth::user()->id;
        Exam::create($attributes);

        return redirect()->route('ex.create')->with('message', 'Deneme kaydı başarıyla oluşturuldu');
    }

    public function destroy(Exam $exam)
    {
        $exam->delete();

        return redirect()
            ->back()
            ->with('message', 'Deneme kaydı başarıyla silindi');
    }
}
