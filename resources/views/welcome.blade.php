@extends('layouts.public')

@section('content')

<!-- Section Hero -->
<section id="accueil" class="relative bg-blue-900 overflow-hidden min-h-[600px] flex items-center">
    <!-- Background image with opacity mask -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=1920&auto=format&fit=crop" class="w-full h-full object-cover opacity-20 filter blur-[1px]" alt="ONG ADH Action">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900 via-blue-900/90 to-transparent"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-white space-y-8">
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-600/30 border border-emerald-500/30 text-emerald-400 font-bold text-xs uppercase tracking-wider">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
            Ensemble pour un avenir meilleur
        </div>
        
        <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight max-w-3xl leading-tight">
            Agir pour le <span class="text-yellow-400">Développement</span> et la Dignité Humaine
        </h1>
        
        <p class="text-lg sm:text-xl text-gray-300 max-w-2xl leading-relaxed">
            L'ONG ADH (Action pour le Développement Humain) met en œuvre des solutions durables pour l'accès à l'eau potable, l'éducation, la préservation de la biodiversité et le soutien social en Afrique rurale.
        </p>

        <div class="flex flex-wrap gap-4 pt-4">
            <a href="#projets" class="px-8 py-3.5 rounded-full text-base font-bold bg-emerald-600 hover:bg-emerald-700 transition shadow-lg text-white">
                Découvrir nos projets
            </a>
            <a href="#faire-un-don-modal" onclick="openDonationModal()" class="px-8 py-3.5 rounded-full text-base font-bold bg-yellow-500 hover:bg-yellow-600 transition shadow-lg text-white flex items-center">
                <i class="fas fa-heart text-red-500 mr-2"></i> Faire un don
            </a>
        </div>
    </div>
</section>

<!-- Section Statistiques -->
<section class="relative z-20 -mt-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 sm:p-10 grid grid-cols-2 md:grid-cols-4 gap-8">
        @forelse($stats as $stat)
        <div class="text-center space-y-2 group">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center border-b-2 border-emerald-400 group-hover:scale-110 transition duration-300">
                <i class="{{ $stat->icon }} text-2xl"></i>
            </div>
            <p class="text-3xl sm:text-4xl font-extrabold text-blue-700 tracking-tight">{{ $stat->value }}</p>
            <p class="text-sm font-semibold text-gray-600 uppercase tracking-wider">{{ $stat->title }}</p>
        </div>
        @empty
        <div class="col-span-4 text-center text-gray-400">Aucune statistique disponible.</div>
        @endforelse
    </div>
</section>

<!-- Section Missions -->
<section id="missions" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-emerald-600 font-bold uppercase tracking-wider text-sm">Ce que nous faisons</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-blue-700 mt-2">Nos Domaines d'Intervention</h2>
            <p class="text-gray-600 mt-4">Nous menons des actions concrètes sur le terrain pour répondre aux besoins fondamentaux des populations marginalisées.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Mission 1 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center mb-6">
                    <i class="fas fa-hand-holding-water text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Eau Potable & Hygiène</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Installation de forages équipés de pompes solaires et formation de comités villageois de gestion pour pérenniser l'accès à l'eau potable.
                </p>
            </div>

            <!-- Mission 2 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center mb-6">
                    <i class="fas fa-seedling text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Environnement & Reboisement</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Sensibilisation aux enjeux écologiques, organisation de campagnes de reboisement massif et introduction de l'agroforesterie.
                </p>
            </div>

            <!-- Mission 3 -->
            <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-yellow-100 text-yellow-600 flex items-center justify-center mb-6">
                    <i class="fas fa-graduation-cap text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Éducation Rurale</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Soutien matériel aux écoles, rénovation de bâtiments scolaires, installation de bibliothèques et initiation au numérique.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section Projets -->
<section id="projets" class="py-20 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-emerald-600 font-bold uppercase tracking-wider text-sm">Actions concrètes</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-blue-700 mt-2">Nos Projets de Développement</h2>
            <p class="text-gray-600 mt-4">Découvrez les projets en cours de réalisation ou achevés par nos équipes sur le terrain.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($projects as $project)
            <div class="bg-gray-50 rounded-2xl border border-gray-200 overflow-hidden flex flex-col hover:shadow-md transition">
                <div class="relative h-48 bg-gray-200">
                    @if($project->image)
                        <img src="{{ $project->image }}" class="w-full h-full object-cover" alt="{{ $project->title }}">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-300 text-gray-500">
                            <i class="fas fa-image text-3xl"></i>
                        </div>
                    @endif
                    
                    <!-- Location Badge -->
                    @if($project->location)
                        <span class="absolute top-3 left-3 bg-blue-700 text-white text-xs font-bold px-2.5 py-1 rounded-full shadow-sm">
                            <i class="fas fa-map-marker-alt mr-1"></i> {{ $project->location }}
                        </span>
                    @endif

                    <!-- Status Badge -->
                    <span class="absolute bottom-3 right-3 text-xs font-bold px-2.5 py-1 rounded-full shadow-sm
                        @if($project->status === 'completed') bg-emerald-600 text-white
                        @elseif($project->status === 'ongoing') bg-blue-600 text-white
                        @else bg-yellow-500 text-white @endif">
                        @if($project->status === 'completed') Terminé
                        @elseif($project->status === 'ongoing') En cours
                        @else Planifié @endif
                    </span>
                </div>
                
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug">{{ $project->title }}</h3>
                        <p class="text-gray-600 text-xs leading-relaxed mb-4 line-clamp-3">{{ $project->description }}</p>
                    </div>
                    
                    <div class="border-t border-gray-200 pt-4 mt-auto flex items-center justify-between">
                        <span class="text-xs text-gray-500">Budget engagé :</span>
                        <span class="text-sm font-extrabold text-blue-700">{{ $project->budget ?? 'En cours d\'évaluation' }}</span>
                    </div>
                    
                    <div class="mt-4">
                        <a href="{{ route('projects.show', $project->slug) }}" class="w-full inline-flex justify-center items-center py-2 text-xs font-bold border border-blue-700 text-blue-700 hover:bg-blue-50 transition rounded-full">
                            Voir les détails <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-4 text-center py-12 text-gray-400">Aucun projet à afficher actuellement.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- Call-To-Action Réseaux Sociaux & Don (demandé par l'utilisateur) -->
<section class="py-16 bg-gradient-to-br from-blue-700 to-emerald-700 text-white text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-yellow-400 opacity-5 mix-blend-overlay"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-6">
        <h2 class="text-3xl sm:text-4xl font-extrabold">Entrer en contact direct & Soutenir nos actions</h2>
        <p class="text-lg text-blue-100 max-w-2xl mx-auto">
            Nous répondons très rapidement à toutes vos questions sur les réseaux sociaux. Rejoignez la communauté ADH ou faites un don sécurisé.
        </p>
        
        <div class="flex flex-wrap justify-center gap-4 pt-4">
            @if(!empty($settings['whatsapp_number']))
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number']) }}" target="_blank" class="inline-flex items-center px-6 py-3 rounded-full text-base font-bold bg-[#25D366] hover:bg-[#20ba59] transition shadow-lg text-white">
                    <i class="fab fa-whatsapp text-xl mr-2"></i> WhatsApp
                </a>
            @endif
            @if(!empty($settings['facebook_url']))
                <a href="{{ $settings['facebook_url'] }}" target="_blank" class="inline-flex items-center px-6 py-3 rounded-full text-base font-bold bg-[#1877F2] hover:bg-[#166fe5] transition shadow-lg text-white">
                    <i class="fab fa-facebook text-xl mr-2"></i> Facebook
                </a>
            @endif
            @if(!empty($settings['linkedin_url']))
                <a href="{{ $settings['linkedin_url'] }}" target="_blank" class="inline-flex items-center px-6 py-3 rounded-full text-base font-bold bg-[#0077B5] hover:bg-[#006396] transition shadow-lg text-white">
                    <i class="fab fa-linkedin text-xl mr-2"></i> LinkedIn
                </a>
            @endif
            <a href="#faire-un-don-modal" onclick="openDonationModal()" class="inline-flex items-center px-6 py-3 rounded-full text-base font-bold bg-yellow-500 hover:bg-yellow-600 transition shadow-lg text-white">
                <i class="fas fa-heart text-red-500 text-lg mr-2 animate-pulse"></i> Faire un don
            </a>
        </div>
    </div>
</section>

<!-- Section Actualités -->
<section id="actualites" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-emerald-600 font-bold uppercase tracking-wider text-sm">Le blog d'actualités</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-blue-700 mt-2">Dernières Actualités & Articles</h2>
            <p class="text-gray-600 mt-4">Suivez la vie de notre association, les retours de missions et nos communiqués officiels.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($articles as $article)
            <article class="bg-white rounded-2xl border border-gray-200 overflow-hidden flex flex-col hover:shadow-md transition">
                <div class="h-52 bg-gray-200 relative">
                    @if($article->image)
                        <img src="{{ $article->image }}" class="w-full h-full object-cover" alt="{{ $article->title }}">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-300 text-gray-500">
                            <i class="fas fa-image text-3xl"></i>
                        </div>
                    @endif
                    <span class="absolute bottom-3 left-3 bg-yellow-500 text-white font-bold text-xs px-2.5 py-1 rounded shadow-sm">
                        {{ $article->published_at ? $article->published_at->format('d M Y') : 'Non publié' }}
                    </span>
                </div>
                
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3 leading-snug group-hover:text-blue-700">
                            <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                        </h3>
                        <p class="text-gray-600 text-xs leading-relaxed line-clamp-3 mb-6">
                            {{ strip_tags($article->content) }}
                        </p>
                    </div>
                    
                    <div>
                        <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center text-sm font-bold text-blue-700 hover:text-emerald-600 transition">
                            Lire l'article <i class="fas fa-chevron-right ml-1.5 text-xs"></i>
                        </a>
                    </div>
                </div>
            </article>
            @empty
            <div class="col-span-3 text-center py-12 text-gray-400">Aucun article publié pour le moment.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- Section Contact -->
<section id="contact" class="py-20 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Info -->
            <div class="space-y-8">
                <div>
                    <span class="text-emerald-600 font-bold uppercase tracking-wider text-sm">Discutons</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-blue-700 mt-2">Nous Contacter</h2>
                    <p class="text-gray-600 mt-4 leading-relaxed">
                        Pour toute demande de partenariat, proposition de bénévolat, ou pour toute question relative à nos projets et nos comptes de donateurs, écrivez-nous ou rendez-nous visite.
                    </p>
                </div>

                <div class="space-y-4">
                    @if(!empty($settings['contact_address']))
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center shrink-0">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 text-sm">Notre Adresse</p>
                            <p class="text-gray-600 text-sm">{{ $settings['contact_address'] }}</p>
                        </div>
                    </div>
                    @endif

                    @if(!empty($settings['contact_phone']))
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 text-sm">Téléphone</p>
                            <p class="text-gray-600 text-sm">
                                <a href="tel:{{ str_replace(' ', '', $settings['contact_phone']) }}" class="hover:text-blue-700">{{ $settings['contact_phone'] }}</a>
                            </p>
                        </div>
                    </div>
                    @endif

                    @if(!empty($settings['contact_email']))
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-yellow-50 text-yellow-600 flex items-center justify-center shrink-0">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 text-sm">Adresse Email</p>
                            <p class="text-gray-600 text-sm">
                                <a href="mailto:{{ $settings['contact_email'] }}" class="hover:text-blue-700">{{ $settings['contact_email'] }}</a>
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-gray-50 rounded-3xl border border-gray-200 p-8 sm:p-10">
                <form action="#" method="POST" class="space-y-6" onsubmit="event.preventDefault(); alert('Message envoyé ! Nous vous répondrons rapidement.');">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-xs font-bold uppercase text-gray-500 mb-2">Votre Nom</label>
                            <input type="text" id="name" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" placeholder="Ex: Koffi Mensah">
                        </div>
                        <div>
                            <label for="email" class="block text-xs font-bold uppercase text-gray-500 mb-2">Votre Email</label>
                            <input type="email" id="email" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" placeholder="Ex: koffi@gmail.com">
                        </div>
                    </div>
                    <div>
                        <label for="subject" class="block text-xs font-bold uppercase text-gray-500 mb-2">Sujet</label>
                        <input type="text" id="subject" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" placeholder="Ex: Devenir volontaire / Demande de partenariat">
                    </div>
                    <div>
                        <label for="message" class="block text-xs font-bold uppercase text-gray-500 mb-2">Message</label>
                        <textarea id="message" rows="4" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white" placeholder="Détaillez votre message ici..."></textarea>
                    </div>
                    <button type="submit" class="w-full py-3 rounded-xl bg-blue-700 hover:bg-blue-800 text-white font-bold transition shadow-md">
                        Envoyer le message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
