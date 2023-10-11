<?php

namespace App\Livewire\FormExamples;

use App\Livewire\Forms\ImageUploadForm;
use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ImageUpload extends Component
{
    use WithPagination;
    use WithFileUploads;

    public ImageUploadForm $form;

    public bool $showModal = false;

    public function create(): void
    {
        $this->openModal();
    }

    public function edit(Image $image): void
    {
        $this->form->setImage($image);
        $this->openModal();
    }

    public function update(): void
    {
        $this->form->update();
        $this->form->reset();
        $this->closeModal();

        session()->flash('success', 'Image updated successfully.');
    }

    public function delete(Image $image): void
    {
        $this->form->delete($image);
    }

    public function openModal(): void
    {
        $this->showModal = true;
        $this->resetValidation();
    }

    public function closeModal(): void
    {
        $this->showModal = false;
    }

    public function store(): void
    {
        $this->form->store();
        $this->form->reset();
        $this->closeModal();

        session()->flash('success', 'Image uploaded successfully.');
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.form-examples.image-upload', [
            'images' => Image::paginate(5),
        ]);
    }
}
