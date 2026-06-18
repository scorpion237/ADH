@extends('admin.layouts.app')

@section('page_title', 'Rédiger un Article')

@section('content')
<div class="row">
    <div class="col-md-9">
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0"><i class="fas fa-edit mr-1"></i> Contenu de l'Article</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Titre <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required placeholder="Ex: Campagne de sensibilisation à l'environnement">
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">Contenu de l'article <span class="text-danger">*</span></label>
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
                    <label for="image">Image de couverture</label>
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
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="is_published" class="custom-control-input" id="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="is_published">Publier l'article</label>
                    </div>
                </div>

                <div class="form-group" id="publish-date-group">
                    <label for="published_at">Date de publication</label>
                    <input type="datetime-local" name="published_at" id="published_at" class="form-control" value="{{ old('published_at') }}">
                </div>
            </div>
            <div class="card-footer bg-light">
                <button type="submit" class="btn btn-success btn-block"><i class="fas fa-save mr-1"></i> Enregistrer</button>
                <a href="{{ route('admin.articles.index') }}" class="btn btn-default btn-block mt-2">Annuler</a>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    // Custom file input label update
    $(document).ready(function () {
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    });
</script>
@endsection
