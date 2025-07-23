{{-- filepath: d:\Uni\WebApps\techstore\techstore-backend\resources\views\components\home\support.blade.php --}}
<x-layouts.main :title="'Soporte Técnico - Tech Store'">
    <!-- Custom CSS for support page -->
    <style>
        .support-card {
            transition: all 0.3s ease;
        }

        .support-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .faq-item {
            transition: all 0.3s ease;
        }

        .faq-toggle {
            transition: transform 0.3s ease;
        }

        .faq-toggle.active {
            transform: rotate(180deg);
        }

        .chat-bubble {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-purple-900 via-purple-800 to-blue-900 text-white py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center">
                <div class="mb-8">
                    <div class="inline-block p-4 bg-white/10 rounded-full mb-6">
                        <svg class="w-16 h-16 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                </div>

                <h1 class="text-6xl font-bold mb-6">Centro de Soporte</h1>
                <p class="text-xl text-purple-100 mb-8 max-w-3xl mx-auto">
                    Estamos aquí para ayudarte. Encuentra respuestas rápidas o contáctanos directamente.
                </p>

                <!-- Quick Search -->
                <div class="max-w-2xl mx-auto">
                    <div class="relative">
                        <input type="text"
                               placeholder="¿En qué podemos ayudarte? Busca aquí..."
                               class="w-full px-6 py-4 pl-12 text-gray-900 bg-white rounded-lg shadow-lg focus:ring-4 focus:ring-purple-300 focus:border-transparent outline-none">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Help Options -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">¿Cómo podemos ayudarte?</h2>
                <p class="text-xl text-gray-600">Selecciona la opción que mejor se adapte a tu necesidad</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Live Chat -->
                <div class="support-card bg-white rounded-2xl p-8 text-center shadow-lg cursor-pointer border-2 border-transparent hover:border-purple-500">
                    <div class="chat-bubble mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center mx-auto">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Chat en Vivo</h3>
                    <p class="text-gray-600 mb-4">Habla con nuestros expertos ahora mismo</p>
                    <div class="flex items-center justify-center text-green-600 font-semibold">
                        <div class="w-3 h-3 bg-green-400 rounded-full mr-2 animate-pulse"></div>
                        En línea
                    </div>
                    <button class="mt-4 w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700 transition-colors">
                        Iniciar Chat
                    </button>
                </div>

                <!-- Email Support -->
                <div class="support-card bg-white rounded-2xl p-8 text-center shadow-lg cursor-pointer border-2 border-transparent hover:border-blue-500">
                    <div class="mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center mx-auto">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Email Soporte</h3>
                    <p class="text-gray-600 mb-4">Envíanos tu consulta detallada</p>
                    <p class="text-blue-600 font-semibold">Respuesta en 24h</p>
                    <button class="mt-4 w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition-colors">
                        Enviar Email
                    </button>
                </div>

                <!-- Phone Support -->
                <div class="support-card bg-white rounded-2xl p-8 text-center shadow-lg cursor-pointer border-2 border-transparent hover:border-purple-500">
                    <div class="mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center mx-auto">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Teléfono</h3>
                    <p class="text-gray-600 mb-4">Llámanos para soporte inmediato</p>
                    <p class="text-purple-600 font-semibold">+54 11 1234-5678</p>
                    <button class="mt-4 w-full bg-purple-600 text-white font-bold py-3 rounded-lg hover:bg-purple-700 transition-colors">
                        Llamar Ahora
                    </button>
                </div>

                <!-- Knowledge Base -->
                <div class="support-card bg-white rounded-2xl p-8 text-center shadow-lg cursor-pointer border-2 border-transparent hover:border-orange-500">
                    <div class="mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center mx-auto">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Base de Conocimiento</h3>
                    <p class="text-gray-600 mb-4">Tutoriales y guías detalladas</p>
                    <p class="text-orange-600 font-semibold">200+ Artículos</p>
                    <button class="mt-4 w-full bg-orange-600 text-white font-bold py-3 rounded-lg hover:bg-orange-700 transition-colors">
                        Explorar Guías
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Categories -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Categorías Populares</h2>
                <p class="text-xl text-gray-600">Encuentra ayuda específica para tu área de interés</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Technical Support -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Soporte Técnico</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Problemas de instalación, compatibilidad y configuración</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>• Instalación de componentes</li>
                        <li>• Problemas de arranque</li>
                        <li>• Compatibilidad de hardware</li>
                        <li>• Actualización de drivers</li>
                    </ul>
                </div>

                <!-- Order & Shipping -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Pedidos y Envíos</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Información sobre tu pedido y opciones de envío</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>• Estado del pedido</li>
                        <li>• Tiempos de entrega</li>
                        <li>• Cambios en el pedido</li>
                        <li>• Seguimiento de envío</li>
                    </ul>
                </div>

                <!-- Returns & Warranty -->
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Devoluciones y Garantía</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Políticas de devolución y servicio de garantía</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li>• Proceso de devolución</li>
                        <li>• Garantía de productos</li>
                        <li>• RMA (Return Authorization)</li>
                        <li>• Reembolsos</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Preguntas Frecuentes</h2>
                <p class="text-xl text-gray-600">Respuestas rápidas a las consultas más comunes</p>
            </div>

            <div class="space-y-4">
                @php
                $faqs = [
                    [
                        'question' => '¿Cuánto tiempo tardan en llegar los envíos?',
                        'answer' => 'Los envíos estándar tardan entre 2-5 días hábiles. Los envíos express llegan en 24-48 horas. El tiempo puede variar según tu ubicación y la disponibilidad del producto.'
                    ],
                    [
                        'question' => '¿Qué garantía tienen los productos?',
                        'answer' => 'Todos nuestros productos tienen garantía del fabricante. Los componentes de hardware tienen entre 1-3 años de garantía. También ofrecemos garantía extendida opcional.'
                    ],
                    [
                        'question' => '¿Puedo cambiar o cancelar mi pedido?',
                        'answer' => 'Puedes modificar o cancelar tu pedido mientras esté en estado "Pendiente". Una vez que se procesa para envío, ya no es posible hacer cambios.'
                    ],
                    [
                        'question' => '¿Ofrecen servicio de armado de PC?',
                        'answer' => 'Sí, ofrecemos servicio de armado profesional. Nuestros técnicos pueden ensamblar tu PC con los componentes que compres. Contacta con nosotros para más detalles.'
                    ],
                    [
                        'question' => '¿Qué métodos de pago aceptan?',
                        'answer' => 'Aceptamos tarjetas de crédito y débito, transferencias bancarias, MercadoPago, y efectivo en puntos de pago autorizados.'
                    ],
                    [
                        'question' => '¿Hacen envíos a todo el país?',
                        'answer' => 'Sí, realizamos envíos a toda Argentina. Los costos y tiempos varían según la ubicación. Consulta las opciones disponibles en el checkout.'
                    ]
                ];
                @endphp

                @foreach($faqs as $index => $faq)
                <div class="faq-item bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none hover:bg-gray-50 transition-colors"
                            onclick="toggleFAQ({{ $index }})">
                        <span class="font-semibold text-gray-900">{{ $faq['question'] }}</span>
                        <svg class="w-5 h-5 text-gray-500 faq-toggle transition-transform" id="toggle-{{ $index }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer px-6 pb-4 hidden" id="answer-{{ $index }}">
                        <p class="text-gray-600 leading-relaxed">{{ $faq['answer'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">¿Necesitas más ayuda?</h2>
                <p class="text-xl text-gray-600">Envíanos tu consulta y te responderemos a la brevedad</p>
            </div>

            <div class="bg-gradient-to-br from-purple-50 to-blue-50 rounded-2xl p-8">
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nombre</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" placeholder="Tu nombre">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" placeholder="tu@email.com">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Categoría del Problema</label>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                            <option>Selecciona una categoría</option>
                            <option>Soporte Técnico</option>
                            <option>Pedidos y Envíos</option>
                            <option>Devoluciones y Garantía</option>
                            <option>Facturación</option>
                            <option>Otro</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Prioridad</label>
                        <div class="flex space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="priority" value="low" class="text-purple-600 focus:ring-purple-500">
                                <span class="ml-2 text-gray-700">Baja</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="priority" value="medium" class="text-purple-600 focus:ring-purple-500" checked>
                                <span class="ml-2 text-gray-700">Media</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="priority" value="high" class="text-purple-600 focus:ring-purple-500">
                                <span class="ml-2 text-gray-700">Alta</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Mensaje</label>
                        <textarea rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" placeholder="Describe tu problema o consulta con el mayor detalle posible..."></textarea>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="submit" class="flex-1 bg-purple-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-purple-700 transition-colors">
                            Enviar Consulta
                        </button>
                        <button type="button" class="flex-1 border-2 border-purple-600 text-purple-600 font-bold py-3 px-6 rounded-lg hover:bg-purple-50 transition-colors">
                            Adjuntar Archivos
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Contact Information -->
    <section class="py-16 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Información de Contacto</h2>
                <p class="text-xl text-gray-300">Múltiples formas de ponerte en contacto con nosotros</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Phone -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Teléfono</h3>
                    <p class="text-purple-300 mb-2">+54 11 1234-5678</p>
                    <p class="text-gray-400 text-sm">Lun - Vie: 9:00 - 18:00</p>
                </div>

                <!-- Email -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Email</h3>
                    <p class="text-blue-300 mb-2">soporte@techstore.com</p>
                    <p class="text-gray-400 text-sm">Respuesta en 24h</p>
                </div>

                <!-- Address -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Dirección</h3>
                    <p class="text-green-300 mb-2">Av. Corrientes 1234</p>
                    <p class="text-gray-400 text-sm">Buenos Aires, Argentina</p>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript for FAQ Toggle -->
    <script>
        function toggleFAQ(index) {
            const answer = document.getElementById(`answer-${index}`);
            const toggle = document.getElementById(`toggle-${index}`);

            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                toggle.classList.add('active');
            } else {
                answer.classList.add('hidden');
                toggle.classList.remove('active');
            }
        }
    </script>
</x-layouts.main>
