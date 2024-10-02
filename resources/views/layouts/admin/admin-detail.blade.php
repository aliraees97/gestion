@include('partials._head')

<!-- main start -->
<div class="nk-main ">
    <!-- sidebar @s -->
    @include('partials._sidebar')
    <!-- sidebar @e -->

    <!-- wrap @s -->
    <div class="nk-wrap ">
        <!-- main header @s -->
        @include('partials._header')
        <!-- main header @e -->



        <!-- content @s -->
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        <div class="nk-block">
                            <div class="card">
                                <div class="card-aside-wrap">
                                    <div class="card-inner card-inner-lg">
                                        <div class="nk-block-head nk-block-head-lg">
                                            @include('partials.message')
                                            <div class="nk-block-between">


                                                <div class="nk-block-head-content">
                                                    <h4 class="nk-block-title">{{ $user->name ?? '' }} Information</h4>

                                                </div>
                                                <div class="nk-block-head-content align-self-start d-lg-none">
                                                    <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                        data-target="userAside"><em
                                                            class="icon ni ni-menu-alt-r"></em></a>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head -->
                                        <div class="nk-block">
                                            <div class="nk-data data-list">
                                                <div class="data-head">
                                                    <h6 class="overline-title">Basics</h6>
                                                </div>
                                                <div class="data-item" data-bs-toggle="modal"
                                                    data-bs-target="#profile-edit">
                                                    <div class="data-col">
                                                        <span class="data-label">Nombre completo
                                                        </span>
                                                        <span class="data-value">{{ $user->name ?? '' }}</span>
                                                    </div>

                                                </div><!-- data-item -->

                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">Correo electrónico
                                                        </span>
                                                        <span class="data-value">{{ $user->email ?? '' }}</span>
                                                    </div>

                                                </div>
                                                <!-- data-item -->

                                                <div class="data-item" data-bs-toggle="modal"
                                                    data-bs-target="#profile-edit">
                                                    <div class="data-col">
                                                        <span class="data-label">Role</span>

                                                        <span
                                                            class="data-value">{{ $user->is_admin == 1 ? 'Admin' : 'User' }}</span>

                                                    </div>
                                                </div>
                                                <!-- data-item -->


                                                <div class="data-item" data-bs-toggle="modal"
                                                    data-bs-target="#profile-edit">
                                                    <div class="data-col">
                                                        <span class="data-label">Estado</span>
                                                        @if ($user->active == 1)
                                                            <span class="data-value text-success">Activa</span>
                                                        @else
                                                            <span class="data-value text-danger">Desactivada</span>
                                                        @endif

                                                    </div>
                                                </div>
                                                <!-- data-item -->


                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">Contraseña</span>
                                                        <span class="data-value">
                                                            <a href="#" data-id="{{ $user->id }}"
                                                                data-toggle="modal" data-target="#modalPassupdate"
                                                                class="link link-primary pass-update">Actualizar</a>
                                                        </span>
                                                    </div>

                                                </div>



                                                <!-- data-item -->
                                            </div>
                                            <!-- data-list -->

                                        </div><!-- .nk-block -->
                                    </div>

                                </div><!-- .card-aside-wrap -->
                            </div><!-- .card -->
                        </div><!-- .nk-block -->
                    </div>
                </div>
            </div>
        </div>
        <!-- content @e -->



        {{-- Admin Update Modal Start --}}

        <div class="modal fade" tabindex="-1" id="modalPassupdate">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>

                    <div class="modal-body">
                        <!-- Alert for errors -->
                        <div class="alert alert-danger invalid-feedback" id="password-error" style="display: none;">
                        </div>

                        <form id="passwordUpdateForm">
                            @csrf
                            <input type="hidden" name="id" id="user-id">

                            <!-- Current Password Field -->
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="current-password">Contraseña actual</label>
                                </div>
                                <div class="form-control-wrap">
                                    <a tabindex="-1" href="#"
                                        class="form-icon form-icon-right passcode-switch lg"
                                        data-target="current-password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input type="password" name="current_password"
                                        class="form-control form-control-lg @error('current_password') is-invalid @enderror"
                                        id="current-password" required />
                                    @error('current_password')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- New Password Field -->

                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="new-password">Nueva contraseña</label>
                                </div>
                                <div class="form-control-wrap">
                                    <a tabindex="-1" href="#"
                                        class="form-icon form-icon-right passcode-switch lg" data-target="new-password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input type="password" name="new_password"
                                        class="form-control form-control-lg @error('new_password') is-invalid @enderror"
                                        id="new-password" required />
                                    @error('new_password')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Confirm New Password Field -->
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="confirm-password">Confirmar nueva
                                        contraseña</label>
                                </div>
                                <div class="form-control-wrap">
                                    <a tabindex="-1" href="#"
                                        class="form-icon form-icon-right passcode-switch lg"
                                        data-target="confirm-password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input type="password" name="new_password_confirmation"
                                        class="form-control form-control-lg @error('new_password_confirmation')is-invalid @enderror"
                                        id="confirm-password" required />
                                    @error('new_password_confirmation')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Actualizar contraseña</button>
                                <button class="btn btn-danger close-modal ml-auto"
                                    data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        {{-- Admin Update  Modal End --}}


        <!-- wrap @e -->


    </div>
    <!-- main end -->


    @include('partials.scripts')
