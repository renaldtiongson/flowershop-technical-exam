<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <h2 class="text-xl font-bold mb-6">Edit Product</h2>

                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Product Name -->
                    <input type="text"
                        name="product_name"
                        class="border p-2 w-full mb-3"
                        placeholder="Product Name"
                        value="{{ old('product_name', $product->product_name) }}">

                    <!-- Description -->
                    <textarea
                        name="product_description"
                        class="border p-2 w-full mb-3"
                        placeholder="Product Description">{{ old('product_description', $product->product_description) }}</textarea>

                    <!-- Quantity -->
                    <input type="number"
                        name="quantity"
                        class="border p-2 w-full mb-3"
                        placeholder="Quantity"
                        value="{{ old('quantity', $product->quantity) }}">

                    <!-- Price -->
                    <input type="number"
                        name="price"
                        class="border p-2 w-full mb-3"
                        placeholder="Price"
                        step="0.01"
                        value="{{ old('price', $product->price) }}">

                    <!-- Status -->
                    <select name="status" class="border p-2 w-full mb-4">
                        <option value="active"
                            {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="inactive"
                            {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>

                    <!-- Buttons -->
                    <div class="flex gap-2">

                        <button type="submit"
                                class="bg-green-500 text-white px-4 py-2 w-full">
                            Update Product
                        </button>

                        <a href="{{ route('products.index') }}"
                           class="bg-gray-500 text-white px-4 py-2 w-full text-center">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>