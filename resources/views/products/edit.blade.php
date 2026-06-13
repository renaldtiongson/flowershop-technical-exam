<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">


                <h2 class="text-xl font-bold mb-6">Edit Product</h2>

                <!-- Product Name -->
                <input type="text" id="product_name"
                    class="border p-2 w-full mb-3"
                    placeholder="Product Name"
                    value="{{ $product->product_name }}">

                <!-- Description -->
                <textarea id="product_description"
                    class="border p-2 w-full mb-3"
                    placeholder="Product Description">{{ $product->product_description }}</textarea>

                <!-- Quantity -->
                <input type="number" id="quantity"
                    class="border p-2 w-full mb-3"
                    placeholder="Quantity"
                    value="{{ $product->quantity }}">

                <!-- Price -->
                <input type="number" id="price"
                    class="border p-2 w-full mb-3"
                    placeholder="Price" step="0.01"
                    value="{{ $product->price }}">

                <!-- Status -->
                <select id="status" class="border p-2 w-full mb-4">

                    <option value="active"
                        {{ $product->status == 'active' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="inactive"
                        {{ $product->status == 'inactive' ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>

                <!-- Buttons -->
                <div class="flex gap-2">

                    <button id="updateProduct"
                            class="bg-green-500 text-white px-4 py-2 w-full">
                        Update Product
                    </button>

                    <a href="{{ route('products.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 w-full text-center">
                        Cancel
                    </a>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>

<script>
let URL = "{{ route('products.update', $product->id) }}";

$('#updateProduct').click(function () {

    $.ajax({
        url: URL,
        type: "POST",
        data: {
            product_name: $('#product_name').val(),
            product_description: $('#product_description').val(),
            quantity: $('#quantity').val(),
            price: $('#price').val(),
            status: $('#status').val(),
            _token: "{{ csrf_token() }}"
        },
        success: function (res) {

            alert("Product updated successfully!");

            // redirect back to index
            window.location.href = "{{ route('products.index') }}";
        },
        error: function (err) {
            alert("Error updating product");
            console.log(err.responseJSON);
        }
    });

});
</script>
