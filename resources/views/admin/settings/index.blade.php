@extends('admin.layouts.app')

@section('page_title', 'Configuration du Site')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            <div class="card card-primary card-outline card-tabs shadow-sm">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="settingsTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general-tab" data-toggle="pill" href="#general" role="tab" aria-controls="general" aria-selected="true">
                                <i class="fas fa-globe mr-1"></i> Général
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="pill" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                <i class="fas fa-address-book mr-1"></i> Contacts & Réseaux Sociaux
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="seo-tab" data-toggle="pill" href="#seo" role="tab" aria-controls="seo" aria-selected="false">
                                <i class="fas fa-search mr-1"></i> SEO
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="analytics-tab" data-toggle="pill" href="#analytics" role="tab" aria-controls="analytics" aria-selected="false">
                                <i class="fas fa-chart-line mr-1"></i> Analyses & Suivi
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="settingsTabContent">
                        
                        <!-- General Tab -->
                        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                            @if(isset($settings['general']))
                                @foreach($settings['general'] as $setting)
                                    <div class="form-group row">
                                        <label for="{{ $setting->key }}" class="col-sm-3 col-form-form-label font-weight-bold">
                                            @if($setting->key === 'site_title') Titre Général du Site
                                            @elseif($setting->key === 'donation_url') Lien pour faire un Don
                                            @else {{ ucfirst(str_replace('_', ' ', $setting->key)) }} @endif
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="{{ $setting->key }}" id="{{ $setting->key }}" class="form-control" value="{{ $setting->value }}">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- Contact Tab -->
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            @if(isset($settings['contact']))
                                @foreach($settings['contact'] as $setting)
                                    <div class="form-group row">
                                        <label for="{{ $setting->key }}" class="col-sm-3 col-form-form-label font-weight-bold">
                                            @if($setting->key === 'contact_email') Adresse Email de Contact
                                            @elseif($setting->key === 'contact_phone') Numéro de Téléphone
                                            @elseif($setting->key === 'contact_address') Adresse Physique
                                            @elseif($setting->key === 'facebook_url') URL Facebook
                                            @elseif($setting->key === 'twitter_url') URL Twitter / X
                                            @elseif($setting->key === 'linkedin_url') URL LinkedIn
                                            @elseif($setting->key === 'whatsapp_number') Numéro de Téléphone WhatsApp
                                            @else {{ ucfirst(str_replace('_', ' ', $setting->key)) }} @endif
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="{{ $setting->key }}" id="{{ $setting->key }}" class="form-control" value="{{ $setting->value }}">
                                            @if($setting->key === 'whatsapp_number')
                                                <small class="form-text text-muted">Format international sans symboles, ex: 22890123456 pour le Togo.</small>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- SEO Tab -->
                        <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                            @if(isset($settings['seo']))
                                @foreach($settings['seo'] as $setting)
                                    <div class="form-group row">
                                        <label for="{{ $setting->key }}" class="col-sm-3 col-form-form-label font-weight-bold">
                                            @if($setting->key === 'site_description') Description Meta Globale
                                            @else {{ ucfirst(str_replace('_', ' ', $setting->key)) }} @endif
                                        </label>
                                        <div class="col-sm-9">
                                            <textarea name="{{ $setting->key }}" id="{{ $setting->key }}" class="form-control" rows="4">{{ $setting->value }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- Analytics Tab -->
                        <div class="tab-pane fade" id="analytics" role="tabpanel" aria-labelledby="analytics-tab">
                            @if(isset($settings['analytics']))
                                @foreach($settings['analytics'] as $setting)
                                    <div class="form-group row">
                                        <label for="{{ $setting->key }}" class="col-sm-3 col-form-form-label font-weight-bold">
                                            @if($setting->key === 'google_analytics') ID de mesure Google Analytics
                                            @else {{ ucfirst(str_replace('_', ' ', $setting->key)) }} @endif
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="{{ $setting->key }}" id="{{ $setting->key }}" class="form-control" value="{{ $setting->value }}" placeholder="Ex: G-XXXXXXXXXX">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
                <div class="card-footer bg-light">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Sauvegarder les configurations</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
