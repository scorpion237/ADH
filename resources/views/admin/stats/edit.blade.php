@extends('admin.layouts.app')

@section('page_title', 'Modifier la Statistique')

@section('content')
<div class="row">
    <div class="col-md-6">
        <form action="{{ route('admin.stats.update', $stat) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">
                    <h3 class="card-title mb-0"><i class="fas fa-edit mr-1"></i> Détails de la Statistique</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Libellé <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $stat->title) }}" required placeholder="Ex: Volontaires actifs">
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="value">Valeur <span class="text-danger">*</span></label>
                        <input type="text" name="value" id="value" class="form-control @error('value') is-invalid @enderror" value="{{ old('value', $stat->value) }}" required placeholder="Ex: 120+">
                        @error('value')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="icon">Classe d'icône FontAwesome <span class="text-danger">*</span></label>
                        <input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $stat->icon) }}" required placeholder="Ex: fas fa-heart">
                        <small class="form-text text-muted">
                            Utilisez le site <a href="https://fontawesome.com/v6/search?o=r&m=free" target="_blank">FontAwesome</a> pour trouver des classes d'icônes gratuites.
                        </small>
                        @error('icon')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sort_order">Ordre de tri / Affichage <span class="text-danger">*</span></label>
                        <input type="number" name="sort_order" id="sort_order" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', $stat->sort_order) }}" required min="0">
                        @error('sort_order')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <button type="submit" class="btn btn-warning"><i class="fas fa-save mr-1"></i> Mettre à jour</button>
                    <a href="{{ route('admin.stats.index') }}" class="btn btn-default">Annuler</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
