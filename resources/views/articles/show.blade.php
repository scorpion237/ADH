@extends('layouts.public')

@section('seo_title', $article->seo_title ?? $article->title . ' - ONG ADH')
@section('seo_description', $article->seo_description ?? Str::limit(strip_tags($article->content), 150))
@section('seo_image', $article->image)

@section('content')

<!-- Header Detail -->
<section class="bg-blue-900 py-16 text-white relative">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-950 via-blue-900 to-emerald-900 opacity-90 z-0"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-4">
        <a href="{{ route('home') }}#actualites" class="inline-flex items-center gap-1.5 text-xs font-bold text-yellow-400 uppercase tracking-widest hover:text-white transition">
            <i class="fas fa-arrow-left"></i> Retour aux actualités
        </a>
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight">{{ $article->title }}</h1>
        <p class="text-sm text-gray-300">
            Publié le {{ $article->published_at ? $article->published_at->format('d F Y \à H:i') : $article->created_at->format('d/m/Y') }}
        </p>
    </div>
</section>

<!-- Content Block -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                @if($article->image)
                    <div class="rounded-3xl overflow-hidden shadow-md">
                        <img src="{{ $article->image }}" class="w-full max-h-[450px] object-cover" alt="{{ $article->title }}">
                    </div>
                @endif

                <!-- Rich text editor content -->
                <div class="prose max-w-none text-gray-700 leading-relaxed space-y-4">
                    {!! $article->content !!}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Share panel -->
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200">
                    <h3 class="font-bold text-gray-900 text-lg mb-4">Partager cet article</h3>
                    <div class="flex gap-3">
                        <!-- WhatsApp share -->
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' ' . request()->url()) }}" target="_blank" class="w-10 h-10 rounded-full bg-[#25D366] text-white flex items-center justify-center hover:opacity-90 transition">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <!-- Facebook share -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 rounded-full bg-[#1877F2] text-white flex items-center justify-center hover:opacity-90 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <!-- Twitter share -->
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 rounded-full bg-[#1DA1F2] text-white flex items-center justify-center hover:opacity-90 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <!-- LinkedIn share -->
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 rounded-full bg-[#0077B5] text-white flex items-center justify-center hover:opacity-90 transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <!-- Recent Articles widget -->
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200">
                    <h3 class="font-bold text-gray-900 text-lg mb-4">Autres Actualités</h3>
                    <div class="space-y-4">
                        @forelse($recentArticles as $recent)
                            <div class="flex gap-4">
                                @if($recent->image)
                                    <img src="{{ $recent->image }}" class="w-16 h-16 rounded-lg object-cover shrink-0" alt="{{ $recent->title }}">
                                @else
                                    <div class="w-16 h-16 rounded-lg bg-gray-300 flex items-center justify-center shrink-0 text-gray-500">
                                        <i class="fas fa-image"></i>
                                    </div>
                                @endif
                                <div class="space-y-1">
                                    <h4 class="text-sm font-bold text-gray-900 line-clamp-2 hover:text-blue-700">
                                        <a href="{{ route('articles.show', $recent->slug) }}">{{ $recent->title }}</a>
                                    </h4>
                                    <p class="text-xs text-gray-500">{{ $recent->published_at ? $recent->published_at->format('d M Y') : $recent->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">Aucun autre article disponible.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
