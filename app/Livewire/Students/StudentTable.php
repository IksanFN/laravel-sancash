<?php

namespace App\Livewire\Students;

use App\Models\Group;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentTable extends Component
{
    use WithPagination;

    public $query = '';
    public $limit = 10;
    public $group = '';
    
    public function render()
    {
        $groups = Student::query()->select('student_group')->get();
        $students = Student::query()
        ->when($this->query, function ($query) {
            $query->where(function ($query) {
                $query->where('student_nisn', 'like', '%'.$this->query.'%')
                    ->orWhere('student_name', 'like', '%'.$this->query.'%');
            });
        })->when($this->group, function($query) {
            $query->where(function($query) {
                $query->where('student_group', '=', $this->group);
            });
        })
        ->latest()->paginate($this->limit);
        return view('livewire.students.student-table', compact('students', 'groups'));
    }
}
