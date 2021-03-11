<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="Responsive, Bootstrap, BS4" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- style -->
        <!-- build:css ../assets/css/site.min.css -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" />
        <!-- endbuild -->
    </head>
    <body class="layout-row">
        <div class="flex">
            <div class="w-xl w-auto-sm mx-auto py-5">
                <div class="p-4 d-flex flex-column h-100">
                    <!-- brand -->
                    <a href="index.html" class="navbar-brand align-self-center">
                        <svg width="32" height="32" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <g class="loading-spin" style="transform-origin: 256px 256px">
                                <path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z"></path>
                            </g>
                        </svg>
                        <!-- <img src="../assets/img/logo.png" alt="..."> -->
                        <span class="hidden-folded d-inline l-s-n-1x align-self-center">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                    <!-- / brand -->
                </div>
                <div class="card">
                    <div id="content-body">
                        <div class="p-3 p-md-5">
                            <h4>{{ config('app.name', 'Laravel') }}</h4>
                            <p>
                                <small class="text-muted">Veillez vous connectez à votre compte</small>
                            </p>
                            <form method="POST"  action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input id="email" type="email"  class="form-control"
                                    name="email" value="{{ old('email') }}" placeholder="Entrez email" autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Mot de Passe</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe" >
                                    <div class="my-3 text-right">
                                     @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="checkbox mb-3">
                                    <label class="ui-check">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <i></i> Se souvenir de moi
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary mb-4">{{ __('Connexion') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="text-center text-muted">&copy; Copyright. TSD IT SOLUTIONS</div>
            </div>
        </div>
        <!-- build:js ../assets/js/site.min.js -->
        <!-- jQuery -->
        <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- ajax page -->
        <script src="{{ asset('assets/libs/pjax/pjax.min.js') }}"></script>
        <script src="{{ asset('assets/js/ajax.js') }}"></script>
        <!-- lazyload plugin -->
        <script src="{{ asset('assets/js/lazyload.config.js') }}"></script>
        <script src="{{ asset('assets/js/lazyload.js') }}"></script>
        <script src="{{ asset('assets/js/plugin.js') }}"></script>
        <!-- scrollreveal -->
        <script src="{{ asset('assets/libs/scrollreveal/dist/scrollreveal.min.js') }}"></script>
        <!-- feathericon -->
        <script src="{{ asset('assets/libs/feather-icons/dist/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/feathericon.js') }}"></script>
        <!-- theme -->
        <script src="{{ asset('assets/js/theme.js') }}"></script>
        <script src="{{ asset('assets/js/utils.js') }}"></script>
        <!-- endbuild -->
    </body>
</html>
