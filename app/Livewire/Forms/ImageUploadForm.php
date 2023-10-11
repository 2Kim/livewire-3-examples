<?php

namespace App\Livewire\Forms;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ImageUploadForm extends Form
{
    #[Rule('required|min:3')]
    public ?string $title = null;

    #[Rule('required|image|max:2048')]
    public ?object $image = null;

    public ?int $postId = null;
    public ?string $oldImage = null;

    public function store(): void
    {
        $this->validate();

        Image::create([
            'title' => $this->title,
            'image' => $this->image->store('images', 'public'),
        ]);
    }

    public function update(): void
    {
        $this->validate();

        $image = Image::findOrFail($this->postId);
        if ($this->image) {
            Storage::delete($image->image);
            $photo = $this->image->store('images', 'public');
        } else {
            $photo = $image->image;
        }

        $image->update([
            'title' => $this->title,
            'image' => $photo,
        ]);

        $this->postId = null;
    }

    public function delete(Image $image): void
    {
        Storage::delete($image->image);
        $image->delete();
    }

    public function setImage(Image $image): void
    {
        $this->postId   = $image->id;
        $this->title    = $image->title;
        $this->oldImage = $image->image;
    }
}
