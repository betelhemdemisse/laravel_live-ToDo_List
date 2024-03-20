<?php

namespace App\Livewire;
use Livewire\Attribute\Rule;
use Livewire\Component;
use App\Models\ToDo_list;
use Livewire\withPagination;
class ToDo extends Component
{
    use withPagination;

   #[rule('required|min:3|max:50')]
    public $name;

    public $search;

    public function create(){
                 //  dd('name');
                 $validated = $this->validate([ 
                    'name' => 'required|min:3|max:50',
                ]);
      
           ToDo_list::create($validated);
           //sdd($validated);

        $this->reset('name');

        session()->flash('success','Saved.');

    }
    public function delete($todoId)
    {
        ToDo_list::find($todoId)->delete();
        session()->flash('delete','deleted.');

    }
    public function render()
    {
        return view('livewire.to-do',[
            'todos'=>ToDo_list::latest()->where('name','like',"%{$this->search}%")->paginate(5)
        ]);
    }
}
