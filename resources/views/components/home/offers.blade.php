{{-- filepath: d:\Uni\WebApps\techstore\techstore-backend\resources\views\components\home\offers.blade.php --}}
<x-layouts.main :title="'Ofertas Especiales - Tech Store'">
    <!-- Custom CSS for offers page -->
    <style>
        .offer-badge {
            background: linear-gradient(45deg, #ef4444, #dc2626);
            animation: pulse 2s infinite;
        }

        .countdown-timer {
            background: linear-gradient(135deg, #1e293b, #0f172a);
        }

        .flash-sale {
            background: linear-gradient(45deg, #fbbf24, #f59e0b);
            animation: flash 1.5s infinite alternate;
        }

        @keyframes flash {
            0% { opacity: 0.8; }
            100% { opacity: 1; }
        }

        .discount-card:hover {
            transform: translateY(-8px) scale(1.02);
        }

        .price-slash {
            position: relative;
        }

        .price-slash::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background: #ef4444;
            transform: rotate(-15deg);
        }
    </style>

    <!-- Hero Section with Flash Sale Banner -->
    <section class="bg-gradient-to-br from-red-600 via-red-700 to-red-800 text-white py-20 relative overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-10 w-20 h-20 bg-yellow-400 rounded-full opacity-20 animate-bounce"></div>
            <div class="absolute top-40 right-20 w-16 h-16 bg-white rounded-full opacity-10 animate-pulse"></div>
            <div class="absolute bottom-20 left-1/3 w-24 h-24 bg-yellow-300 rounded-full opacity-15 animate-bounce" style="animation-delay: 1s;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <!-- Flash Sale Badge -->
                <div class="inline-block mb-6">
                    <span class="flash-sale text-black font-black text-lg px-6 py-3 rounded-full uppercase tracking-wider">
                        ⚡ FLASH SALE ⚡
                    </span>
                </div>

                <h1 class="text-6xl font-black mb-6 tracking-tight">
                    OFERTAS ÉPICAS
                </h1>
                <p class="text-2xl text-red-100 mb-8 font-light">
                    Hasta <span class="text-yellow-300 font-bold text-4xl">70% OFF</span> en tecnología premium
                </p>

                <!-- Countdown Timer -->
                <div class="countdown-timer max-w-md mx-auto rounded-2xl p-6 mb-8">
                    <p class="text-yellow-300 font-semibold mb-3">⏰ Oferta termina en:</p>
                    <div class="flex justify-center space-x-4 text-center">
                        <div class="bg-white/10 rounded-lg p-3 min-w-[60px]">
                            <div class="text-2xl font-bold" id="days">23</div>
                            <div class="text-xs text-red-200">DÍAS</div>
                        </div>
                        <div class="bg-white/10 rounded-lg p-3 min-w-[60px]">
                            <div class="text-2xl font-bold" id="hours">14</div>
                            <div class="text-xs text-red-200">HORAS</div>
                        </div>
                        <div class="bg-white/10 rounded-lg p-3 min-w-[60px]">
                            <div class="text-2xl font-bold" id="minutes">35</div>
                            <div class="text-xs text-red-200">MIN</div>
                        </div>
                        <div class="bg-white/10 rounded-lg p-3 min-w-[60px]">
                            <div class="text-2xl font-bold" id="seconds">42</div>
                            <div class="text-xs text-red-200">SEG</div>
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <a href="#ofertas-destacadas" class="inline-block bg-yellow-400 text-black font-bold px-8 py-4 rounded-full text-lg hover:bg-yellow-300 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                    🛒 VER OFERTAS AHORA
                </a>
            </div>
        </div>
    </section>

    <!-- Categories with Special Offers -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Ofertas por Categoría</h2>
                <p class="text-xl text-gray-600">Descuentos increíbles en todas las categorías</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Gaming Category -->
                <div class="bg-gradient-to-br from-purple-600 to-purple-800 rounded-2xl p-6 text-white transform hover:scale-105 transition-all duration-300 cursor-pointer">
                    <div class="text-center">
                        <div class="mb-4">
                            <svg class="w-16 h-16 mx-auto text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Gaming</h3>
                        <p class="text-purple-200 mb-3">Tarjetas gráficas y gaming</p>
                        <div class="bg-yellow-400 text-black font-bold py-2 px-4 rounded-full">
                            Hasta 60% OFF
                        </div>
                    </div>
                </div>

                <!-- Processors Category -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl p-6 text-white transform hover:scale-105 transition-all duration-300 cursor-pointer">
                    <div class="text-center">
                        <div class="mb-4">
                            <svg class="w-16 h-16 mx-auto text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Procesadores</h3>
                        <p class="text-blue-200 mb-3">Intel & AMD CPUs</p>
                        <div class="bg-yellow-400 text-black font-bold py-2 px-4 rounded-full">
                            Hasta 45% OFF
                        </div>
                    </div>
                </div>

                <!-- Storage Category -->
                <div class="bg-gradient-to-br from-green-600 to-green-800 rounded-2xl p-6 text-white transform hover:scale-105 transition-all duration-300 cursor-pointer">
                    <div class="text-center">
                        <div class="mb-4">
                            <svg class="w-16 h-16 mx-auto text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Almacenamiento</h3>
                        <p class="text-green-200 mb-3">SSDs y HDDs</p>
                        <div class="bg-yellow-400 text-black font-bold py-2 px-4 rounded-full">
                            Hasta 50% OFF
                        </div>
                    </div>
                </div>

                <!-- Peripherals Category -->
                <div class="bg-gradient-to-br from-orange-600 to-orange-800 rounded-2xl p-6 text-white transform hover:scale-105 transition-all duration-300 cursor-pointer">
                    <div class="text-center">
                        <div class="mb-4">
                            <svg class="w-16 h-16 mx-auto text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Periféricos</h3>
                        <p class="text-orange-200 mb-3">Teclados, ratones, etc.</p>
                        <div class="bg-yellow-400 text-black font-bold py-2 px-4 rounded-full">
                            Hasta 40% OFF
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Offers Grid -->
    <section id="ofertas-destacadas" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold text-gray-900 mb-4">🔥 Ofertas Destacadas</h2>
                <p class="text-xl text-gray-600">Los mejores precios que no puedes dejar pasar</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Mega Deal Card -->
                <div class="discount-card bg-white rounded-2xl shadow-2xl overflow-hidden border-4 border-red-500 transform transition-all duration-300 hover:shadow-3xl relative">
                    <!-- Super Offer Badge -->
                    <div class="absolute top-4 left-4 z-20">
                        <span class="offer-badge text-white font-black text-xs px-3 py-1 rounded-full uppercase">
                            MEGA OFERTA
                        </span>
                    </div>

                    <!-- Discount Percentage -->
                    <div class="absolute top-4 right-4 z-20">
                        <div class="bg-yellow-400 text-black font-black text-2xl w-16 h-16 rounded-full flex items-center justify-center transform rotate-12">
                            -70%
                        </div>
                    </div>

                    <!-- Product Image -->
                    <div class="h-64 bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center relative overflow-hidden">
                        <svg class="w-24 h-24 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                        </svg>
                        <!-- Lightning effect -->
                        <div class="absolute inset-0 bg-gradient-to-br from-yellow-400/20 to-red-500/20"></div>
                    </div>

                    <div class="p-6">
                        <p class="text-sm text-red-600 font-bold mb-2">🎮 GAMING PREMIUM</p>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">NVIDIA GeForce RTX 4080</h3>

                        <!-- Rating -->
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                @endfor
                            </div>
                            <span class="ml-2 text-sm text-gray-600">(4.9)</span>
                        </div>

                        <!-- Prices -->
                        <div class="mb-6">
                            <div class="flex items-center space-x-3">
                                <span class="text-3xl font-black text-red-600">$899.99</span>
                                <span class="text-lg text-gray-500 price-slash">$2,999.99</span>
                            </div>
                            <p class="text-sm text-green-600 font-semibold">💰 Ahorras $2,100</p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            <button class="w-full bg-red-600 text-white font-bold py-3 rounded-lg hover:bg-red-700 transition-colors">
                                🛒 COMPRAR AHORA
                            </button>
                            <button class="w-full border-2 border-red-600 text-red-600 font-bold py-3 rounded-lg hover:bg-red-50 transition-colors">
                                ❤️ AGREGAR A FAVORITOS
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Regular Offer Cards -->
                @php
                $offers = [
                    [
                        'name' => 'AMD Ryzen 9 7900X',
                        'category' => '🚀 PROCESADOR',
                        'price' => '$449.99',
                        'oldPrice' => '$699.99',
                        'discount' => '-35%',
                        'savings' => '$250',
                        'rating' => '4.8',
                        'gradient' => 'from-blue-100 to-blue-200',
                        'icon' => 'text-blue-600'
                    ],
                    [
                        'name' => 'Samsung 980 PRO 2TB',
                        'category' => '💾 ALMACENAMIENTO',
                        'price' => '$159.99',
                        'oldPrice' => '$299.99',
                        'discount' => '-47%',
                        'savings' => '$140',
                        'rating' => '4.7',
                        'gradient' => 'from-green-100 to-green-200',
                        'icon' => 'text-green-600'
                    ],
                    [
                        'name' => 'Corsair DDR5 32GB Kit',
                        'category' => '🧠 MEMORIA RAM',
                        'price' => '$179.99',
                        'oldPrice' => '$349.99',
                        'discount' => '-49%',
                        'savings' => '$170',
                        'rating' => '4.6',
                        'gradient' => 'from-purple-100 to-purple-200',
                        'icon' => 'text-purple-600'
                    ],
                    [
                        'name' => 'ASUS ROG Monitor 27"',
                        'category' => '🖥️ MONITOR GAMING',
                        'price' => '$299.99',
                        'oldPrice' => '$549.99',
                        'discount' => '-45%',
                        'savings' => '$250',
                        'rating' => '4.9',
                        'gradient' => 'from-orange-100 to-orange-200',
                        'icon' => 'text-orange-600'
                    ]
                ];
                @endphp

                @foreach($offers as $offer)
                <div class="discount-card bg-white rounded-2xl shadow-xl overflow-hidden transform transition-all duration-300 hover:shadow-2xl relative">
                    <!-- Discount Badge -->
                    <div class="absolute top-4 right-4 z-20">
                        <div class="bg-red-500 text-white font-bold text-sm px-3 py-1 rounded-full">
                            {{ $offer['discount'] }}
                        </div>
                    </div>

                    <!-- Product Image -->
                    <div class="h-48 bg-gradient-to-br {{ $offer['gradient'] }} flex items-center justify-center">
                        <svg class="w-16 h-16 {{ $offer['icon'] }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                        </svg>
                    </div>

                    <div class="p-5">
                        <p class="text-sm font-bold mb-2 {{ $offer['icon'] }}">{{ $offer['category'] }}</p>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">{{ $offer['name'] }}</h3>

                        <!-- Rating -->
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                @for($i = 1; $i <= 5; $i++)
                                <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                @endfor
                            </div>
                            <span class="ml-2 text-xs text-gray-600">({{ $offer['rating'] }})</span>
                        </div>

                        <!-- Prices -->
                        <div class="mb-4">
                            <div class="flex items-center space-x-2">
                                <span class="text-2xl font-bold text-red-600">{{ $offer['price'] }}</span>
                                <span class="text-sm text-gray-500 price-slash">{{ $offer['oldPrice'] }}</span>
                            </div>
                            <p class="text-xs text-green-600 font-semibold">Ahorras {{ $offer['savings'] }}</p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-2">
                            <button class="w-full bg-red-600 text-white font-bold py-2 rounded-lg hover:bg-red-700 transition-colors text-sm">
                                COMPRAR AHORA
                            </button>
                            <button class="w-full border border-red-600 text-red-600 font-bold py-2 rounded-lg hover:bg-red-50 transition-colors text-sm">
                                AGREGAR AL CARRITO
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Limited Time Offers Banner -->
    <section class="py-16 bg-gradient-to-r from-yellow-400 via-red-500 to-pink-500">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-black text-white mb-6">⚡ OFERTAS POR TIEMPO LIMITADO ⚡</h2>
            <p class="text-xl text-white mb-8">¡Solo por hoy! No te pierdas estas increíbles ofertas</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                <div class="bg-white rounded-xl p-6 transform hover:scale-105 transition-all">
                    <h3 class="font-bold text-lg mb-2">🎮 Gaming Bundle</h3>
                    <p class="text-sm text-gray-600 mb-3">GPU + CPU + RAM</p>
                    <div class="text-2xl font-black text-red-600">$1,299</div>
                    <div class="text-sm text-gray-500">Antes: $2,199</div>
                </div>

                <div class="bg-white rounded-xl p-6 transform hover:scale-105 transition-all">
                    <h3 class="font-bold text-lg mb-2">💻 Office Setup</h3>
                    <p class="text-sm text-gray-600 mb-3">Monitor + Teclado + Mouse</p>
                    <div class="text-2xl font-black text-red-600">$399</div>
                    <div class="text-sm text-gray-500">Antes: $699</div>
                </div>

                <div class="bg-white rounded-xl p-6 transform hover:scale-105 transition-all">
                    <h3 class="font-bold text-lg mb-2">🔧 Builder Kit</h3>
                    <p class="text-sm text-gray-600 mb-3">Motherboard + PSU + Case</p>
                    <div class="text-2xl font-black text-red-600">$599</div>
                    <div class="text-sm text-gray-500">Antes: $899</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Signup for Exclusive Offers -->
    <section class="py-16 bg-gray-900">
        <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">🎯 No te pierdas ninguna oferta</h2>
            <p class="text-lg text-gray-300 mb-8">Suscríbete y recibe ofertas exclusivas directo en tu email</p>

            <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email" placeholder="Tu email aquí..." class="flex-1 px-4 py-3 rounded-lg border border-gray-600 bg-gray-800 text-white focus:outline-none focus:border-red-500">
                <button class="bg-red-600 text-white font-bold px-6 py-3 rounded-lg hover:bg-red-700 transition-colors">
                    SUSCRIBIRSE
                </button>
            </div>

            <p class="text-sm text-gray-400 mt-4">🎁 Bonus: Cupón de 10% OFF en tu primera compra</p>
        </div>
    </section>

    <!-- JavaScript for Countdown Timer -->
    <script>
        // Countdown Timer
        function updateCountdown() {
            const now = new Date().getTime();
            const saleEnd = new Date();
            saleEnd.setDate(saleEnd.getDate() + 7); // Sale ends in 7 days

            const distance = saleEnd - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").innerHTML = days.toString().padStart(2, '0');
            document.getElementById("hours").innerHTML = hours.toString().padStart(2, '0');
            document.getElementById("minutes").innerHTML = minutes.toString().padStart(2, '0');
            document.getElementById("seconds").innerHTML = seconds.toString().padStart(2, '0');

            if (distance < 0) {
                document.querySelector('.countdown-timer').innerHTML = '<p class="text-yellow-300 font-bold">¡OFERTA TERMINADA!</p>';
            }
        }

        // Update countdown every second
        setInterval(updateCountdown, 1000);
        updateCountdown(); // Initial call
    </script>
</x-layouts.main>
