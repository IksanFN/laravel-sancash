<?php

namespace App\Livewire\Bills;

use App\Models\ThirdWeek;
use Livewire\Component;

class ThirdWeekTable extends Component
{
    public $query = '';
    public $limit = 10;

    public function render()
    {
        $thirdWeeks = ThirdWeek::query()
                    ->when($this->query, function ($query) {
                        $query->where(function ($query) {
                            $query->where('bill_code', 'like', '%'.$this->query.'%')
                                ->orWhere('student_nisn', 'like', '%'.$this->query.'%')
                                ->orWhere('student_name', 'like', '%'.$this->query.'%');
                        });
                    })->latest()->paginate();
        return view('livewire.bills.third-week-table', compact('thirdWeeks'));
    }
}
