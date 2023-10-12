<?php

namespace App\Livewire\Bills;

use Livewire\Component;
use App\Models\FirstWeek;
use Livewire\WithPagination;

class FirstWeekTable extends Component
{
    use WithPagination;

    public $query = '';
    public $limit = 10;
    public $group = '';

    public function render()
    {
        $groups = FirstWeek::query()->select('student_group')->get();
        $billFirstWeek = FirstWeek::query()
                        ->when($this->query, function ($query) {
                            $query->where(function ($query) {
                                $query->where('bill_code', 'like', '%'.$this->query.'%')
                                    ->orWhere('student_nisn', 'like', '%'.$this->query.'%')
                                    ->orWhere('student_name', 'like', '%'.$this->query.'%');
                            });
                        })->when($this->group, function($query) {
                            $query->where(function($query) {
                                $query->where('student_group', '=', $this->group);
                            });
                        })->latest()->paginate();
        return view('livewire.bills.first-week-table', compact('billFirstWeek', 'groups'));
    }
}
