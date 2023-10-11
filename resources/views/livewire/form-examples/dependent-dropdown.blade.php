<div>
    <div class="mt-5 min-h-screen flex items-center justify-center">
        <div class="w-1/2 mb-10">
            <h2 class="text-center mb-2 mt-0 text-5xl font-medium leading-tight">Dependent Dropdown</h2>

            <div class="bg-gray-200 dark:bg-slate-800 rounded-lg shadow-md p-6 mt-5">
                @if(session()->has('success'))
                    <span class="text-green-500 my-3 mb-3">{{ session('success') }}</span>
                @endif
                <form wire:submit="storeProduct" class="border-b-2 pb-10">
                    <div>
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="name">
                            Product Name
                        </label>
                        <input wire:model="form.name"
                               id="name"
                               type="text"
                               class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"/>

                        <span class="text-red-500">@error('form.name') {{ $message }} @enderror</span>
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="category">
                            Category
                        </label>
                        <select wire:model="form.category_id" wire:change="updateSubcategories"
                                id="category"
                                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                            <option value=""></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <span class="text-red-500">@error('form.category_id') {{ $message }} @enderror</span>
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="subcategory">
                            Subcategory
                        </label>
                        <select wire:model="form.subcategory_id"
                                id="subcategory"
                                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                            <option value=""></option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        </select>

                        <span class="text-red-500">@error('form.subcategory_id') {{ $message }} @enderror</span>
                    </div>

                    <div class="flex items-center mt-4">
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800  dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-green-600 active:bg-gray-900  dark:active:bg-green-700 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Add Product
                        </button>
                    </div>
                </form>

                <h3 class="font-bold text-xl mt-10 mb-5 dark:text-gray-100">Latest Products</h3>

                <table class="min-w-full bg-gray-300 dark:bg-slate-700">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider dark:text-gray-100">Product Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider dark:text-gray-100">Subcategory</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider dark:text-gray-100">Category</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $product->name }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $product->subcategory->name }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $product->subcategory->category->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-5">
                    {{ $products->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
