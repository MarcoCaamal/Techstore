<x-layouts.dashboard :title="'Dashboard'">
    <!-- Page header -->
    <div class="bg-white shadow">
        <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
            <div class="py-6 md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <div class="flex items-center">
                        <div>
                            <div class="flex items-center">
                                <h1 class="ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                    Dashboard
                                </h1>
                            </div>
                            <dl class="mt-6 flex flex-col sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap">
                                <dt class="sr-only">Rol</dt>
                                <dd class="flex items-center text-sm text-gray-500 font-medium capitalize sm:mr-6">
                                    <i class="fas fa-user-shield mr-1.5 text-gray-400"></i>
                                    Administrador
                                </dd>
                                <dt class="sr-only">Último acceso</dt>
                                <dd class="mt-3 flex items-center text-sm text-gray-500 font-medium sm:mr-6 sm:mt-0">
                                    <i class="fas fa-clock mr-1.5 text-gray-400"></i>
                                    Último acceso: {{ now()->format('d/m/Y H:i') }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex space-x-3 md:mt-0 md:ml-4">
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        <i class="fas fa-download mr-2"></i>
                        Exportar
                    </button>
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        <i class="fas fa-plus mr-2"></i>
                        Nuevo Producto
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard content -->
    <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8 py-8">
        <!-- Stats overview -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Total Users -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-purple-500 rounded-md flex items-center justify-center">
                                <i class="fas fa-users text-white"></i>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Usuarios</dt>
                                <dd class="text-lg font-medium text-gray-900">1,248</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-5 py-3">
                    <div class="text-sm">
                        <span class="text-green-600 font-medium">+12%</span>
                        <span class="text-gray-500">desde el mes pasado</span>
                    </div>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-blue-500 rounded-md flex items-center justify-center">
                                <i class="fas fa-shopping-cart text-white"></i>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Pedidos</dt>
                                <dd class="text-lg font-medium text-gray-900">542</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-5 py-3">
                    <div class="text-sm">
                        <span class="text-green-600 font-medium">+8%</span>
                        <span class="text-gray-500">desde la semana pasada</span>
                    </div>
                </div>
            </div>

            <!-- Revenue -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-green-500 rounded-md flex items-center justify-center">
                                <i class="fas fa-dollar-sign text-white"></i>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Ingresos</dt>
                                <dd class="text-lg font-medium text-gray-900">$89,240</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-5 py-3">
                    <div class="text-sm">
                        <span class="text-green-600 font-medium">+23%</span>
                        <span class="text-gray-500">desde el mes pasado</span>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-orange-500 rounded-md flex items-center justify-center">
                                <i class="fas fa-box text-white"></i>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Productos</dt>
                                <dd class="text-lg font-medium text-gray-900">156</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-5 py-3">
                    <div class="text-sm">
                        <span class="text-red-600 font-medium">-2%</span>
                        <span class="text-gray-500">desde la semana pasada</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts section -->
        <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Sales Chart -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Ventas del Mes</h3>
                    <div class="mt-6">
                        <canvas id="salesChart" class="w-full h-64"></canvas>
                    </div>
                </div>
            </div>

            <!-- Top Products -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Productos Más Vendidos</h3>
                    <div class="mt-6">
                        <canvas id="productsChart" class="w-full h-64"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent activity -->
        <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Recent Orders -->
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Pedidos Recientes</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Últimos pedidos realizados</p>
                </div>
                <ul class="divide-y divide-gray-200">
                    <li class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                                        <i class="fas fa-shopping-bag text-purple-600"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">#ORD-001248</div>
                                    <div class="text-sm text-gray-500">Juan Pérez</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm font-medium text-gray-900">$329.99</div>
                                <div class="text-sm text-gray-500">hace 2 min</div>
                            </div>
                        </div>
                    </li>
                    <li class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                        <i class="fas fa-shopping-bag text-blue-600"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">#ORD-001247</div>
                                    <div class="text-sm text-gray-500">María García</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm font-medium text-gray-900">$1,299.99</div>
                                <div class="text-sm text-gray-500">hace 15 min</div>
                            </div>
                        </div>
                    </li>
                    <li class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                        <i class="fas fa-shopping-bag text-green-600"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">#ORD-001246</div>
                                    <div class="text-sm text-gray-500">Carlos López</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm font-medium text-gray-900">$899.99</div>
                                <div class="text-sm text-gray-500">hace 32 min</div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="bg-gray-50 px-4 py-4 sm:px-6">
                    <div class="text-sm">
                        <a href="#" class="font-medium text-purple-600 hover:text-purple-500">Ver todos los pedidos →</a>
                    </div>
                </div>
            </div>

            <!-- Low Stock Products -->
            <div class="bg-white shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Stock Bajo</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Productos que necesitan reposición</p>
                </div>
                <ul class="divide-y divide-gray-200">
                    <li class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded object-cover" src="https://via.placeholder.com/40x40/6366f1/ffffff?text=CPU" alt="Procesador">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">AMD Ryzen 7 7700X</div>
                                    <div class="text-sm text-gray-500">Procesadores</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm font-medium text-red-600">3 unidades</div>
                                <div class="text-sm text-gray-500">Stock mínimo: 10</div>
                            </div>
                        </div>
                    </li>
                    <li class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded object-cover" src="https://via.placeholder.com/40x40/059669/ffffff?text=GPU" alt="Tarjeta gráfica">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">NVIDIA RTX 4070 Ti</div>
                                    <div class="text-sm text-gray-500">Tarjetas Gráficas</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm font-medium text-red-600">1 unidad</div>
                                <div class="text-sm text-gray-500">Stock mínimo: 5</div>
                            </div>
                        </div>
                    </li>
                    <li class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded object-cover" src="https://via.placeholder.com/40x40/dc2626/ffffff?text=RAM" alt="Memoria RAM">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Corsair Vengeance 32GB</div>
                                    <div class="text-sm text-gray-500">Memoria RAM</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm font-medium text-red-600">2 unidades</div>
                                <div class="text-sm text-gray-500">Stock mínimo: 8</div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="bg-gray-50 px-4 py-4 sm:px-6">
                    <div class="text-sm">
                        <a href="#" class="font-medium text-purple-600 hover:text-purple-500">Ver inventario completo →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Sales Chart
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Ventas ($)',
                    data: [12000, 15000, 18000, 22000, 25000, 28000, 32000],
                    borderColor: 'rgb(147, 51, 234)',
                    backgroundColor: 'rgba(147, 51, 234, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });

        // Products Chart
        const productsCtx = document.getElementById('productsChart').getContext('2d');
        new Chart(productsCtx, {
            type: 'doughnut',
            data: {
                labels: ['Procesadores', 'Tarjetas Gráficas', 'Memoria RAM', 'Almacenamiento', 'Otros'],
                datasets: [{
                    data: [30, 25, 20, 15, 10],
                    backgroundColor: [
                        'rgb(147, 51, 234)',
                        'rgb(59, 130, 246)',
                        'rgb(16, 185, 129)',
                        'rgb(245, 158, 11)',
                        'rgb(239, 68, 68)'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
    @endpush
</x-layouts.dashboard>
