<!-- w-[300px] fixed width of 300px-->
<div class="flex flex-col w-[300px] mx-auto py-16">
    <div class="flex gap-4 justify-between">
        <input type="text" wire:model="todoText" wire:keydown.enter="addTodo" placeholder="Type and hit enter" class="flex-1">
        <button
            class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 disabled:cursor-not-allowed disabled:bg-opacity-90 rounded text-white"
            wire:click="addTodo"
        >Add
        </button>
    </div>

    <div class="py-6">
        @if (count($todos) == 0)
            <p class="text-gray-500 text-center">Nothing to do! 😉</p>
        @endif
        @foreach ($todos as $index => $todo)
            <div
                class="flex gap-4 justify-between items-center py-1"
                wire:key="todo-{{ $todo->id }}"
            >
                <input
                    type="checkbox"
                    {{$todo->completed ? ' checked' : ''}}
                    wire:change="toggleTodo({{ $todo->id }})"
                >
                <label class="flex-1 {{ $todo->completed ? 'line-through' : '' }}">
                    {{ $todo->title }}
                </label>
                <button wire:click="deleteTodo({{ $todo->id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                      </svg>
                </button>
            </div>
        @endforeach
    </div>
</div>
