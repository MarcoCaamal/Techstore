<x-layouts.main :title="'Productos - Tech Store'">
    <!-- Custom CSS for product filters and search -->
    <style>
        .filter-checkbox:checked + .filter-label {
            background-color: #7c3aed;
            color: white;
        }
        .price-range-slider {
            -webkit-appearance: none;
            appearance: none;
            height: 6px;
            background: #e5e7eb;
            border-radius: 3px;
            outline: none;
        }
        .price-range-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            background: #7c3aed;
            border-radius: 50%;
            cursor: pointer;
        }
        .price-range-slider::-moz-range-thumb {
            width: 20px;
            height: 20px;
            background: #7c3aed;
            border-radius: 50%;
            cursor: pointer;
            border: none;
        }
    </style>

    <!-- Hero Section with Search -->
    <section class="bg-gradient-to-br from-purple-900 via-purple-800 to-blue-900 text-white py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-5xl font-bold mb-6">Encuentra tu tecnología perfecta</h1>
                <p class="text-xl text-purple-100 mb-8">Miles de productos de tecnología y gaming al mejor precio</p>

                                <!-- Search Bar -->
                <div class="max-w-2xl mx-auto">
                    <form method="GET" action="{{ route('products') }}" class="relative">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Buscar productos..."
                               class="w-full px-6 py-4 pl-12 text-gray-900 bg-white rounded-lg shadow-lg focus:ring-4 focus:ring-purple-300 focus:border-transparent outline-none">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <button type="submit" class="absolute inset-y-0 right-0 px-6 bg-purple-600 hover:bg-purple-700 text-white rounded-r-lg transition-colors">
                            Buscar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section with Filters -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">

                <!-- Sidebar Filters -->
                <div class="lg:w-1/4">
                    <form method="GET" action="{{ route('products') }}" id="filterForm">
                        <!-- Preserve search term -->
                        @if(request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        <div class="bg-white rounded-lg shadow-lg p-6 sticky top-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6">Filtros</h3>

                            <!-- Categories Filter -->
                            <div class="mb-8">
                                <h4 class="font-medium text-gray-900 mb-4">Categorías</h4>
                                <div class="space-y-3">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="category" value="all"
                                               {{ request('category', 'all') == 'all' ? 'checked' : '' }}
                                               onchange="submitForm()"
                                               class="text-purple-600 focus:ring-purple-300">
                                        <span class="ml-2 text-sm text-gray-700">Todas las categorías</span>
                                    </label>
                                    @if(isset($categories))
                                        @foreach($categories as $cat)
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="category" value="{{ $cat->slug ?? strtolower($cat->name) }}"
                                                   {{ request('category') == ($cat->slug ?? strtolower($cat->name)) ? 'checked' : '' }}
                                                   onchange="submitForm()"
                                                   class="text-purple-600 focus:ring-purple-300">
                                            <span class="ml-2 text-sm text-gray-700">{{ $cat->name }}</span>
                                        </label>
                                        @endforeach
                                    @else
                                        <!-- Static categories as fallback -->
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="category" value="processors"
                                                   {{ request('category') == 'processors' ? 'checked' : '' }}
                                                   onchange="submitForm()"
                                                   class="text-purple-600 focus:ring-purple-300">
                                            <span class="ml-2 text-sm text-gray-700">Procesadores</span>
                                        </label>
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="category" value="graphics"
                                                   {{ request('category') == 'graphics' ? 'checked' : '' }}
                                                   onchange="submitForm()"
                                                   class="text-purple-600 focus:ring-purple-300">
                                            <span class="ml-2 text-sm text-gray-700">Tarjetas Gráficas</span>
                                        </label>
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="category" value="memory"
                                                   {{ request('category') == 'memory' ? 'checked' : '' }}
                                                   onchange="submitForm()"
                                                   class="text-purple-600 focus:ring-purple-300">
                                            <span class="ml-2 text-sm text-gray-700">Memoria RAM</span>
                                        </label>
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="category" value="storage"
                                                   {{ request('category') == 'storage' ? 'checked' : '' }}
                                                   onchange="submitForm()"
                                                   class="text-purple-600 focus:ring-purple-300">
                                            <span class="ml-2 text-sm text-gray-700">Almacenamiento</span>
                                        </label>
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="category" value="peripherals"
                                                   {{ request('category') == 'peripherals' ? 'checked' : '' }}
                                                   onchange="submitForm()"
                                                   class="text-purple-600 focus:ring-purple-300">
                                            <span class="ml-2 text-sm text-gray-700">Periféricos</span>
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <!-- Price Range Filter -->
                            <div class="mb-8">
                                <h4 class="font-medium text-gray-900 mb-4">Rango de Precio</h4>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm text-gray-600 mb-1">Precio Mínimo</label>
                                        <input type="number" name="min_price" value="{{ request('min_price') }}"
                                               placeholder="0" min="0" max="2000" step="10"
                                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-purple-300 focus:border-purple-300">
                                    </div>
                                    <div>
                                        <label class="block text-sm text-gray-600 mb-1">Precio Máximo</label>
                                        <input type="number" name="max_price" value="{{ request('max_price') }}"
                                               placeholder="2000" min="0" step="10"
                                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-purple-300 focus:border-purple-300">
                                    </div>
                                </div>
                            </div>

                            <!-- Sort By -->
                            <div class="mb-8">
                                <h4 class="font-medium text-gray-900 mb-4">Ordenar por</h4>
                                <select class="selectShort" onchange="onChangeSortOptions(event)" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-purple-300 focus:border-purple-300">
                                    <option value="latest" {{ request('sort_by', 'latest') == 'latest' ? 'selected' : '' }}>Más Recientes</option>
                                    <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Precio: Menor a Mayor</option>
                                    <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Precio: Mayor a Menor</option>
                                    <option value="name_asc" {{ request('sort_by') == 'name_asc' ? 'selected' : '' }}>Nombre A-Z</option>
                                    <option value="name_desc" {{ request('sort_by') == 'name_desc' ? 'selected' : '' }}>Nombre Z-A</option>
                                    <option value="featured" {{ request('sort_by') == 'featured' ? 'selected' : '' }}>Destacados</option>
                                </select>
                            </div>

                            <!-- Filter Actions -->
                            <div class="space-y-3">
                                <button type="submit" class="w-full px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors font-medium">
                                    Aplicar Filtros
                                </button>
                                <a href="{{ route('products') }}" class="block w-full px-4 py-2 text-purple-600 border border-purple-600 rounded-lg hover:bg-purple-50 transition-colors text-center">
                                    Limpiar Filtros
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Products Grid -->
                <div class="lg:w-3/4">
                    <!-- Sort and View Options -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 bg-white rounded-lg shadow p-4">
                        <div class="mb-4 sm:mb-0">
                            <p class="text-gray-600">
                                Mostrando <span class="font-medium">{{ $products->count() }}</span> de <span class="font-medium">{{ $products->total() }}</span> productos
                                @if(request('search'))
                                    para "<span class="font-medium text-purple-600">{{ request('search') }}</span>"
                                @endif
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <!-- Sort Options -->
                            <select class="selectShort" onchange="onChangeSortOptions(event)" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-purple-300 focus:border-purple-300">
                                <option value="latest" {{ request('sort_by', 'latest') == 'latest' ? 'selected' : '' }}>Más Recientes</option>
                                    <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Precio: Menor a Mayor</option>
                                    <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Precio: Mayor a Menor</option>
                                    <option value="name_asc" {{ request('sort_by') == 'name_asc' ? 'selected' : '' }}>Nombre A-Z</option>
                                    <option value="name_desc" {{ request('sort_by') == 'name_desc' ? 'selected' : '' }}>Nombre Z-A</option>
                                    <option value="featured" {{ request('sort_by') == 'featured' ? 'selected' : '' }}>Destacados</option>
                            </select>

                            <!-- View Options -->
                            <div class="flex border border-gray-300 rounded-lg overflow-hidden">
                                <button class="px-3 py-2 bg-purple-600 text-white hover:bg-purple-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                    </svg>
                                </button>
                                <button class="px-3 py-2 bg-white text-gray-700 hover:bg-gray-50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6" id="productsGrid">
                        @forelse($products as $product)
                        <!-- Product Card -->
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 product-card"
                             data-category="{{ strtolower($product->category->name ?? '') }}"
                             data-price="{{ $product->price }}"
                             data-name="{{ strtolower($product->name) }}">

                            <!-- Product Image -->
                            <div class="relative h-48 bg-gradient-to-br from-purple-100 to-blue-100 flex items-center justify-center overflow-hidden">
                                @if($product->image_url)
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-16 h-16 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                    </svg>
                                @endif

                                <!-- Quick Actions -->
                                <div class="absolute top-3 right-3 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-2 bg-white rounded-full shadow-lg hover:bg-gray-50 transition-colors">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                    </button>
                                    <button class="p-2 bg-white rounded-full shadow-lg hover:bg-gray-50 transition-colors">
                                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>
                                </div>

                                <!-- Badge -->
                                @if($product->featured)
                                <div class="absolute top-3 left-3">
                                    <span class="bg-purple-600 text-white text-xs font-bold px-2 py-1 rounded-full">Destacado</span>
                                </div>
                                @endif
                            </div>

                            <!-- Product Info -->
                            <div class="p-4">
                                <!-- Category -->
                                <p class="text-sm text-purple-600 font-medium mb-1">{{ $product->category->name ?? 'Tecnología' }}</p>

                                <!-- Product Name -->
                                <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">{{ $product->name }}</h3>

                                <!-- Rating -->
                                <div class="flex items-center mb-3">
                                    <div class="flex text-yellow-400">
                                        @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= $product->average_rating ? 'fill-current' : 'text-gray-300 fill-current' }}" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                        </svg>
                                        @endfor
                                    </div>
                                    <span class="ml-2 text-sm text-gray-600">({{ $product->average_rating }})</span>
                                </div>

                                <!-- Price -->
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <span class="text-2xl font-bold text-purple-600">{{ $product->formatted_price }}</span>
                                        @if($product->original_price && $product->original_price > $product->price)
                                        <span class="text-sm text-gray-500 line-through ml-2">${{ number_format($product->original_price, 2) }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="flex gap-2">
                                    <button class="flex-1 px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors font-medium">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5H17M10 19a1 1 0 100 2 1 1 0 000-2zM20 19a1 1 0 100 2 1 1 0 000-2z"></path>
                                        </svg>
                                        Agregar
                                    </button>
                                    <button class="px-3 py-2 border border-purple-600 text-purple-600 rounded-lg hover:bg-purple-50 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @empty
                        <!-- No Products Found -->
                        <div class="col-span-full text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No se encontraron productos</h3>
                            <p class="mt-1 text-sm text-gray-500">Intenta cambiar los filtros o términos de búsqueda</p>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12 flex justify-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript for Form Submission -->
    <script>
        function submitForm() {
            const form = document.getElementById('filterForm');
            form.submit();
        }

        function onChangeSortOptions(e) {
            const sortValue = e.target.value;
            const form = document.getElementById('filterForm');
            let sortInput = form.querySelector('input[name="sort_by"]');
            if (!sortInput) {
                sortInput = document.createElement('input');
                sortInput.type = 'hidden';
                sortInput.name = 'sort_by';
                form.appendChild(sortInput);
            }
            sortInput.value = sortValue;
            form.submit();
        }
    </script>
</x-layouts.main>
