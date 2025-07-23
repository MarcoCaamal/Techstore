@props(['title' => 'Autenticación'])

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Tech Store</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom CSS for auth pages -->
    <style>
        .auth-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .floating-shape {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
        }
    </style>
</head>
<body class="min-h-screen auth-gradient flex items-center justify-center p-4">
    <!-- Floating Shapes Background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="floating-shape absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full"></div>
        <div class="floating-shape absolute top-40 right-20 w-16 h-16 bg-white/5 rounded-full" style="animation-delay: 2s;"></div>
        <div class="floating-shape absolute bottom-20 left-1/4 w-24 h-24 bg-white/10 rounded-full" style="animation-delay: 4s;"></div>
        <div class="floating-shape absolute bottom-40 right-1/4 w-12 h-12 bg-white/5 rounded-full" style="animation-delay: 1s;"></div>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-block">
                <h1 class="text-4xl font-bold text-white mb-2">TechStore</h1>
                <p class="text-purple-200">Tu tienda de tecnología</p>
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            {{ $slot }}
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-white hover:text-purple-200 transition-colors inline-flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Volver al inicio
            </a>
        </div>
    </div>

    @stack('scripts')
</body>
</html>