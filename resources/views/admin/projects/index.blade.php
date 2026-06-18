@extends('admin.layouts.app')

@section('page_title', 'Gestion des Projets')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white d-flex align-items-center">
        <h3 class="card-title mb-0"><i class="fas fa-tasks mr-1"></i> Liste des Projets</h3>
        <div class="card-tools ml-auto">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-light text-success font-weight-bold">
                <i class="fas fa-plus mr-1"></i> Nouveau Projet
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
                        <th>Lieu</th>
                        <th>Budget</th>
                        <th>Statut</th>
                        <th style="width: 150px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td class="align-middle">
                            @if($project->image)
                                <img src="{{ $project->image }}" alt="" class="img-thumbnail" style="width: 60px; height: 45px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center border" style="width: 60px; height: 45px;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td class="align-middle font-weight-bold">
                            {{ $project->title }}
                            <span class="text-xs text-muted d-block">{{ Str::limit($project->description, 60) }}</span>
                        </td>
                        <td class="align-middle">
                            {{ $project->location ?? '-' }}
                        </td>
                        <td class="align-middle font-weight-bold text-dark">
                            {{ $project->budget ?? '-' }}
                        </td>
                        <td class="align-middle">
                            @if($project->status === 'completed')
                                <span class="badge badge-success px-2 py-1"><i class="fas fa-check-circle mr-1"></i> Terminé</span>
                            @elseif($project->status === 'ongoing')
                                <span class="badge badge-primary px-2 py-1"><i class="fas fa-spinner fa-spin mr-1"></i> En cours</span>
                            @else
                                <span class="badge badge-warning text-white px-2 py-1"><i class="fas fa-clock mr-1"></i> Planifié</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-info" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');">
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
                            Aucun projet trouvé. Cliquez sur "Nouveau Projet" pour commencer.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($projects->hasPages())
    <div class="card-footer clearfix">
        <div class="float-right">
            {{ $projects->links() }}
        </div>
    </div>
    @endif
</div>
@endsection
