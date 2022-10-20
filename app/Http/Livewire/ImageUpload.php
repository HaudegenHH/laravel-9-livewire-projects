<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUpload extends Component
{
    use WithFileUploads;

    /**
     * @var \Livewire\TemporaryUploadedFile
     */
    public $image = [];

    public function save() {

        $this->validate([
            'image.*' => 'image|max:1024' // 1MB max
        ]);

        foreach ($this->image as $image) {
            $image->store('public');  // store inside public folder with tmp name
            // if you want to store with original name
            //$this->image->storeAs('public', $image->getClientOriginalName());
        }
    }


    public function render() {

        return view('livewire.image-upload', [
            'images' => collect(Storage::files('public'))
                ->filter(function($file) {
                    return in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['png', 'jpg', 'jpeg', 'gif', 'webp']);
                })
                ->map(function($file) {
                    return Storage::url($file);
                })
        ]);
    }


}
