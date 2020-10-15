<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamResult;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller {

    public function index()
    {
        return view('cms.student.index');
    }

    public function create()
    {
        return view('cms.student.create');
    }


    public function store()
    {
        Student::create(request()->validate([
            'name' => 'required',
            'user_id' => '',
        ], ['name.required' => 'Lütfen öğrenci adını giriniz']));

        return redirect()->route('student.create')->with('message', 'Öğrenci kaydı başarıyla oluşturuldu');
    }

    public function show(Student $student)
    {
        return view('cms.student.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('cms.student.edit', compact('student'));
    }

    public function update(Student $student)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'user_id' => '',
        ], ['name.required' => 'Lütfen öğrenci adını giriniz']);

        $student->update($attributes);
        return redirect()->route('student.index', $student)->with('message', 'Öğrenci kaydı başarıyla güncellendi.');
    }


    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('student.index')
            ->with('message', 'Öğrenci kaydı başarıyla silindi');
    }


    public function examShow(Student $student, Exam $exam)
    {
        $exam_results = ExamResult::where('student_id', $student->id)
            ->where('exam_id', $exam->id)
            ->get();

        return view('cms.student.exam.show', compact('exam_results', 'student', 'exam'));
    }

    public function examDelete(Student $student, Exam $exam)
    {
        $result = ExamResult::where('student_id', $student->id)->where('exam_id', $exam->id)->delete();

        return redirect()
            ->back()
            ->with('message', 'Öğrenciye bağlı deneme sınavı kaydı başarıyla silindi');
    }
}
