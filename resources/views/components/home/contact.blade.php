<x-layouts.main :title="'Contacto'" :showHero="false">
    <x-slot name="title">Contacto</x-slot>

    <!-- Contact Section -->
    <section class="bg-purple-900 text-white py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center">Contáctanos</h2>
            <p class="text-lg md:text-xl text-gray-400 mb-12 text-center">
                Si tienes alguna pregunta o necesitas ayuda, no dudes en contactarnos.
            </p>
            <div class="max-w-2xl mx-auto">
                <form action="/contact" method="POST" class="bg-white rounded-lg shadow-lg p-8 space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-2">Nombre</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Correo Electrónico</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div>
                        <label for="message" class="block text-gray-700 font-medium mb-2">Mensaje</label>
                        <textarea id="message" name="message" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"></textarea>
                    </div>
                    <button type="submit" class="w-full px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition-colors duration-200">Enviar</button>
                </form>
            </div>
        </div>
    </section>
</x-layouts.main>
