<x-layouts.auth :title="'Registro'">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Crear Cuenta</h2>
        <p class="text-gray-600">Únete a TechStore y descubre ofertas increíbles</p>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
            <ul class="text-sm text-red-600 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                Nombre
            </label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent form-input transition-all"
                   placeholder="Tu nombre">
        </div>

        <!-- Lastname -->
        <div>
            <label for="lastname" class="block text-sm font-semibold text-gray-700 mb-2">
                Apellido
            </label>
            <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent form-input transition-all"
                   placeholder="Tu apellido">
        </div>

        <!-- Username -->
        <div>
            <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">
                Nombre de Usuario
            </label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent form-input transition-all"
                   placeholder="username">
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                Email
            </label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent form-input transition-all"
                   placeholder="tu@email.com">
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                Contraseña
            </label>
            <input type="password" id="password" name="password" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent form-input transition-all"
                   placeholder="Mínimo 8 caracteres">
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                Confirmar Contraseña
            </label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent form-input transition-all"
                   placeholder="Repite tu contraseña">
        </div>

        <!-- Terms -->
        <div class="flex items-center">
            <input type="checkbox" id="terms" name="terms" required
                   class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
            <label for="terms" class="ml-2 text-sm text-gray-600">
                Acepto los <a href="#" class="text-purple-600 hover:text-purple-800">términos y condiciones</a>
            </label>
        </div>

        <!-- Submit Button -->
        <button type="submit"
                class="w-full bg-purple-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 transition-all duration-200">
            Crear Cuenta
        </button>
    </form>

    <!-- Login Link -->
    <div class="mt-6 text-center">
        <p class="text-gray-600">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-800 font-semibold">
                Inicia sesión
            </a>
        </p>
    </div>
</x-layouts.auth>
