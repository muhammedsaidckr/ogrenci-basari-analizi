<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Students extends Component {

    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.students', [
            'students' => Student::where('name', 'like', '%' . $this->search . '%')
                ->where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'DESC')
                ->paginate(10)
        ]);
    }
}
