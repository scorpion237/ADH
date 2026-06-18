@extends('admin.layouts.app')

@section('page_title', 'Gestion des Articles / Actualités')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex align-items-center">
        <h3 class="card-title mb-0"><i class="fas fa-newspaper mr-1"></i> Liste des Articles</h3>
        <div class="card-tools ml-auto">
            <a href="{{ route('admin.articles.create') }}" class="btn btn-sm btn-light text-primary font-weight-bold">
                <i class="fas fa-plus mr-1"></i> Nouvel Article
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead>
                    <tr>
                        <th style="width: 80px">Visuel</th>
                        <th>Titre</th>
                        <th>Slug</th>
                        <th>Statut</th>
                        <th>Date Pub.</th>
                        <th style="width: 150px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                    <tr>
                        <td class="align-middle">
                            @if($article->image)
                                <img src="{{ $article->image }}" alt="" class="img-thumbnail" style="width: 60px; height: 45px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center border" style="width: 60px; height: 45px;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td class="align-middle font-weight-bold">
                            {{ $article->title }}
                        </td>
                        <td class="align-middle text-muted text-sm">
                            {{ $article->slug }}
                        </td>
                        <td class="align-middle">
                            @if($article->is_published)
                                <span class="badge badge-success px-2 py-1"><i class="fas fa-check mr-1"></i> Publié</span>
                            @else
                                <span class="badge badge-secondary px-2 py-1"><i class="fas fa-file-alt mr-1"></i> Brouillon</span>
                            @endif
                        </td>
                        <td class="align-middle text-sm">
                            {{ $article->published_at ? $article->published_at->format('d/m/Y H:i') : '-' }}
                        </td>
                        <td class="align-middle">
                            <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-info" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="fas fa-folder-open fa-3x mb-3 d-block text-gray-light"></i>
                            Aucun article trouvé. Cliquez sur "Nouvel Article" pour commencer à écrire.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($articles->hasPages())
    <div class="card-footer clearfix">
        <div class="float-right">
            {{ $articles->links() }}
        </div>
    </div>
    @endif
</div>
@endsection
