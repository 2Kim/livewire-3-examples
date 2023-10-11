<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Form;

class DependentDropdownForm extends Form
{
    #[Rule('required|min:3')]
    public ?string $name;

    #[Rule('required')]
    public ?int $category_id;

    #[Rule('required')]
    public ?int $subcategory_id;

    public function store(): void
    {
        Product::create($this->validate());
        $this->reset();
    }
}
