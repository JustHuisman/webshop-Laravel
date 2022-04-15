<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
 
class UploadPhoto extends Component
{
    use WithFileUploads;
 
    public $image;
 
    public function save()
    {
        $this->validate([
            'image' => 'image|max:1024', // 1MB Max
        ]);
 
        $this->image->store('images');
    }

    public function render()
    {
        return view('livewire.upload-photo');
    }
}
