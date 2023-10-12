<?php

namespace App\Livewire\Bills;

use Livewire\Component;
use App\Models\SecondWeek;

class SecondWeekTable extends Component
{

    public $query = '';
    public $limit = 10;

    public function render()
    {
        $secondWeeks = SecondWeek::query()
                    ->when($this->query, function ($query) {
                        $query->where(function ($query) {
                            $query->where('bill_code', 'like', '%'.$this->query.'%')
                                ->orWhere('student_nisn', 'like', '%'.$this->query.'%')
                                ->orWhere('student_name', 'like', '%'.$this->query.'%');
                        });
                    })->latest()->paginate();
        return view('livewire.bills.second-week-table', compact('secondWeeks'));
    }
}
