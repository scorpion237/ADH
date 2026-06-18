@extends('admin.layouts.app')

@section('page_title', 'Gestion des Statistiques')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-white d-flex align-items-center">
        <h3 class="card-title mb-0"><i class="fas fa-chart-bar mr-1"></i> Liste des Statistiques Clés</h3>
        <div class="card-tools ml-auto">
            <a href="{{ route('admin.stats.create') }}" class="btn btn-sm btn-light text-warning font-weight-bold">
                <i class="fas fa-plus mr-1"></i> Nouvelle Statistique
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead>
                    <tr>
                        <th style="width: 80px">Icône</th>
                        <th>Libellé</th>
                        <th>Valeur</th>
                        <th>Ordre d'affichage</th>
                        <th style="width: 150px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stats as $stat)
                    <tr>
                        <td class="align-middle text-center">
                            <span class="p-2 border rounded bg-light d-inline-block">
                                <i class="{{ $stat->icon }} fa-lg text-primary"></i>
                            </span>
                        </td>
                        <td class="align-middle font-weight-bold">
                            {{ $stat->title }}
                        </td>
                        <td class="align-middle font-weight-bold text-success">
                            {{ $stat->value }}
                        </td>
                        <td class="align-middle">
                            {{ $stat->sort_order }}
                        </td>
                        <td class="align-middle">
                            <a href="{{ route('admin.stats.edit', $stat) }}" class="btn btn-sm btn-info" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.stats.destroy', $stat) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette statistique ?');">
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
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fas fa-folder-open fa-3x mb-3 d-block text-gray-light"></i>
                            Aucune statistique trouvée.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
