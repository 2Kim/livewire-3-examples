<?php

namespace App\Livewire\FormExamples;

use App\Livewire\Forms\DependentDropdownForm;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class DependentDropdown extends Component
{
    use WithPagination;

    public DependentDropdownForm $form;
    public Collection $categories;
    public Collection $subcategories;

    public function mount(): void
    {
        $this->categories    = Category::all();
        $this->subcategories = collect();
    }

    public function updateSubcategories(): void
    {
        $this->subcategories = Subcategory::where('category_id', $this->form->category_id)->get();
    }

    public function storeProduct(): void
    {
        $this->form->store();

        session()->flash('success', 'Product created successfully.');
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.form-examples.dependent-dropdown', [
            'products' => Product::with('subcategory.category')->latest()->paginate(5),
        ]);
    }
}
