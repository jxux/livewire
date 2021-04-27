<?php

namespace App\Http\Livewire\Admin\Persons;

use Livewire\Component;
use Livewire\WithPagination;

class ShowPersons extends Component{

    use WithPagination;

    public $sort = 'id';
    public $direction = 'desc';

    public function updatingSearch(){
        $this ->resetPage();
    }

    public function render(){
        return view('livewire.admin.persons.show-persons');
    }

    public function order($sort){
        if ($this->sort = $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
        }
    }
    
}
