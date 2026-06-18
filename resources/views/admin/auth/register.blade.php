<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription | Administration ONG ADH</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <style>
        .register-page {
            background: linear-gradient(135deg, #1d4ed8 0%, #059669 100%);
        }

        .card-primary.card-outline {
            border-top: 3px solid #eab308;
        }

        .btn-primary {
            background-color: #1d4ed8;
            border-color: #1d4ed8;
        }

        .btn-primary:hover {
            background-color: #1a45bd;
            border-color: #1a45bd;
        }
    </style>
</head>

<body class="hold-transition register-page">

<div class="register-box">

    <div class="card card-outline card-primary shadow-lg">

        <div class="card-header text-center py-4">
            <h1 class="h3 mb-0">
                <b>ONG ADH</b>
            </h1>
            <span class="text-muted text-sm">
                Création d'un compte administrateur
            </span>
        </div>

        <div class="card-body">

            <p class="login-box-msg">
                Créez votre compte administrateur
            </p>

            <form action="{{ route('register.store') }}" method="POST">

                @csrf

                <!-- Nom -->
                <div class="input-group mb-3">

                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Nom complet"
                           value="{{ old('name') }}"
                           required>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>

                    @error('name')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <!-- Email -->
                <div class="input-group mb-3">

                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Adresse Email"
                           value="{{ old('email') }}"
                           required>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                    @error('email')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <!-- Mot de passe -->
                <div class="input-group mb-3">

                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Mot de passe"
                           required>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                    @error('password')
                    <span class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <!-- Confirmation -->
                <div class="input-group mb-3">

                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Confirmer le mot de passe"
                           required>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-8">
                        <a href="{{ route('login') }}">
                            Déjà inscrit ?
                        </a>
                    </div>

                    <div class="col-4">
                        <button type="submit"
                                class="btn btn-primary btn-block">
                            S'inscrire
                        </button>
                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>