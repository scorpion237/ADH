@extends('admin.layouts.app')

@section('page_title', 'Créer un Projet')

@section('content')
<div class="row">
    <div class="col-md-9">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h3 class="card-title mb-0"><i class="fas fa-edit mr-1"></i> Détails du Projet</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Titre du Projet <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required placeholder="Ex: Forage d'eau potable">
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description courte <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror" required placeholder="Description brève du projet (affichée sur la page d'accueil)">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">Description complète & Objectifs <span class="text-danger">*</span></label>
                        <textarea name="content" id="content" class="form-control rtf-editor @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                        @error('content')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mt-4">
                <div class="card-header bg-secondary text-white">
                    <h3 class="card-title mb-0"><i class="fas fa-search mr-1"></i> Optimisation SEO (Optionnel)</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="seo_title">Titre SEO</label>
                        <input type="text" name="seo_title" id="seo_title" class="form-control" value="{{ old('seo_title') }}" placeholder="Titre affiché dans les moteurs de recherche">
                    </div>
                    <div class="form-group">
                        <label for="seo_description">Description SEO</label>
                        <textarea name="seo_description" id="seo_description" class="form-control" rows="3" placeholder="Description courte (150-160 caractères) pour les moteurs de recherche">{{ old('seo_description') }}</textarea>
                    </div>
                </div>
            </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h3 class="card-title mb-0"><i class="fas fa-cog mr-1"></i> Paramètres</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="image">Image du projet</label>
                    <div class="custom-file">
                        <input type="file" name="image" id="image" class="custom-file-input @error('image') is-invalid @enderror">
                        <label class="custom-file-label" for="image">Choisir un fichier</label>
                    </div>
                    @error('image')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <hr>

                <div class="form-group">
                    <label for="budget">Budget (Optionnel)</label>
                    <input type="text" name="budget" id="budget" class="form-control" value="{{ old('budget') }}" placeholder="Ex: 12 500 € ou 8M FCFA">
                </div>

                <div class="form-group">
                    <label for="location">Localisation / Lieu (Optionnel)</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}" placeholder="Ex: Région Centrale, Togo">
                </div>

                <div class="form-group">
                    <label for="status">Statut du Projet <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="planning" {{ old('status') === 'planning' ? 'selected' : '' }}>Planifié (En préparation)</option>
                        <option value="ongoing" {{ old('status') === 'ongoing' ? 'selected' : '' }}>En cours d'exécution</option>
                        <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Terminé</option>
                    </select>
                </div>
            </div>
            <div class="card-footer bg-light">
                <button type="submit" class="btn btn-success btn-block"><i class="fas fa-save mr-1"></i> Enregistrer</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-default btn-block mt-2">Annuler</a>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    });
</script>
@endsection
