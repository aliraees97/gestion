<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <!-- Page Title  -->
    <title>{{ config('app.name') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-lg">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light"
                                    data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>

                            <div class="nk-block nk-block-middle nk-auth-body">
                                @include('partials.message')
                                <div class="brand-logo pb-5">
                                    <a href="/" class="logo-link">
                                        <h2>Gestion</h2>

                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">LogIn de Lavadero</h4>

                                    </div>
                                </div>
                                <!-- .nk-block-head -->

                                <form action="{{ route('authenticate') }}" method="POST" autocomplete="off">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="email-address">Nombre de Usuario</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                class="form-control form-control-lg @error('email') is-invalid @enderror" />
                                            @error('email')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Contraseña</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#"
                                                class="form-icon form-icon-right passcode-switch lg"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" name="password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                id="password" required />
                                            @error('password')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Entrar</button>
                                    </div>
                                </form>


                                <!-- form -->


                            </div>
                            <!-- .nk-block -->

                            <div class="nk-block nk-auth-footer">

                                <div class="mt-3">
                                    <p>&copy; {{ date('Y') }} {{ config('app.name') }} . All Rights Reserved.</p>
                                </div>
                            </div>
                            <!-- .nk-block -->
                        </div>
                        <!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right"
                            data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg"
                            data-toggle-overlay="true"
                            style="background: url('{{ asset('images/slides/slide3.jpg') }}'); background-size: cover;
                            background-repeat: repeat;
                            background-position: center center;
                            ">

                        </div>
                        <!-- .nk-split-content -->
                    </div>
                    <!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->

    <!-- JavaScript -->
    <script src="{{ asset('assets/js/bundle.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=3.2.3') }}"></script>





</html>
