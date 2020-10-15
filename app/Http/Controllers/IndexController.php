<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller {

    public function index($slug)
    {
        $students = \App\Models\Student::query()
            ->where('user_id', Auth::user()->id)
            ->orderBy('name', 'ASC')
            ->pluck('name', 'id');
        $examType = \App\Models\ExamType::query()
            ->where('slug', $slug)
            ->first();
        $exams = \App\Models\Exam::query()
            ->where('user_id', Auth::user()->id)
            ->where('exam_type_id', $examType->id)
            ->pluck('name', 'id');

        return view('welcome', compact('students', 'exams', 'examType'));

    }


    public function show($slug)
    {
        $selected = request('student_id');
        $exam_id = request('exam_id');
        $lesson_id = request('lesson_id');

        $examType = \App\Models\ExamType::query()->where('slug', $slug)->first();
        $students = \App\Models\Student::query()->where('user_id', Auth::user()->id)->pluck('name', 'id');
        $exams = \App\Models\Exam::query()->where('exam_type_id', $examType->id)->where('user_id', Auth::user()->id)->pluck('name', 'id');
        $lessons = \App\Models\Lesson::query()->where('exam_type_id', $examType->id)->pluck('name', 'id');

        if (empty($exam_id) && empty($lesson_id))
        {
            $exam_results = \App\Models\ExamResult::query()->with('exam')->where('student_id', $selected)->get()->groupBy('exam_id');
            if (count($exam_results) > 0)
            {
                $l_results = $exam_results->map(function ($item) {
                    return $item[0]->exam->name;
                });
                foreach ($l_results as $l)
                    $labels[] = $l;
                $labels = collect($labels);


                foreach ($exam_results as $key => $result)
                {
                    foreach ($result as $item)
                    {
                        $results[$key][] = (round(($item['net']
                                / ($item['true'] + $item['false'] + $item['empty']))
                            * 100));
                    }
                }
                foreach ($results as $key => $result)
                {
                    $total = 0;
                    foreach ($result as $item)
                    {
                        $total += $item;
                    }
                    $exam_perc[] = $total / sizeof($result);
                }
                $success_percentage = collect($exam_perc);

                return view('welcome', compact('success_percentage', 'students', 'exams', 'selected', 'exam_id', 'lesson_id', 'lessons', 'labels', 'examType'));
            }


        }
        if (empty($exam_id) && isset($lesson_id))
        {
            $exam_results = \App\Models\ExamResult::query()
                ->with('exam')
                ->where('student_id', $selected)
                ->where('lesson_id', $lesson_id)
                ->get()
                ->groupBy('exam_id');
            if (count($exam_results) > 0)
            {
                $l_results = $exam_results->map(function ($item) {
                    return $item[0]->exam->name;
                });
                foreach ($l_results as $l)
                    $labels[] = $l;
                $labels = collect($labels);


                foreach ($exam_results as $key => $result)
                {
                    foreach ($result as $item)
                    {
                        $results[$key][] = (round(($item['net']
                                / ($item['true'] + $item['false'] + $item['empty']))
                            * 100));
                    }
                }
                foreach ($results as $key => $result)
                {
                    $total = 0;
                    foreach ($result as $item)
                    {
                        $total += $item;
                    }
                    $exam_perc[] = $total / sizeof($result);
                }
                $success_percentage = collect($exam_perc);

                return view('welcome', compact('success_percentage', 'students', 'exams', 'selected', 'exam_id', 'lesson_id', 'lessons', 'labels', 'examType'));
            }
        }

        if (empty($lesson_id))
        {
            $exam_results = \App\Models\ExamResult::query()->with('lesson')->where('student_id', $selected)->where('exam_id', $exam_id)->get();
            $true_answers = $exam_results->map(function ($items) {
                return $items->true;
            });
            $false_answers = $exam_results->map(function ($items) {
                return $items->false;
            });
            $empty_answers = $exam_results->map(function ($items) {
                return $items->empty;
            });
            $net = $exam_results->map(function ($items) {
                return $items->net;
            });
            if (count($exam_results) > 0)
            {
                $labels = $exam_results->map(function ($result) {
                    return $result->lesson->name;
                });
                $success_percentage = $exam_results->map(function ($exam_result) {
                    if ($exam_result['true'] + $exam_result['false'] + $exam_result['empty'] != 0)
                    {
                        return round(($exam_result['net']
                                / ($exam_result['true'] + $exam_result['false'] + $exam_result['empty']))
                            * 100);
                    } else
                    {
                        return;
                    }
                });

                return view('welcome', compact('true_answers', 'false_answers', 'empty_answers',
                    'success_percentage', 'students', 'exams', 'selected', 'exam_id', 'lesson_id', 'lessons', 'labels', 'examType'));
            }
        } else
        {
            $exam_results = \App\Models\ExamResult::query()->where('student_id', $selected)->where('exam_id', $exam_id)->where('lesson_id', $lesson_id)->first('id');
            if (isset($exam_results))
            {
                $sub_title_results = \App\Models\SubTitleResult::query()->where('exam_result_id', $exam_results->id)->with('sub')->get();

                $true_answers = $sub_title_results->map(function ($item) {
                    return $item->true;
                });
                $false_answers = $sub_title_results->map(function ($item) {
                    return $item->false;
                });
                $empty_answers = $sub_title_results->map(function ($item) {
                    return $item->empty;
                });
            }
            if (isset($sub_title_results) && count($sub_title_results) > 0)
            {
                $success_percentage = $sub_title_results->map(function ($exam_result) {
                    return round(($exam_result['true']
                            / ($exam_result['true'] + $exam_result['false'] + $exam_result['empty']))
                        * 100);
                });
                $labels = $sub_title_results->map(function ($result) {
                    return $result['sub']->name;
                });

                return view('welcome', compact('true_answers', 'false_answers', 'empty_answers',
                    'success_percentage', 'students', 'exams', 'selected', 'exam_id', 'lesson_id', 'lessons', 'labels', 'examType'));
            }
        }

        return view('welcome', compact('students', 'exams', 'selected', 'exam_id', 'lesson_id', 'lessons', 'examType'));
    }

}
