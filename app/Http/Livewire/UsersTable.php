<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public function render()
    {
        $users = User::search($this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->simplePaginate($this->perPage); v

        return view('livewire.users-table', compact('users'));
    }
}
