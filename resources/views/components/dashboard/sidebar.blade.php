<!-- Sidebar Logo -->
<div class="flex items-center flex-shrink-0 px-4">
    <h1 class="text-2xl font-bold text-white">
        <i class="fas fa-cogs mr-2 text-purple-400"></i>
        TechStore Admin
    </h1>
</div>

<!-- Navigation -->
<nav class="mt-5 flex-1 px-2 space-y-1">
    <!-- Dashboard -->
    <a href="{{ route('dashboard.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard.index') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
        <i class="fas fa-home mr-3 flex-shrink-0 h-6 w-6"></i>
        Dashboard
    </a>

    <!-- Users Management -->
    <div x-data="{ open: {{ request()->routeIs('admin.users.*') ? 'true' : 'false' }} }">
        <button @click="open = !open" class="group w-full flex items-center px-2 py-2 text-left text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none">
            <i class="fas fa-users mr-3 flex-shrink-0 h-6 w-6"></i>
            <span class="flex-1">Usuarios</span>
            <i class="fas fa-chevron-down ml-3 transform transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
        </button>
        <div x-show="open" x-transition class="mt-1 space-y-1">
            <a href="#" class="group flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md text-gray-400 hover:text-white hover:bg-gray-600">
                Lista de Usuarios
            </a>
            <a href="#" class="group flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md text-gray-400 hover:text-white hover:bg-gray-600">
                Crear Usuario
            </a>
            <a href="#" class="group flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md text-gray-400 hover:text-white hover:bg-gray-600">
                Roles y Permisos
            </a>
        </div>
    </div>

    <!-- Products Management -->
    <div x-data="{ open: {{ request()->routeIs('admin.products.*') ? 'true' : 'false' }} }">
        <button @click="open = !open" class="group w-full flex items-center px-2 py-2 text-left text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none">
            <i class="fas fa-box mr-3 flex-shrink-0 h-6 w-6"></i>
            <span class="flex-1">Productos</span>
            <i class="fas fa-chevron-down ml-3 transform transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
        </button>
        <div x-show="open" x-transition class="mt-1 space-y-1">
            <a href="{{ route('admin.products.index') }}" class="group flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md text-gray-400 hover:text-white hover:bg-gray-600">
                Lista de Productos
            </a>
            <a href="{{ route('admin.products.create') }}" class="group flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md text-gray-400 hover:text-white hover:bg-gray-600">
                Crear Producto
            </a>
            <a href="#" class="group flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md text-gray-400 hover:text-white hover:bg-gray-600">
                Categorías
            </a>
            <a href="#" class="group flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md text-gray-400 hover:text-white hover:bg-gray-600">
                Inventario
            </a>
        </div>
    </div>

    <!-- Orders Management -->
    <div x-data="{ open: {{ request()->routeIs('admin.orders.*') ? 'true' : 'false' }} }">
        <button @click="open = !open" class="group w-full flex items-center px-2 py-2 text-left text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none">
            <i class="fas fa-shopping-cart mr-3 flex-shrink-0 h-6 w-6"></i>
            <span class="flex-1">Pedidos</span>
            <i class="fas fa-chevron-down ml-3 transform transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
        </button>
        <div x-show="open" x-transition class="mt-1 space-y-1">
            <a href="#" class="group flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md text-gray-400 hover:text-white hover:bg-gray-600">
                Todos los Pedidos
            </a>
            <a href="#" class="group flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md text-gray-400 hover:text-white hover:bg-gray-600">
                Pedidos Pendientes
            </a>
            <a href="#" class="group flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md text-gray-400 hover:text-white hover:bg-gray-600">
                Pedidos Completados
            </a>
        </div>
    </div>

    <!-- Analytics -->
    <a href="#" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
        <i class="fas fa-chart-bar mr-3 flex-shrink-0 h-6 w-6"></i>
        Analytics
    </a>

    <!-- Reports -->
    <a href="#" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
        <i class="fas fa-file-alt mr-3 flex-shrink-0 h-6 w-6"></i>
        Reportes
    </a>

    <!-- Settings -->
    <div x-data="{ open: false }">
        <button @click="open = !open" class="group w-full flex items-center px-2 py-2 text-left text-sm font-medium rounded-md text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none">
            <i class="fas fa-cog mr-3 flex-shrink-0 h-6 w-6"></i>
            <span class="flex-1">Configuración</span>
            <i class="fas fa-chevron-down ml-3 transform transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
        </button>
        <div x-show="open" x-transition class="mt-1 space-y-1">
            <a href="#" class="group flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md text-gray-400 hover:text-white hover:bg-gray-600">
                General
            </a>
            <a href="#" class="group flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md text-gray-400 hover:text-white hover:bg-gray-600">
                Pagos
            </a>
            <a href="#" class="group flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md text-gray-400 hover:text-white hover:bg-gray-600">
                Envíos
            </a>
        </div>
    </div>
</nav>

<!-- User info at bottom -->
<div class="flex-shrink-0 flex bg-gray-700 p-4">
    <div class="flex items-center">
        <div>
            <img class="inline-block h-9 w-9 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=8b5cf6&color=fff" alt="{{ auth()->user()->name }}">
        </div>
        <div class="ml-3">
            <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
            <p class="text-xs font-medium text-gray-300 group-hover:text-gray-200">
                @if(auth()->user()->hasRole('admin'))
                    Administrador
                @else
                    Usuario
                @endif
            </p>
        </div>
    </div>
</div>
