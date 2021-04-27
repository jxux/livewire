<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class ShowPosts extends Component{

    use WithPagination;

    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public function updatingSearch(){
        $this ->resetPage();
    }

    protected $listeners = ['render'];

    public function render(){
        $posts = Post::where('title', 'like', '%'. $this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate(10);

        return view('livewire.show-posts', compact('posts'));
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

    public function destroy($id){
        Post::destroy($id);
    }
}
