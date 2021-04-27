<?php

namespace App\Http\Livewire\Admin\Persons;

use App\Models\System\Catalogs\Country;
use App\Models\System\Catalogs\Department;
use App\Models\System\Catalogs\District;
use App\Models\System\Catalogs\IdentityDocumentType;
use App\Models\System\Catalogs\Province;
use Livewire\Component;

class CreatePerson extends Component{

    public $open = true;
    public $identity_document_type_id = '6', $department_id, $countrie_id, $province_id, $district_id;

    public function save(){

        // $this->validate();
        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image,
        ]);

        $this->reset(['open', 'department_id', 'countrie_id', 'province_id', 'district_id']);

        $this->identidicador = rand();

        $this->emitTo('show-persons','render');
        $this->emit('alert', 'success', 'El post se creo sastisfactoriamente');

    }

    public function render(){

        $countries = Country::whereActive()->orderByDescription()->get();
        $departments = Department::whereActive()->orderByDescription()->get();

        $provinces = Province::whereActive()->orderByDescription()->where('title', 'like', '%'. $this->search . '%')->get();

        $districts = District::whereActive()->orderByDescription()->get();
        $identity_document_types = IdentityDocumentType::whereActive()->get();

        return view('livewire.admin.persons.create-person', compact('identity_document_types', 'countries', 'departments', 'provinces', 'districts'));
    }
}
