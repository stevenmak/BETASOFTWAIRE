<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Responsive, Bootstrap, BS4" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}- @yield('title')</title>
    <!-- Styles  -->
    <!-- build:css ../assets/css/site.min.css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" />
    <!-- endbuild -->
</head>
<body class="layout-row">
    <!-- ############ Aside START-->
    <div id="aside" class="page-sidenav no-shrink bg-light nav-dropdown fade" aria-hidden="true">
        <div class="sidenav h-100 modal-dialog bg-light">
            <!-- sidenav top -->
            <div class="navbar">
                <!-- brand -->
                <a href="#" class="navbar-brand ">
                    <svg width="32" height="32" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                        <g class="loading-spin" style="transform-origin: 256px 256px">
                            <path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z"></path>
                        </g>
                    </svg>
                    <!-- <img src="../assets/img/logo.png" alt="..."> -->
                    <span class="hidden-folded d-inline l-s-n-1x ">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <!-- / brand -->
            </div>
            <!-- Flex nav content -->
                <div class="nav-active-text-primary" data-nav>
                    <ul class="nav bg">
                        <li>
                            <a href="{{ route('home') }}">
                                <span class="nav-icon text-primary"><i data-feather='home'></i></span>
                                <span class="nav-text">TABLEAUX DE BORD</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('agenda') }}">
                                <span class="nav-icon text-primary"><i data-feather='calendar'></i></span>
                                <span class="nav-text">AGENDA ELECTRONIQUE</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav ">
                        <li>
                            <a href="#" class="">
                                <span class="nav-icon"><i data-feather='users'></i></span>
                                <span class="nav-text">AGENT ET UTILISATEUR</span>
                                <span class="nav-caret"></span>
                            </a>
                            <ul class="nav-sub nav-mega">
                                @can('agent-list')
                                    <li>
                                        <a href="{{ route('agents.index') }}">
                                            <span class="nav-icon text-info"><i data-feather='user'></i></span>
                                            <span class="nav-text">AGENTS</span>
                                            <span class="nav-badge"><b class="badge-circle xs text-danger"></b></span>
                                        </a>
                                    </li>
                                @endcan
                                @can('users-list')
                                <li>
                                    <a href="{{ route('users.index') }}">
                                        <span class="nav-icon text-success"><i data-feather='users'></i></span>
                                        <span class="nav-text">UTILISATEUR</span>
                                    </a>
                                </li>
                                @endcan
                                @can('role-list')
                                <li>
                                    <a href="{{ route('roles.index') }}">
                                        <span class="nav-icon text-danger"><i data-feather='mail'></i></span>
                                        <span class="nav-text">ROLES UTILISATEUR</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="">
                                <span class="nav-icon"><i data-feather='layers'></i></span>
                                <span class="nav-text">GESTION CLIENT</span>
                                <span class="nav-caret"></span>
                            </a>
                            <ul class="nav-sub nav-mega">
                                @can('client-list')
                                <li>
                                    <a href="{{ route('clients.index') }}">
                                        <span class="nav-icon text-success"><i data-feather='user'></i></span>
                                        <span class="nav-text">CLIENT</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="">
                                <span class="nav-icon"><i data-feather='grid'></i></span>
                                <span class="nav-text">PLANIFICATION</span>
                                <span class="nav-caret"></span>
                            </a>
                            <ul class="nav-sub nav-mega">
                                @can('projet-list')
                                <li>
                                    <a href="{{ route('projets.index') }}" class="">
                                        <span class="nav-text">PROJET</span>
                                    </a>
                                </li>
                                @endcan
                                @can('etape-list')
                                <li>
                                    <a href="{{ route('etapes.index') }}" class="">
                                        <span class="nav-text">ETAPE PROJET</span>
                                    </a>
                                </li>
                                @endcan
                                @can('taches-list')
                                <li>
                                    <a href="{{ route('taches.index') }}" class="">
                                        <span class="nav-text">TACHE PROJET</span>
                                    </a>
                                </li>
                                @endcan
                                @can('departement-list')
                                <li>
                                    <a href="{{ route('departements.index') }}" class="">
                                        <span class="nav-text">DEPARTEMENT</span>
                                    </a>
                                </li>
                                @endcan
                                @can('service-list')
                                <li>
                                    <a href="{{ route('services.index') }}" class="">
                                        <span class="nav-text">SERVICE</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="">
                                <span class="nav-icon"><i data-feather='layers'></i></span>
                                <span class="nav-text">FINANCES</span>
                                <span class="nav-caret"></span>
                            </a>
                            <ul class="nav-sub nav-mega">
                                @can('devis-list')
                                <li>
                                    <a href="{{ route('devis.index') }}" class="">
                                        <span class="nav-text">ETAT DES BESOINS</span>
                                    </a>
                                </li>
                                @endcan
                                @can('depense-list')
                                <li>
                                    <a href="{{ route('depenses.index') }}" class="">
                                        <span class="nav-text">DEPENSES</span>
                                    </a>
                                </li>
                                @endcan
                                @can('paiement-list')
                                <li>
                                    <a href="{{ route('paiements.index') }}" class="">
                                        <span class="nav-text">PAIEMENTS</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="">
                                <span class="nav-icon"><i data-feather='settings'></i></span>
                                <span class="nav-text">PARAMETRAGE</span>
                                <span class="nav-caret"></span>
                            </a>
                            <ul class="nav-sub nav-mega">
                                <li>
                                    <a href="{{ route('entreprises.index') }}" class="">
                                        <span class="nav-text">ENTREPRISE</span>
                                    </a>
                                </li>
                                @can('materiel-list')
                                <li>
                                    <a href="{{ route('materiels.index') }}" class="">
                                        <span class="nav-text">MATERIAUX</span>
                                    </a>
                                </li>
                                @endcan
                                @can('echange-list')
                                <li>
                                    <a href="{{ route('echanges.index') }}" class="">
                                        <span class="nav-text">TAUX</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    </ul>
                </div>
            <!-- sidenav bottom -->
            <div class="no-shrink ">
                <div class="p-3 d-flex align-items-center">
                    <div class="text-sm hidden-folded text-muted">
                        VERSION BETA O.1
                    </div>
                    <div class="progress mx-2 flex" style="height:4px;">
                        <div class="progress-bar gd-success" style="width: 35%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ############ Aside END-->
    <div id="main" class="layout-column flex">
        <!-- ############ Header START-->
        <div id="header" class="page-header ">
            <div class="navbar navbar-expand-lg">
                <!-- brand -->
                <a href="index.html" class="navbar-brand d-lg-none">
                    <svg width="32" height="32" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                        <g class="loading-spin" style="transform-origin: 256px 256px">
                            <path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z"></path>
                        </g>
                    </svg>
                    <!-- <img src="../assets/img/logo.png" alt="..."> -->
                    <span class="hidden-folded d-inline l-s-n-1x d-lg-none">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <!-- / brand -->
                <!-- Navbar collapse -->
                <ul class="nav navbar-menu order-1 order-lg-2">
                    <li class="nav-item d-none d-sm-block">
                        <a class="nav-link px-2" data-toggle="fullscreen" data-plugin="fullscreen">
                            <i data-feather="maximize"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link px-2" data-toggle="dropdown">
                            <i data-feather="settings"></i>
                        </a>
                        <!-- ############ Setting START-->
                        <div class="dropdown-menu dropdown-menu-center mt-3 w-md animate fadeIn">
                            <div class="setting px-3">
                                <div class="mb-2 text-muted">
                                    <strong>Parametres:</strong>
                                </div>
                                <div class="mb-3" id="settingLayout">
                                    <label class="ui-check ui-check-rounded my-1 d-block">
                                        <input type="checkbox" name="stickyHeader">
                                        <i></i>
                                        <small>Sticky header</small>
                                    </label>
                                    <label class="ui-check ui-check-rounded my-1 d-block">
                                        <input type="checkbox" name="stickyAside">
                                        <i></i>
                                        <small>Sticky aside</small>
                                    </label>
                                    <label class="ui-check ui-check-rounded my-1 d-block">
                                        <input type="checkbox" name="foldedAside">
                                        <i></i>
                                        <small>Folded Aside</small>
                                    </label>
                                    <label class="ui-check ui-check-rounded my-1 d-block">
                                        <input type="checkbox" name="hideAside">
                                        <i></i>
                                        <small>Hide Aside</small>
                                    </label>
                                </div>
                                <div class="mb-2 text-muted">
                                    <strong>Mode Couleur:</strong>
                                </div>
                                <div class="mb-2">
                                    <label class="radio radio-inline ui-check ui-check-md">
                                        <input type="radio" name="bg" value="">
                                        <i></i>
                                    </label>
                                    <label class="radio radio-inline ui-check ui-check-color ui-check-md">
                                        <input type="radio" name="bg" value="bg-dark">
                                        <i class="bg-dark"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- ############ Setting END-->
                    </li>
                    <!-- Notification -->
                    <li class="nav-item dropdown">
                        <a class="nav-link px-2 mr-lg-2" data-toggle="dropdown">
                            <i data-feather="bell"></i>
                            <span class="badge badge-pill badge-up bg-primary">{{ $notif=DB::table('notifications')->count() }}</span>
                        </a>
                        <!-- dropdown -->


                        <!-- / dropdown -->
                    </li>
                    <!-- User dropdown menu -->
                    <li class="nav-item dropdown">
                        <a href="" data-toggle="dropdown" class="nav-link d-flex align-items-center px-2 text-color">
                            <span class="avatar w-24" style="margin: -2px;"><img src="{{ asset('assets/img/a0.jpg') }}" alt="..."></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right w mt-3 animate fadeIn">
                            <a class="dropdown-item" href="#">
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="ti-settings text-primary"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </div>
                    </li>
                    <!-- Navarbar toggle btn -->
                    <li class="nav-item d-lg-none">
                        <a href="#" class="nav-link px-2" data-toggle="collapse" data-toggle-class data-target="#navbarToggler">
                            <i data-feather="search"></i>
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link px-1" data-toggle="modal" data-target="#aside">
                            <i data-feather="menu"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ############ Header END-->

        <!-- ############ Content START-->
        <div id="content" class="flex ">
              <!-- ############ Main START-->
            <div>
                <div class="page-hero page-container " id="page-hero">
                    <div class="padding d-flex">
                        <div class="page-title">
                            <h2 class="text-md text-highlight">@yield('module')</h2>
                            <small class="text-muted">@yield('description')</small>
                        </div>
                        <div class="flex"></div>
                        <div>
                            <a href="javascript:history.back()" class="btn btn-md">
                                <i data-feather="arrow-left"></i>
                                <span class="d-none d-sm-inline mx-1">Retour</span>

                            </a>
                        </div>
                    </div>
                </div>
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                                @yield('content')
                        </div>
                    </div>
            </div>
        </div>
        <!-- ############ Content END-->
        <!-- ############ Footer START-->
        <div id="footer" class="page-footer">
            <div class="d-flex p-3">
                <span class="text-sm text-muted flex">&copy; Copyright. TSD IT SOLUTIONS</span>
                <div class="text-sm text-muted">Version BETA 0.1</div>
            </div>
        </div>
        <!-- ############ Footer END-->
    </div>
     <!-- Scripts -->
        <script src="{{ asset('js/custom.js') }}"></script>
      <!-- build:js ../assets/js/site.min.js -->
        <!-- jQuery -->
        <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('libs/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- ajax page -->
        <script src="../libs/pjax/pjax.min.js"></script>
        <script src="../assets/js/ajax.js"></script>
        <!-- lazyload plugin -->
        <script src="{{ asset('assets/js/lazyload.config.js') }}"></script>
        <script src="{{ asset('assets/js/lazyload.js') }}"></script>
        <script src="{{ asset('assets/js/plugin.js') }}"></script>
        <!-- scrollreveal -->
        <script src="{{ asset('libs/scrollreveal/dist/scrollreveal.min.js') }}"></script>
        <!-- fulll screen -->
        <!-- feathericon -->
        <script src="{{ asset('libs/feather-icons/dist/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/feathericon.js') }}"></script>
        <!-- theme -->
        <script src="{{ asset('assets/js/theme.js') }}"></script>
        <script src="{{ asset('assets/js/utils.js') }}"></script>
        <!-- endbuild -->
</body>
</html>
