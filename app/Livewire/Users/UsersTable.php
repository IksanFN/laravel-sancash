<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $query = '';
    public $limit = 10;

    public function updated($property): void
    {
        if ($property === 'query') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $users = User::query()
        ->when($this->query, function ($query) {
            $query->where(function ($query) {
                $query->where('nisn', 'like', '%'.$this->query.'%')
                    ->orWhere('name', 'like', '%'.$this->query.'%');
            });
        })->latest()->paginate($this->limit);
        return view('livewire.users.users-table', compact('users'));
    }
}
