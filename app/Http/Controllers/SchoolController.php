<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller {

    public function create()
    {
        return view('cms.school.create');
    }

    public function store()
    {
        School::create(request()->validate([
            'name' => 'required'
        ], [
            'name.required' => 'İsim alanı boş bırakılamaz'
        ]));
        return redirect()->route('school.create')->with('message', 'Kayıt başarıyla eklendi');
    }
}
