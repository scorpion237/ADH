<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- SEO Meta Tags -->
    <title>@yield('seo_title', $settings['site_title'] ?? 'ONG ADH | Action pour le Développement Humain')</title>
    <meta name="description" content="@yield('seo_description', $settings['site_description'] ?? 'L\'ONG ADH œuvre pour le développement durable, l\'éducation, la santé et l\'eau potable.')">

    <!-- Open Graph (Facebook / WhatsApp / LinkedIn) -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('seo_title', $settings['site_title'] ?? 'ONG ADH | Action pour le Développement Humain')">
    <meta property="og:description" content="@yield('seo_description', $settings['site_description'] ?? 'L\'ONG ADH œuvre pour le développement durable, l\'éducation, la santé et l\'eau potable.')">
    <meta property="og:image" content="@yield('seo_image', asset('images/logo_og.jpg'))">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:site_name" content="ONG ADH">
    <!-- Fonts - Plus Jakarta Sans (Friendly, highly readable for all ages) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:300,400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS and JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Analytics Tracker -->
    @if(!empty($settings['google_analytics']))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings['google_analytics'] }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $settings['google_analytics'] }}');
        </script>
    @endif

    <style>
        /* Fallback / override for fonts if needed */
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Top contact bar -->
    <div class="bg-blue-700 text-white py-2 px-4 text-xs sm:text-sm shadow-inner">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex flex-wrap justify-center gap-4">
                @if(!empty($settings['contact_phone']))
                    <a href="tel:{{ str_replace(' ', '', $settings['contact_phone']) }}" class="hover:text-yellow-400 transition duration-150">
                        <i class="fas fa-phone mr-1 text-yellow-400"></i> {{ $settings['contact_phone'] }}
                    </a>
                @endif
                @if(!empty($settings['contact_email']))
                    <a href="mailto:{{ $settings['contact_email'] }}" class="hover:text-yellow-400 transition duration-150">
                        <i class="fas fa-envelope mr-1 text-yellow-400"></i> {{ $settings['contact_email'] }}
                    </a>
                @endif
            </div>
            <div class="flex items-center gap-3">
                <span class="text-gray-300 hidden md:inline">Rejoignez-nous :</span>
                @if(!empty($settings['facebook_url']))
                    <a href="{{ $settings['facebook_url'] }}" target="_blank" class="hover:text-yellow-400 text-base transition duration-150" title="Facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                @endif
                @if(!empty($settings['twitter_url']))
                    <a href="{{ $settings['twitter_url'] }}" target="_blank" class="hover:text-yellow-400 text-base transition duration-150" title="Twitter / X">
                        <i class="fab fa-twitter"></i>
                    </a>
                @endif
                @if(!empty($settings['linkedin_url']))
                    <a href="{{ $settings['linkedin_url'] }}" target="_blank" class="hover:text-yellow-400 text-base transition duration-150" title="LinkedIn">
                        <i class="fab fa-linkedin"></i>
                    </a>
                @endif
                @if(!empty($settings['whatsapp_number']))
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number']) }}" target="_blank" class="hover:text-yellow-400 text-base transition duration-150" title="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Header Navigation -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <!-- Logo / Brand -->
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <div class="w-10 h-10 rounded-lg bg-emerald-600 flex items-center justify-center text-white font-extrabold text-xl shadow-md border-b-2 border-yellow-400">
                            A
                        </div>
                        <span class="text-2xl font-extrabold tracking-tight text-blue-700">ONG <span class="text-emerald-600">ADH</span></span>
                    </a>
                </div>

                <!-- Desktop Nav -->
                <nav class="hidden md:flex space-x-8 items-center">
                    <a href="{{ route('home') }}#accueil" class="text-gray-600 hover:text-blue-700 font-semibold transition py-2 border-b-2 border-transparent hover:border-blue-700">Accueil</a>
                    <a href="{{ route('home') }}#missions" class="text-gray-600 hover:text-blue-700 font-semibold transition py-2 border-b-2 border-transparent hover:border-blue-700">Nos Missions</a>
                    <a href="{{ route('home') }}#projets" class="text-gray-600 hover:text-blue-700 font-semibold transition py-2 border-b-2 border-transparent hover:border-blue-700">Projets</a>
                    <a href="{{ route('home') }}#actualites" class="text-gray-600 hover:text-blue-700 font-semibold transition py-2 border-b-2 border-transparent hover:border-blue-700">Actualités</a>
                    <a href="{{ route('home') }}#contact" class="text-gray-600 hover:text-blue-700 font-semibold transition py-2 border-b-2 border-transparent hover:border-blue-700">Contact</a>
                </nav>

                <div class="hidden md:flex items-center">
                    <a href="#faire-un-don-modal" onclick="openDonationModal()" class="inline-flex items-center px-5 py-2.5 border border-transparent text-sm font-bold rounded-full text-white bg-yellow-500 hover:bg-yellow-600 transition shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                        <i class="fas fa-heart mr-2 text-red-500 animate-pulse"></i> Faire un don
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button type="button" onclick="toggleMobileMenu()" class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-blue-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-700">
                        <span class="sr-only">Ouvrir le menu</span>
                        <i class="fas fa-bars text-xl" id="menu-icon-bars"></i>
                        <i class="fas fa-times text-xl hidden" id="menu-icon-times"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu, show/hide based on menu state. -->
        <div class="hidden md:hidden border-b border-gray-200 bg-white" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}#accueil" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-md text-base font-semibold text-gray-700 hover:text-blue-700 hover:bg-gray-50">Accueil</a>
                <a href="{{ route('home') }}#missions" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-md text-base font-semibold text-gray-700 hover:text-blue-700 hover:bg-gray-50">Nos Missions</a>
                <a href="{{ route('home') }}#projets" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-md text-base font-semibold text-gray-700 hover:text-blue-700 hover:bg-gray-50">Projets</a>
                <a href="{{ route('home') }}#actualites" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-md text-base font-semibold text-gray-700 hover:text-blue-700 hover:bg-gray-50">Actualités</a>
                <a href="{{ route('home') }}#contact" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-md text-base font-semibold text-gray-700 hover:text-blue-700 hover:bg-gray-50">Contact</a>
                <div class="mt-4 px-3">
                    <a href="#faire-un-don-modal" onclick="toggleMobileMenu(); openDonationModal();" class="w-full flex items-center justify-center px-4 py-2 border border-transparent text-base font-bold rounded-full text-white bg-yellow-500 hover:bg-yellow-600 transition shadow">
                        <i class="fas fa-heart mr-2 text-red-500 animate-pulse"></i> Faire un don
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Donation Modal -->
    <div id="donation-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeDonationModal()"></div>

            <!-- Modal Content -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-2xl px-4 pt-5 pb-4 text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6 border-t-8 border-yellow-400">
                <div>
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                        <i class="fas fa-heart text-red-500 text-xl animate-pulse"></i>
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-xl leading-6 font-extrabold text-blue-700" id="modal-title">Soutenir l'ONG ADH</h3>
                        <div class="mt-2 text-sm text-gray-500 space-y-3">
                            <p>Votre don nous permet de financer directement nos projets de forages d'eau potable, de reboisement et d'éducation rurale au Togo.</p>
                            <p class="font-semibold text-gray-700 bg-yellow-50 p-2 rounded border border-yellow-100">
                                Pour effectuer un don sécurisé par virement bancaire ou Mobile Money (TMoney/FLOOZ), contactez-nous directement :
                            </p>
                            <div class="text-left space-y-2 py-2">
                                @if(!empty($settings['contact_phone']))
                                    <div class="flex items-center gap-3 text-gray-700 font-bold">
                                        <span class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center"><i class="fas fa-phone"></i></span>
                                        <a href="tel:{{ str_replace(' ', '', $settings['contact_phone']) }}">{{ $settings['contact_phone'] }}</a>
                                    </div>
                                @endif
                                @if(!empty($settings['whatsapp_number']))
                                    <div class="flex items-center gap-3 text-gray-700 font-bold">
                                        <span class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center"><i class="fab fa-whatsapp"></i></span>
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number']) }}" target="_blank">Nous écrire par WhatsApp</a>
                                    </div>
                                @endif
                                @if(!empty($settings['contact_email']))
                                    <div class="flex items-center gap-3 text-gray-700 font-bold">
                                        <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center"><i class="fas fa-envelope"></i></span>
                                        <a href="mailto:{{ $settings['contact_email'] }}">{{ $settings['contact_email'] }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6">
                    <button type="button" onclick="closeDonationModal()" class="inline-flex justify-center w-full rounded-full border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-semibold text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm">
                        Fermer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 border-t-4 border-yellow-400 pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="space-y-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2 text-white">
                    <div class="w-8 h-8 rounded bg-emerald-600 flex items-center justify-center font-extrabold text-lg text-white">A</div>
                    <span class="text-xl font-bold tracking-tight">ONG <span class="text-emerald-500">ADH</span></span>
                </a>
                <p class="text-sm text-gray-400">Action pour le Développement Humain. Une organisation à but non lucratif œuvrant pour l'amélioration des conditions de vie en milieu rural.</p>
            </div>
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Liens Rapides</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}#accueil" class="hover:text-yellow-400 transition">Accueil</a></li>
                    <li><a href="{{ route('home') }}#missions" class="hover:text-yellow-400 transition">Nos Missions</a></li>
                    <li><a href="{{ route('home') }}#projets" class="hover:text-yellow-400 transition">Nos Projets</a></li>
                    <li><a href="{{ route('home') }}#actualites" class="hover:text-yellow-400 transition">Actualités</a></li>
                    <li><a href="{{ route('sitemap') }}" target="_blank" class="hover:text-yellow-400 transition">Sitemap XML</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Contactez-nous</h3>
                <ul class="space-y-2 text-sm">
                    @if(!empty($settings['contact_address']))
                        <li class="flex items-start gap-2">
                            <i class="fas fa-map-marker-alt text-yellow-400 mt-1"></i>
                            <span>{{ $settings['contact_address'] }}</span>
                        </li>
                    @endif
                    @if(!empty($settings['contact_phone']))
                        <li class="flex items-center gap-2">
                            <i class="fas fa-phone text-yellow-400"></i>
                            <a href="tel:{{ str_replace(' ', '', $settings['contact_phone']) }}" class="hover:text-white">{{ $settings['contact_phone'] }}</a>
                        </li>
                    @endif
                    @if(!empty($settings['contact_email']))
                        <li class="flex items-center gap-2">
                            <i class="fas fa-envelope text-yellow-400"></i>
                            <a href="mailto:{{ $settings['contact_email'] }}" class="hover:text-white">{{ $settings['contact_email'] }}</a>
                        </li>
                    @endif
                </ul>
            </div>
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Réseaux Sociaux</h3>
                <div class="flex gap-4">
                    @if(!empty($settings['facebook_url']))
                        <a href="{{ $settings['facebook_url'] }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-600 hover:text-white transition" title="Facebook">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>
                    @endif
                    @if(!empty($settings['twitter_url']))
                        <a href="{{ $settings['twitter_url'] }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-400 hover:text-white transition" title="Twitter / X">
                            <i class="fab fa-twitter text-lg"></i>
                        </a>
                    @endif
                    @if(!empty($settings['linkedin_url']))
                        <a href="{{ $settings['linkedin_url'] }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-700 hover:text-white transition" title="LinkedIn">
                            <i class="fab fa-linkedin-in text-lg"></i>
                        </a>
                    @endif
                    @if(!empty($settings['whatsapp_number']))
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number']) }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition" title="WhatsApp">
                            <i class="fab fa-whatsapp text-lg"></i>
                        </a>
                    @endif
                </div>
                <!-- Call-to-actions requested by User -->
                <div class="mt-4 p-3 rounded-lg bg-gray-800/50 border border-gray-700 text-xs">
                    <p class="font-bold text-yellow-400 mb-1">Besoin d'aide ou d'information ?</p>
                    <p>Ouvrez directement la discussion sur vos réseaux favoris pour nous poser des questions.</p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-t border-gray-800 mt-8 pt-6 text-center text-xs text-gray-500">
            <p>&copy; 2026 ONG ADH. Tous droits réservés. Action pour le Développement Humain.</p>
        </div>
    </footer>

    <!-- Script for mobile menu & modal -->
    <script>
        function toggleMobileMenu() {
            var menu = document.getElementById('mobile-menu');
            var bars = document.getElementById('menu-icon-bars');
            var times = document.getElementById('menu-icon-times');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                bars.classList.add('hidden');
                times.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
                bars.classList.remove('hidden');
                times.classList.add('hidden');
            }
        }

        function openDonationModal() {
            document.getElementById('donation-modal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeDonationModal() {
            document.getElementById('donation-modal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    </script>
</body>
</html>
