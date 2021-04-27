<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Storage;

class EditPost extends Component{

    use WithFileUploads;

    public $open = false;
    public $post, $image, $identidicador;

    protected $rules = [
        'post.title' => 'required',
        'post.content' => 'required',
        // 'image' => 'required|image|max:2048',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function mount(Post $post){
        $this->post = $post;
        $this->identidicador = rand();
    }


    public function save(){

        $this->validate();

        // $image = $this->image->store('posts');
        if ($this->image) {
            Storage::delete([$this->post->image]);

            $this->post->image = $this->image->store('posts');
        }

        $this->post->save();

        $this->reset(['open', 'image']);

        $this->identidicador = rand();

        $this->emitTo('show-posts','render');
        $this->emit('alert', 'info', 'El post se actualizo sastisfactoriamente');

    }

    public function render(){
        return view('livewire.edit-post');
    }
}
