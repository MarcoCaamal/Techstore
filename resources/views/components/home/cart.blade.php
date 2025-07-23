<x-layouts.main title="Cart" showHero="false">
    <section class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-6">Tu Carrito de Compras</h1>

        <!-- Cart Items -->
        <div class="bg-white shadow-md rounded-lg p-6">
            @if($cartItems->isEmpty())
                <p class="text-gray-500 text-center">Tu carrito está vacío.</p>
            @else
                <ul class="space-y-4">
                    @foreach($cartItems as $item)
                        <li class="flex justify-between items-center">
                            <div class="flex items-center space-x-4">
                                <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded">
                                <div>
                                    <h2 class="text-lg font-semibold">{{ $item->product->name }}</h2>
                                    <p class="text-gray-600">{{ $item->product->formatted_price }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="text-gray-600">Cantidad: {{ $item->quantity }}</span>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:text-red-700 transition-colors duration-200">Eliminar</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-6 flex justify-between items-center"></div>
                    <span class="text-xl font-bold">Total: {{ $totalPrice }}</span>
                </div>
                <div class="mt-6">
                    <a href="{{ route('checkout') }}" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 transition-colors duration-200">Proceder al Pago</a>
                </div>
</x-layouts.main>