<x-layouts.main :title="'Tech Store - Premium Gaming & Technology'" :showHero="true">
    <!-- Custom CSS for consistent card heights -->
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .swiper-slide {
            height: auto;
            display: flex;
            flex-direction: column;
        }
        /* Ensure all grid items have equal height */
        .auto-rows-fr {
            grid-auto-rows: 1fr;
        }
        /* Ensure minimum height for featured products */
        .featured-product-card {
            min-height: 420px;
        }
    </style>

    <!-- Top Components Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-left mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Top Components</h2>
                <p class="text-xl text-gray-600">Los componentes más vendidos y mejor valorados</p>
            </div>

            <!-- Swiper Container -->
            <div class="swiper topComponentsSwiper">
                <div class="swiper-wrapper">
                    @forelse($topComponents as $product)
                    <!-- Product Card -->
                    <div class="swiper-slide h-auto">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 h-full flex flex-col">
                            <!-- Product Image -->
                            <div class="h-64 bg-gradient-to-br from-purple-100 to-blue-100 flex items-center justify-center flex-shrink-0">
                                @if($product->image_url)
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-24 h-24 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                    </svg>
                                @endif
                            </div>
                            <!-- Product Info -->
                            <div class="p-6 flex-1 flex flex-col">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $product->name }}</h3>
                                <!-- Category and Price -->
                                <div class="flex items-center justify-between mb-4 mt-auto">
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <span class="text-sm text-gray-600">{{ $product->average_rating }}</span>
                                    </div>
                                    <span class="text-xl font-bold text-purple-600">{{ $product->formatted_price }}</span>
                                </div>
                                <!-- Buttons -->
                                <div class="space-y-2 mt-auto">
                                    <button class="w-full px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors font-medium">
                                        Agregar al carrito
                                    </button>
                                    <button class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                                        Comprar ahora
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <!-- Fallback when no products available -->
                    <div class="swiper-slide h-auto">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden h-full flex flex-col">
                            <div class="h-64 bg-gray-100 flex items-center justify-center flex-shrink-0">
                                <p class="text-gray-500">No hay productos disponibles</p>
                            </div>
                        </div>
                    </div>
                    @endforelse

                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-left mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Featured Products</h2>
                <p class="text-xl text-gray-600">Discover our latest gaming and tech equipment</p>
            </div>

            <!-- Featured Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 auto-rows-fr">
                @forelse($featuredProducts as $product)
                <!-- Product {{ $loop->iteration }} -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col featured-product-card">
                    <!-- Product Image - Fixed Height -->
                    <div class="h-48 bg-gradient-to-br from-purple-100 to-blue-100 flex items-center justify-center">
                        @if($product->image_url)
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-20 h-20 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                            </svg>
                        @endif
                    </div>

                    <!-- Product Content -->
                    <div class="p-6 flex flex-col flex-1">
                        <!-- Product Title - Fixed Space -->
                        <h3 class="text-xl font-semibold text-gray-900 mb-2 h-14 flex items-center">{{ $product->name }}</h3>

                        <!-- Product Description - Flexible Space -->
                        <p class="text-gray-600 mb-4 flex-1 line-clamp-2">{{ $product->description ?? 'Producto de alta calidad para tus necesidades tecnológicas' }}</p>

                        <!-- Price and Button - Fixed at Bottom -->
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-purple-600">{{ $product->formatted_price }}</span>
                            <button class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors whitespace-nowrap">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <!-- Fallback when no featured products available -->
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-500 text-lg">No hay productos destacados disponibles</p>
                </div>
                @endforelse
            </div>

            <!-- Call to Action to Products Page -->
            <div class="text-center mt-16">
                <a href="{{ route('products') }}" class="inline-flex items-center px-8 py-4 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition-colors shadow-lg">
                    Ver todos los productos
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Initialize Swiper -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.topComponentsSwiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
            });
        });
    </script>
</x-layouts.main>
