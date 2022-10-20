<?php

namespace App\Http\Livewire;

use App\Models\TodoItem;
use Livewire\Component;

class TodoList extends Component
{
    public $todos;
    public string $todoText = '';

    protected $rules = [
        'todoText' => 'required|min:5'
    ];

    protected $validationAttributes = [
        'todoText' => 'ToDo'
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->selectTodos();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }

    public function addTodo()
    {
        // $data = $this->validate();
        // dd($data);
        // die();

        $todo = new TodoItem();
        $todo->title = $this->todoText;
        $todo->completed = false;
        $todo->save();

        $this->todoText = '';
        $this->selectTodos();
    }

    public function toggleTodo($id)
    {
        $todo = TodoItem::where('id', $id)->first();
        if (!$todo) {
            return;
        }
        $todo->completed = !$todo->completed;
        $todo->save();
        $this->selectTodos();
    }

    public function deleteTodo($id)
    {
        $todo = TodoItem::where('id', $id)->first();
        if (!$todo) {
            return;
        }
        $todo->delete();
        $this->selectTodos();
    }

    public function selectTodos()
    {
        $this->todos = TodoItem::orderBy('created_at', 'DESC')->get();
    }
}
