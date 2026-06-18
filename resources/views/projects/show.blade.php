@extends('layouts.public')

@section('seo_title', $project->seo_title ?? $project->title . ' - Projet ONG ADH')
@section('seo_description', $project->seo_description ?? Str::limit(strip_tags($project->content), 150))
@section('seo_image', $project->image)

@section('content')

<!-- Header Detail -->
<section class="bg-blue-900 py-16 text-white relative">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-950 via-blue-900 to-emerald-900 opacity-90 z-0"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-4">
        <a href="{{ route('home') }}#projets" class="inline-flex items-center gap-1.5 text-xs font-bold text-yellow-400 uppercase tracking-widest hover:text-white transition">
            <i class="fas fa-arrow-left"></i> Retour aux projets
        </a>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight">{{ $project->title }}</h1>
        
        <div class="flex flex-wrap justify-center gap-4 text-sm pt-2">
            @if($project->location)
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-800 border border-blue-700">
                    <i class="fas fa-map-marker-alt text-yellow-400 mr-2"></i> {{ $project->location }}
                </span>
            @endif
            @if($project->budget)
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-800 border border-blue-700">
                    <i class="fas fa-wallet text-yellow-400 mr-2"></i> Budget : {{ $project->budget }}
                </span>
            @endif
            <span class="inline-flex items-center px-3 py-1 rounded-full text-white font-bold
                @if($project->status === 'completed') bg-emerald-600
                @elseif($project->status === 'ongoing') bg-blue-600
                @else bg-yellow-500 @endif">
                @if($project->status === 'completed') Terminé
                @elseif($project->status === 'ongoing') En cours
                @else Planifié @endif
            </span>
        </div>
    </div>
</section>

<!-- Content Block -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                @if($project->image)
                    <div class="rounded-3xl overflow-hidden shadow-md">
                        <img src="{{ $project->image }}" class="w-full max-h-[450px] object-cover" alt="{{ $project->title }}">
                    </div>
                @endif

                <!-- Rich text editor content -->
                <div class="prose max-w-none text-gray-700 leading-relaxed space-y-4">
                    {!! $project->content !!}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Donation Callbox -->
                <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 text-white rounded-3xl p-8 shadow-lg space-y-4">
                    <i class="fas fa-heart text-white text-3xl animate-pulse"></i>
                    <h3 class="font-extrabold text-xl">Soutenir ce Projet</h3>
                    <p class="text-sm leading-relaxed text-yellow-50">
                        Votre don est directement affecté à la réalisation du projet <strong>"{{ $project->title }}"</strong>.
                    </p>
                    <a href="#faire-un-don-modal" onclick="openDonationModal()" class="w-full inline-flex justify-center items-center py-3 bg-blue-700 hover:bg-blue-800 text-white font-bold rounded-xl transition shadow">
                        Faire un don
                    </a>
                </div>

                <!-- Recent Projects widget -->
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200">
                    <h3 class="font-bold text-gray-900 text-lg mb-4">Autres projets</h3>
                    <div class="space-y-4">
                        @forelse($recentProjects as $recent)
                            <div class="flex gap-4">
                                @if($recent->image)
                                    <img src="{{ $recent->image }}" class="w-16 h-16 rounded-lg object-cover shrink-0" alt="{{ $recent->title }}">
                                @else
                                    <div class="w-16 h-16 rounded-lg bg-gray-300 flex items-center justify-center shrink-0 text-gray-500">
                                        <i class="fas fa-tasks"></i>
                                    </div>
                                @endif
                                <div class="space-y-1">
                                    <h4 class="text-sm font-bold text-gray-900 line-clamp-2 hover:text-blue-700">
                                        <a href="{{ route('projects.show', $recent->slug) }}">{{ $recent->title }}</a>
                                    </h4>
                                    <p class="text-xs text-gray-500">{{ $recent->location ?? 'Non localisé' }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">Aucun autre projet disponible.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
