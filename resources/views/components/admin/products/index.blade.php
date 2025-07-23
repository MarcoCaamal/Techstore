<x-layouts.dashboard>
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Productos</h1>
                <p class="mt-2 text-sm text-gray-700">Gestiona todos los productos de tu tienda</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <a href="{{ route('admin.products.create') }}"
                   class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:w-auto">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Crear Producto
                </a>
            </div>
        </div>

        <!-- Filters -->
        <div class="mt-6 bg-white shadow rounded-lg">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Filtros</h3>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <form method="GET" class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-2">
                        <label for="search" class="block text-sm font-medium text-gray-700">Buscar</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                               placeholder="Nombre, SKU o descripción"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="category" class="block text-sm font-medium text-gray-700">Categoría</label>
                        <select name="category" id="category"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="">Todas las categorías</option>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="sm:col-span-1">
                        <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
                        <select name="status" id="status"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="">Todos</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Activo</option>
                            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactivo</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Borrador</option>
                        </select>
                    </div>
                    <div class="sm:col-span-1 flex items-end">
                        <button type="submit"
                                class="w-full inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Filtrar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Products table -->
        <div class="mt-6 bg-white shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Lista de Productos ({{ $products->total() }})
                </h3>
            </div>

            @if($products->count() > 0)
                <ul class="divide-y divide-gray-200">
                    @foreach($products as $product)
                        <li class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center min-w-0 flex-1">
                                    <div class="flex-shrink-0">
                                        @if($product->images->first())
                                            <img class="h-16 w-16 rounded-lg object-cover"
                                                 src="{{ Storage::url($product->images->first()->url) }}"
                                                 alt="{{ $product->name }}">
                                        @else
                                            <div class="h-16 w-16 rounded-lg bg-gray-200 flex items-center justify-center">
                                                <svg class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-4 min-w-0 flex-1">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h4 class="text-sm font-medium text-gray-900 truncate">{{ $product->name }}</h4>
                                                <p class="text-sm text-gray-500">SKU: {{ $product->sku }}</p>
                                                <p class="text-sm text-gray-500">{{ $product->category?->name ?? 'Sin categoría' }}</p>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-sm font-medium text-gray-900">${{ number_format($product->price, 2) }}</p>
                                                <p class="text-sm text-gray-500">Stock: {{ $product->stock }}</p>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                    {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $product->is_active ? 'Activo' : 'Inactivo' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-6 flex items-center space-x-3">
                                    <a href="{{ route('admin.products.show', $product) }}"
                                       class="text-blue-600 hover:text-blue-900 text-sm font-medium">Ver</a>
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                       class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">Editar</a>
                                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                                          class="inline"
                                          onsubmit="return confirm('¿Estás seguro de que quieres eliminar este producto?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <!-- Pagination -->
                @if($products->hasPages())
                    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $products->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No hay productos</h3>
                    <p class="mt-1 text-sm text-gray-500">Comienza creando tu primer producto.</p>
                    <div class="mt-6">
                        <a href="{{ route('admin.products.create') }}"
                           class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Crear Producto
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
</x-layouts.dashboard>
