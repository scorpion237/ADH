@extends('admin.layouts.app')

@section('page_title', 'Tableau de Bord')

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info shadow-sm">
            <div class="inner">
                <h3>{{ $articlesCount }}</h3>
                <p>Articles / Actualités</p>
            </div>
            <div class="icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <a href="{{ route('admin.articles.index') }}" class="small-box-footer">Gérer <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success shadow-sm">
            <div class="inner">
                <h3>{{ $projectsCount }}</h3>
                <p>Projets Actifs</p>
            </div>
            <div class="icon">
                <i class="fas fa-tasks"></i>
            </div>
            <a href="{{ route('admin.projects.index') }}" class="small-box-footer">Gérer <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning shadow-sm">
            <div class="inner text-white">
                <h3>{{ $statsCount }}</h3>
                <p>Statistiques Clés</p>
            </div>
            <div class="icon text-white-50">
                <i class="fas fa-chart-bar"></i>
            </div>
            <a href="{{ route('admin.stats.index') }}" class="small-box-footer text-white">Gérer <i class="fas fa-arrow-circle-right text-white"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger shadow-sm">
            <div class="inner">
                <h3>{{ $settingsCount }}</h3>
                <p>Paramètres Site</p>
            </div>
            <div class="icon">
                <i class="fas fa-cogs"></i>
            </div>
            <a href="{{ route('admin.settings.index') }}" class="small-box-footer">Gérer <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->

<!-- Main row -->
<div class="row mt-4">
    <!-- Left col -->
    <section class="col-lg-6 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">
                    <i class="fas fa-newspaper mr-1"></i>
                    Articles Récents
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-sm btn-light text-primary">
                        <i class="fas fa-plus mr-1"></i> Ajouter
                    </a>
                </div>
            </div><!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Titre</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentArticles as $article)
                        <tr>
                            <td>
                                @if($article->image)
                                    <img src="{{ $article->image }}" alt="" class="img-circle img-size-32" style="object-fit: cover; width: 32px; height: 32px;">
                                @else
                                    <span class="badge badge-secondary"><i class="fas fa-image"></i></span>
                                @endif
                            </td>
                            <td>
                                <span class="font-weight-bold text-dark">{{ Str::limit($article->title, 40) }}</span>
                                <span class="text-xs text-muted d-block">Créé le {{ $article->created_at->format('d/m/Y') }}</span>
                            </td>
                            <td>
                                @if($article->is_published)
                                    <span class="badge badge-success">Publié</span>
                                @else
                                    <span class="badge badge-secondary">Brouillon</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-xs btn-info"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">Aucun article enregistré.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.Left col -->

    <!-- Right col -->
    <section class="col-lg-6 connectedSortable">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h3 class="card-title">
                    <i class="fas fa-tasks mr-1"></i>
                    Projets Récents
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-light text-success">
                        <i class="fas fa-plus mr-1"></i> Ajouter
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Titre</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentProjects as $project)
                        <tr>
                            <td>
                                @if($project->image)
                                    <img src="{{ $project->image }}" alt="" class="img-circle img-size-32" style="object-fit: cover; width: 32px; height: 32px;">
                                @else
                                    <span class="badge badge-secondary"><i class="fas fa-image"></i></span>
                                @endif
                            </td>
                            <td>
                                <span class="font-weight-bold text-dark">{{ Str::limit($project->title, 40) }}</span>
                                <span class="text-xs text-muted d-block">{{ $project->location ?? 'Non localisé' }}</span>
                            </td>
                            <td>
                                @if($project->status === 'completed')
                                    <span class="badge badge-success">Terminé</span>
                                @elseif($project->status === 'ongoing')
                                    <span class="badge badge-primary">En cours</span>
                                @else
                                    <span class="badge badge-warning text-white">En planification</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-xs btn-info"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">Aucun projet enregistré.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- right col -->
</div>
<!-- /.row (main row) -->
@endsection
