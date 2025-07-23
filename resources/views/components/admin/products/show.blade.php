<x-layouts.dashboard>
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-6 flex justify-between items-start">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ $product->name }}</h1>
                <p class="mt-1 text-sm text-gray-600">Detalles del producto</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.products.edit', $product) }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Editar
                </a>
                <a href="{{ route('admin.products.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                    Volver
                </a>
            </div>
        </div>

        <!-- Breadcrumb -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard.index') }}" class="text-gray-700 hover:text-gray-900">Dashboard</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <span class="text-gray-400">/</span>
                        <a href="{{ route('admin.products.index') }}" class="ml-1 text-gray-700 hover:text-gray-900 md:ml-2">Productos</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <span class="text-gray-400">/</span>
                        <span class="ml-1 text-gray-500 md:ml-2">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Información Principal -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Información Básica -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Información Básica</h3>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Nombre</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $product->name }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">SKU</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $product->sku }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Estado</dt>
                                <dd class="mt-1">
                                    @if($product->is_active)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Activo
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            Inactivo
                                        </span>
                                    @endif
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Precio</dt>
                                <dd class="mt-1 text-sm text-gray-900">${{ number_format($product->price, 2) }}</dd>
                            </div>
                            <div class="sm:col-span-2">
                                <dt class="text-sm font-medium text-gray-500">Descripción</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $product->description ?: 'Sin descripción' }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Categorización -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Categorización</h3>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Categoría</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $product->category ? $product->category->name : 'Sin categoría' }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Marca</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $product->brand ? $product->brand->name : 'Sin marca' }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Inventario -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Inventario y Especificaciones</h3>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-3">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Stock</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $product->stock }} unidades</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Peso</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $product->weight ? $product->weight . ' kg' : 'No especificado' }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Dimensiones</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $product->dimensions ?: 'No especificado' }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Características -->
                @if($product->features && $product->features->count() > 0)
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Características</h3>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                            @foreach($product->features as $feature)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">{{ $feature->name }}</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $feature->value }}</dd>
                            </div>
                            @endforeach
                        </dl>
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Imágenes -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Imágenes</h3>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        @if($product->images && $product->images->count() > 0)
                            <div class="grid grid-cols-2 gap-4">
                                @foreach($product->images as $image)
                                <div class="relative">
                                    <img src="{{ Storage::url($image->url) }}"
                                         alt="{{ $product->name }}"
                                         class="w-full h-32 object-cover rounded-lg">
                                    @if($image->is_primary)
                                        <span class="absolute top-2 left-2 bg-blue-600 text-white text-xs px-2 py-1 rounded">
                                            Principal
                                        </span>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="mt-2 text-sm text-gray-500">Sin imágenes</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Acciones -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Acciones</h3>
                    </div>
                    <div class="px-4 py-5 sm:p-6 space-y-3">
                        <a href="{{ route('admin.products.edit', $product) }}"
                           class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center block">
                            Editar Producto
                        </a>

                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                              onsubmit="return confirm('¿Estás seguro de que quieres eliminar este producto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Eliminar Producto
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Metadatos -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Metadatos</h3>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <dl class="space-y-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Creado</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $product->created_at->format('d/m/Y H:i') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Última actualización</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $product->updated_at->format('d/m/Y H:i') }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layouts.dashboard>
