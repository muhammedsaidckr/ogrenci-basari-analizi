<?php

namespace App\Http\Livewire;

use App\Models\Exam;
use App\Models\Lesson;
use App\Models\Student;
use App\Models\SubTitle;
use App\Models\SubTitleResult;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ExamResult extends Component {

    public $student_id;
    public $exam_id;
    public $lesson_id;
    public $true;
    public $false;
    public $empty;
    public $sub_title;
    public $activeTab = 1;
    public $exam_results = [];
    public $lesson_sub_titles = [];
    public $saved_sub_titles = [];
    public $sub_results;
    public $update_sub_result = 0;
    public $exam_result_id;
    public $exam_type_id;
    public $exam_type_name;
    public $results = [];
    public $sub_keys = [];

    public function mount($examType)
    {
        $this->exam_type_id = $examType->keys()[0];
        $this->exam_type_name = $examType->first();
    }

    public function getExamResults()
    {
        if ($this->student_id != null && $this->exam_id != null)
        {
            $this->exam_results = \App\Models\ExamResult::query()->
            where('student_id', $this->student_id)
                ->where('exam_id', $this->exam_id)
                ->get()->pluck('lesson_id', 'id')->toArray();
            $this->getExamPoints();
        } else
        {
            $this->exam_results = [];
            $this->resetForm();
        }
    }

    public function getExamPoints()
    {
        if ($this->student_id != null && $this->exam_id != null && $this->lesson_id != null)
        {
            $result = \App\Models\ExamResult::query()
                ->with('results')
                ->where('student_id', $this->student_id)
                ->where('exam_id', $this->exam_id)
                ->where('lesson_id', $this->lesson_id)
                ->first();
            if ($result)
            {
                $this->exam_result_id = $result->id;
                $this->true = $result->true;
                $this->false = $result->false;
                $this->empty = $result->empty;
            } else
            {
                $this->exam_result_id = null;
                $this->resetForm();
            }
        } else
        {
            $this->exam_result_id = null;
            $this->resetForm();
        }
    }

    public function checkSubResult()
    {
        $this->results = SubTitleResult::query()
            ->where('exam_result_id', $this->exam_result_id)
            ->get();
        if ($this->sub_title && count($this->results) > 0)
        {
            $this->sub_keys = collect($this->results)->map(function ($result) {
                return $result->sub_title_id;
            })->toArray();
            $this->lesson_sub_titles = SubTitle::query()->where('lesson_id', $this->lesson_id)->get();
            $this->saved_sub_titles = $this->lesson_sub_titles->map(function ($titles) {
                if (in_array($titles->id, $this->sub_keys))
                    return collect($this->results)->where('sub_title_id', $titles->id)->first();
            });
            $this->update_sub_result = 1;
        } else
        {
            $this->lesson_sub_titles = SubTitle::query()->where('lesson_id', $this->lesson_id)->get();
            $this->saved_sub_titles = [];
            $this->update_sub_result = 1;
        }
    }

    public function deleteItem($key)
    {
        SubTitleResult::query()->where('sub_title_id', $key)->where('exam_result_id', $this->exam_result_id)->delete();
        $this->checkSubResult();
        session()->flash('message', 'Başarıyla silindi');
    }

    public function submitForm($formData)
    {
        if ($formData['true'] == "")
        {
            $formData['true'] = 0;
            $this->true = 0;
        }
        if ($formData['false'] == "")
        {
            $formData['false'] = 0;
            $this->false = 0;
        }
        if ($formData['empty'] == "")
        {
            $formData['empty'] = 0;
            $this->empty = 0;
        }


        $attributes = $this->validate([
            'lesson_id' => 'required',
            'exam_id' => 'required',
            'student_id' => 'required',
            'true' => 'nullable',
            'false' => 'nullable',
            'empty' => 'nullable'
        ], [
            'lesson_id.required' => 'Ders seçimi yapmadınız',
            'exam_id.required' => 'Sınav seçimi yapmadınız',
            'student_id.required' => 'Öğrenci seçimi yapmadınız'
        ]);

        $attributes['net'] = $this->true -
            $this->false / 4;

        $this->exam_result_id = \App\Models\ExamResult::create($attributes)->id;

        $this->resetForm();
        session()->flash('message', 'Sınav sonucu başarıyla kaydedildi');
        $this->getExamResults();
        if ($this->sub_title)
        {
            $this->lesson_sub_titles = SubTitle::query()->where('lesson_id', $this->lesson_id)->get();
            $this->saved_sub_titles = [];
            $this->activeTab = 2;
        }
    }

    public
    function updateForm($formData)
    {
        $exam_result = \App\Models\ExamResult::query()->findOrFail($this->exam_result_id);
        if ($formData['true'] == "")
        {
            $formData['true'] = 0;
            $this->true = 0;
        }
        if ($formData['false'] == "")
        {
            $formData['false'] = 0;
            $this->false = 0;
        }
        if ($formData['empty'] == "")
        {
            $formData['empty'] = 0;
            $this->empty = 0;
        }
        $attributes = $this->validate([
            'lesson_id' => 'required',
            'exam_id' => 'required',
            'student_id' => 'required',
            'true' => 'nullable',
            'false' => 'nullable',
            'empty' => 'nullable'
        ]);

        $attributes['net'] = $this->true -
            $this->false / 4;

        $exam_result->update($attributes);
        if ($this->sub_title)
        {
            $this->activeTab = 2;
            $this->checkSubResult();
        } else
        {
            $this->activeTab = 1;
            $this->resetForm();
            session()->flash('message', 'Sınav sonucu başarıyla güncellendi');
            $this->getExamResults();
        }
    }

    public
    function resetForm()
    {
        if ($this->activeTab == 1)
        {
            $this->true = null;
            $this->false = null;
            $this->empty = null;
        } else
        {
            $this->sub_title = null;
            $this->activeTab = 1;
            $this->saved_sub_titles = [];
        }
    }

    public function saveSubResult($formData)
    {
        for ($i = 0; $i < count($this->lesson_sub_titles); $i++)
            $this->sub_results[$i] = collect(
                [
                    'sub_title_id' => $formData['sub_title[' . $i . ']'],
                    'sub_result' => $formData['sub_result[' . $i . ']'],
                    'true' => $formData['sub_true[' . $i . ']'],
                    'false' => $formData['sub_false[' . $i . ']'],
                    'empty' => $formData['sub_empty[' . $i . ']']
                ]);
        foreach ($this->sub_results as $key => $sub_result)
        {
            if ($sub_result['true'] == "") $sub_result['true'] = 0;
            if ($sub_result['false'] == "") $sub_result['false'] = 0;
            if ($sub_result['empty'] == "") $sub_result['empty'] = 0;
            if (($sub_result['true'] == 0) && ($sub_result['false'] == 0) && ($sub_result['empty'] == 0))
                array_splice($this->sub_results, $key, 1);
            else
            {
                if (!!$this->update_sub_result && $sub_result['sub_result'] != "")
                {
                    $result = SubTitleResult::query()
                        ->where('exam_result_id', $this->exam_result_id)
                        ->where('sub_title_id', $sub_result['sub_result'])
                        ->first();
                    $result->true = $sub_result['true'];
                    $result->false = $sub_result['false'];
                    $result->empty = $sub_result['empty'];
                    $result->update();
                } else
                {
                    $result = new SubTitleResult();
                    $result->sub_title_id = $sub_result['sub_title_id'];
                    $result->exam_result_id = $this->exam_result_id;
                    $result->true = $sub_result['true'];
                    $result->false = $sub_result['false'];
                    $result->empty = $sub_result['empty'];
                    $result->save();
                }
            }
        }
        $this->resetForm();
        session()->flash('message', 'Alt konu başlıkları sonucu başarıyla kaydedildi');
    }

    public
    function render()
    {

        return view('livewire.exam-result', [
            'lessons' => Lesson::query()
                ->where('exam_type_id', $this->exam_type_id)
                ->pluck('name', 'id'),
            'exams' => Exam::all()
                ->where('user_id', Auth::user()->id)
                ->where('exam_type_id', $this->exam_type_id)
                ->pluck('name', 'id'),
            'students' => Student::query()
                ->where('user_id', Auth::user()->id)
                ->orderBy('name', 'ASC')
                ->pluck('name', 'id'),
        ]);
    }
}
