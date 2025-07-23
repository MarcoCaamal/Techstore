@props(['title' => 'Dashboard'])

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} - TechStore Admin</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        .sidebar-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #6b7280 #374151;
        }
        .sidebar-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar-scrollbar::-webkit-scrollbar-track {
            background: #374151;
        }
        .sidebar-scrollbar::-webkit-scrollbar-thumb {
            background-color: #6b7280;
            border-radius: 3px;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar overlay for mobile -->
        <div x-cloak x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 flex lg:hidden">
            <div x-show="sidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="relative flex flex-col flex-1 w-64 pt-5 pb-4 bg-gray-800">
                <!-- Close button -->
                <div class="absolute top-0 right-0 p-1 -mr-12">
                    <button @click="sidebarOpen = false" class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <i class="fas fa-times text-white"></i>
                    </button>
                </div>
                @include('components.dashboard.sidebar')
            </div>
            <div class="flex-shrink-0 w-14" @click="sidebarOpen = false"></div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64 bg-gray-800">
                <div class="flex flex-col flex-grow pt-5 pb-4 overflow-y-auto sidebar-scrollbar">
                    @include('components.dashboard.sidebar')
                </div>
            </div>
        </div>

        <!-- Main content area -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top navigation -->
            <div class="relative z-10 flex flex-shrink-0 h-16 bg-white shadow">
                <!-- Sidebar toggle button -->
                <button @click="sidebarOpen = true" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="flex justify-between flex-1 px-4">
                    <div class="flex flex-1">
                        <!-- Search bar -->
                        <div class="flex items-center w-full max-w-lg lg:max-w-xs">
                            <label for="search" class="sr-only">Buscar</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <input id="search" name="search" class="block w-full py-2 pl-10 pr-3 leading-5 placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-purple-500 focus:border-purple-500" placeholder="Buscar..." type="search">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center ml-4 lg:ml-6">
                        <!-- Notifications -->
                        <button class="p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            <i class="fas fa-bell"></i>
                            <span class="absolute inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">3</span>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="relative ml-3" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open" class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                    <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=8b5cf6&color=fff" alt="{{ auth()->user()->name }}">
                                    <span class="ml-2 text-sm font-medium text-gray-700">{{ auth()->user()->name }}</span>
                                    <i class="ml-1 fas fa-chevron-down text-gray-400"></i>
                                </button>
                            </div>

                            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-48 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                                <div class="py-1">
                                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-user mr-3"></i>
                                        Mi Perfil
                                    </a>
                                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-cog mr-3"></i>
                                        Configuración
                                    </a>
                                    <a href="{{ route('home') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-store mr-3"></i>
                                        Ver Tienda
                                    </a>
                                    <div class="border-t border-gray-100"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-left text-red-600 hover:bg-red-50">
                                            <i class="fas fa-sign-out-alt mr-3"></i>
                                            Cerrar Sesión
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page content -->
            <main class="flex-1 relative overflow-y-auto focus:outline-none">
                {{ $slot }}
            </main>
        </div>
    </div>    @stack('scripts')
</body>
</html>
