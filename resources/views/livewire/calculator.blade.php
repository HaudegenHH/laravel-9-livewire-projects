<div>
    <div class="flex flex-col items-center">
        <div class="flex p-16 mx-auto justify-center items-center gap-4">
            <!-- wire:model is livewires 2-way-databinding -->
            <!-- when u type sth into the input field -->
            <!-- the number1 property of Calculator class will be updated -->
            <!-- and on the other side: if you assign sth to $number1 inside.. -->
            <!-- the class, the input field will be updated -->
            <!-- similar to eg vuejs (v-model) -->
            <input type="number" wire:model="number1" placeholder="Number 1">

            <!-- and whenever you choose an option here..
                the $action property of Calculator class will be updated -->
            <select wire:model="action" class="w-24">
                <option>+</option>
                <option>-</option>
                <option>*</option>
                <option>/</option>
                <option>%</option>
            </select>

            <input type="number" wire:model="number2" placeholder="Number 2">

            <button wire:click="calculate"
                    class="py-2 px-5 bg-green-500 hover:bg-green-600 disabled:cursor-not-allowed disabled:bg-opacity-90 rounded text-white"
                    {{ $disabled ? 'disabled' : '' }}
                >=
            </button>
        </div>
        <p class="text-3xl">{{ $result }}</p>
    </div>
</div>
