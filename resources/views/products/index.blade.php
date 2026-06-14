<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <div class="flex justify-between mb-4">
                    <h2 class="text-xl font-bold">Products</h2>

                    

                    <a href="{{ route('products.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded">
                        + Add Product
                    </a>
                </div>

                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">Name</th>
                            <th class="border p-2">Price</th>
                            <th class="border p-2">Qty</th>
                            <th class="border p-2">Status</th>
                            <th class="border p-2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $product)
                            <tr id="row-{{ $product->id }}">
                                <td class="border p-2">{{ $product->product_name }}</td>
                                <td class="border p-2">{{ $product->price }}</td>
                                <td class="border p-2">{{ $product->quantity }}</td>
                                <td class="border p-2">{{ $product->status }}</td>

                                <td class="border p-2">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="text-blue-500">
                                        Edit
                                    </a>
                                    <button onclick="deleteProduct({{ $product->id }})"
                                        class="text-red-500">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $products->links() }}
                </div>

            </div>
        </div>
    </div>

</x-app-layout>


<script>

    const DELETE_URL = "{{ route('products.destroy', ['id' => '__ID__']) }}";


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function deleteProduct(id)
    {
        
        Swal.fire({
            title: 'Delete Product?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let url = DELETE_URL.replace('__ID__', id);

                $.ajax({
                    url: url,
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (res) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Product has been deleted.',
                            timer: 3000,
                            showConfirmButton: false
                        });

                        $('#row-' + id).fadeOut(300, function () {
                            $(this).remove();
                        });


                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: 'An error occurred while deleting the product.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                });
                
            }
        });

        

        
    }

    
</script>


@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif