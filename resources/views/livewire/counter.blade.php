<div class="p-16 flex justify-center items-center gap-5">
    <button wire:click="decrement" class="py-2 px-5 rounded text-2xl font-bold bg-green-500 hover:bg-green-600 text-white">-</button>
    <span class="py-2 px-4 rounded text-2xl font-bold">{{ $count }}</span>
    <button wire:click="increment" class="py-2 px-5 rounded text-2xl font-bold bg-green-500 hover:bg-green-600 text-white">+</button>
</div>
