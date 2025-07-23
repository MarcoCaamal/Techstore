<x-layouts.dashboard>
<div class="py-6">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Crear Producto</h1>
            <p class="mt-1 text-sm text-gray-600">Agrega un nuevo producto a tu catálogo</p>
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
                        <span class="ml-1 text-gray-500 md:ml-2">Crear</span>
                    </div>
                </li>
            </ol>
        </nav>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Basic Information -->
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Información Básica</h3>
                    <p class="mt-1 text-sm text-gray-500">Información general del producto</p>
                </div>
                <div class="px-4 py-5 sm:p-6 space-y-6">
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('name') border-red-300 @enderror">
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="is_active" class="block text-sm font-medium text-gray-700">Estado</label>
                            <select name="is_active" id="is_active" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('is_active') border-red-300 @enderror">
                                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactivo</option>
                                <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Activo</option>
                            </select>
                            @error('is_active')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <textarea name="description" id="description" rows="4"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('description') border-red-300 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pricing -->
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Precio</h3>
                    <p class="mt-1 text-sm text-gray-500">Configuración de precio del producto</p>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-1">
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">Precio de Venta *</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price') }}" required
                                       class="pl-7 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('price') border-red-300 @enderror">
                            </div>
                            @error('price')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Organization -->
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Organización</h3>
                    <p class="mt-1 text-sm text-gray-500">Categorización y marca del producto</p>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría *</label>
                            <select name="category_id" id="category_id" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('category_id') border-red-300 @enderror">
                                <option value="">Selecciona una categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="brand_id" class="block text-sm font-medium text-gray-700">Marca</label>
                            <select name="brand_id" id="brand_id"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('brand_id') border-red-300 @enderror">
                                <option value="">Sin marca</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inventory -->
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Inventario</h3>
                    <p class="mt-1 text-sm text-gray-500">Gestión de stock y códigos del producto</p>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-3">
                        <div>
                            <label for="sku" class="block text-sm font-medium text-gray-700">SKU *</label>
                            <input type="text" name="sku" id="sku" value="{{ old('sku') }}" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('sku') border-red-300 @enderror">
                            @error('sku')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700">Cantidad en Stock *</label>
                            <input type="number" name="stock" id="stock" min="0" value="{{ old('stock', 0) }}" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('stock') border-red-300 @enderror">
                            @error('stock')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="weight" class="block text-sm font-medium text-gray-700">Peso (kg)</label>
                            <input type="number" name="weight" id="weight" step="0.001" min="0" value="{{ old('weight') }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('weight') border-red-300 @enderror">
                            @error('weight')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="dimensions" class="block text-sm font-medium text-gray-700">Dimensiones</label>
                        <input type="text" name="dimensions" id="dimensions" value="{{ old('dimensions') }}"
                               placeholder="ej: 30cm x 20cm x 10cm"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('dimensions') border-red-300 @enderror">
                        @error('dimensions')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Images -->
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Imágenes</h3>
                    <p class="mt-1 text-sm text-gray-500">Sube las imágenes del producto</p>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Imágenes del Producto</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="images" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span>Subir archivos</span>
                                        <input id="images" name="images[]" type="file" class="sr-only" multiple accept="image/*">
                                    </label>
                                    <p class="pl-1">o arrastra y suelta</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF hasta 2MB cada una</p>
                            </div>
                        </div>
                        @error('images.*')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.products.index') }}"
                   class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancelar
                </a>
                <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Crear Producto
                </button>
            </div>
        </form>
    </div>
</div>
</x-layouts.dashboard>
