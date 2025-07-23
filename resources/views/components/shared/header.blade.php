@props(['showHero' => false])

@if($showHero)
    <!-- Header with Hero Section -->
    <header class="relative h-screen bg-cover bg-center bg-no-repeat overflow-hidden" style="background-image: url('{{ asset('images/hero.png') }}');">
    <!-- Dark overlay like your example -->
    <div class="absolute inset-0 bg-black/70"></div>

    <!-- Navigation -->
    <nav class="relative z-50 px-6 py-4 lg:px-8">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <h1 class="text-5xl font-bold text-white" style="font-size: 48px;">TechStore</h1>
            </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-white hover:text-purple-300 transition-colors duration-200 font-medium">Inicio</a>
                    <a href="/products" class="text-white hover:text-purple-300 transition-colors duration-200 font-medium">Productos</a>
                    <a href="/offers" class="text-white hover:text-purple-300 transition-colors duration-200 font-medium">Ofertas</a>
                    <a href="/support" class="text-white hover:text-purple-300 transition-colors duration-200 font-medium">Soporte</a>
                    <a href="/contact" class="text-white hover:text-purple-300 transition-colors duration-200 font-medium">Contacto</a>

                    <!-- Shopping Cart Icon -->
                    <a href="/cart" class="text-white hover:text-purple-300 transition-colors duration-200 p-2">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                    </a>

                    <!-- Auth Section -->
                    @auth
                        <!-- User Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center text-white hover:text-purple-300 transition-colors duration-200 p-2">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                                <span class="ml-1 text-sm">{{ auth()->user()->name }}</span>
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="{{ route('dashboard.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50">Dashboard</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50">Mi Perfil</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50">Mis Pedidos</a>
                                <div class="border-t border-gray-100"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                        Cerrar Sesión
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Login/Register Links -->
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('login') }}" class="text-white hover:text-purple-300 transition-colors duration-200 font-medium">
                                Iniciar Sesión
                            </a>
                            <a href="{{ route('register') }}" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors duration-200 font-medium">
                                Registrarse
                            </a>
                        </div>
                    @endauth
                </div>            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" class="text-white hover:text-purple-300 focus:outline-none focus:text-purple-300 transition-colors duration-200">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Content -->
    <div class="relative z-40 flex items-center justify-center h-full px-6">
        <div class="text-center max-w-4xl mx-auto">
            <!-- Main Heading -->
            <div class="mb-8">
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                    Todo para tu PC en un solo lugar
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 font-light mb-8 leading-relaxed">
                    Armá, actualizá o encontrá los mejores componentes para potenciar tu equipo.
                </p>
            </div>

            <!-- CTA Button -->
            <div class="flex justify-center items-center">
                <a href="/products" class="group relative px-8 py-4 bg-gradient-to-r from-purple-600 to-blue-600 text-white font-semibold rounded-lg overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-purple-500/25">
                    <span class="relative z-10">Ver productos</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-blue-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-40">
        <div class="animate-bounce">
            <svg class="w-6 h-6 text-white opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </div>
@else
    <!-- Simple Navigation Header -->
    <header class="bg-gray-900 shadow-lg">
        <nav class="relative z-50 px-6 py-4 lg:px-8">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="text-3xl font-bold text-white">TechStore</a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-white hover:text-purple-300 transition-colors duration-200 font-medium">Inicio</a>
                    <a href="/products" class="text-white hover:text-purple-300 transition-colors duration-200 font-medium">Productos</a>
                    <a href="/offers" class="text-white hover:text-purple-300 transition-colors duration-200 font-medium">Ofertas</a>
                    <a href="/support" class="text-white hover:text-purple-300 transition-colors duration-200 font-medium">Soporte</a>
                    <a href="/contact" class="text-white hover:text-purple-300 transition-colors duration-200 font-medium">Contacto</a>

                    <!-- Shopping Cart Icon -->
                    <a onclick="toggleCartModal()" class="text-white hover:text-purple-300 transition-colors duration-200 p-2">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                    </a>

                    <!-- Auth Section -->
                    @auth
                        <!-- User Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center text-white hover:text-purple-300 transition-colors duration-200 p-2">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                                <span class="ml-1 text-sm">{{ auth()->user()->name }}</span>
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="{{ route('dashboard.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50">Dashboard</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50">Mi Perfil</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50">Mis Pedidos</a>
                                <div class="border-t border-gray-100"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                        Cerrar Sesión
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Login/Register Links -->
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('login') }}" class="text-white hover:text-purple-300 transition-colors duration-200 font-medium">
                                Iniciar Sesión
                            </a>
                            <a href="{{ route('register') }}" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors duration-200 font-medium">
                                Registrarse
                            </a>
                        </div>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="text-white hover:text-purple-300 focus:outline-none focus:text-purple-300 transition-colors duration-200">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </nav>
    </header>
@endif
</header>

@push('modals')
    <!-- Shopping Cart Modal -->
    <div id="cartModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-8 relative">
            <!-- Close Button -->
            <button onclick="toggleCartModal()" class="absolute top-4 right-4 text-gray-500 hover:text-purple-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <h2 class="text-2xl font-bold mb-6 text-purple-700">Tu Carrito</h2>
            <!-- Cart Items Example -->
            <div class="space-y-4 mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-semibold">AMD Ryzen 7 7700X</p>
                        <p class="text-sm text-gray-500">Cantidad: 1</p>
                    </div>
                    <span class="font-bold text-purple-600">$329.00</span>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-semibold">NVIDIA RTX 4070 Ti</p>
                        <p class="text-sm text-gray-500">Cantidad: 2</p>
                    </div>
                    <span class="font-bold text-purple-600">$1598.00</span>
                </div>
            </div>
            <!-- Total -->
            <div class="flex items-center justify-between border-t pt-4 mb-6">
                <span class="font-bold text-lg">Total</span>
                <span class="font-bold text-purple-700 text-xl">$1927.00</span>
            </div>
            <!-- Actions -->
            <div class="flex gap-4">
                <button class="flex-1 bg-purple-600 text-white py-3 rounded-lg font-bold hover:bg-purple-700 transition-colors">Comprar Ahora</button>
                <button onclick="toggleCartModal()" class="flex-1 border border-purple-600 text-purple-600 py-3 rounded-lg font-bold hover:bg-purple-50 transition-colors">Seguir Comprando</button>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>

        // Cart and User icons functionality can be added here
        function toggleCartModal() {
            const modal = document.getElementById('cartModal');
            modal.classList.toggle('hidden');
        }
    </script>
@endpush
