<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                
                <div class="flex justify-between mb-4">
                    <h2 class="text-xl font-bold">Orders</h2>
                </div>

                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">Order ID</th>
                            <th class="border p-2">Product Name</th>
                            <th class="border p-2">Price</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                            <tr id="row-{{ $order->id }}">
                                <td class="border p-2">{{ $order->id }}</td>
                                <td class="border p-2">{{ $order->product->product_name }}</td>
                                <td class="border p-2">{{ $order->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $orders->links() }}
                </div>

                <!-- Total Orders -->
                <div class="bg-white p-3 rounded-lg shadow border">
                    <div class="text-gray-500 text-sm">Total Orders</div>
                    <div class="text-2xl font-bold">
                        {{ $stats['totalOrders'] }}
                    </div>
                </div>

                <!-- Total Revenue -->
                <div class="bg-white p-3 rounded-lg shadow border">
                    <div class="text-gray-500 text-sm">Total Revenue</div>
                    <div class="text-2xl font-bold">
                        ₱{{ number_format($stats['totalAmount'], 2) }}
                    </div>
                </div>


            </div>
        </div>
        </div>
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">

        

    </div>

</x-app-layout>