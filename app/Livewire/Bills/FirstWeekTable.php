<?php

namespace App\Livewire\Bills;

use App\Models\FirstWeek;
use Livewire\Component;
use Livewire\WithPagination;

class FirstWeekTable extends Component
{
    use WithPagination;

    public function render()
    {
        $billFirstWeek = FirstWeek::query()->latest()->paginate();
        return view('livewire.bills.first-week-table', compact('billFirstWeek'));
    }
}
