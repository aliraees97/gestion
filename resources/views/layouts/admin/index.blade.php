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
                        <div class="nk-block-head nk-block-head-sm">

                            @include('partials.message')

                            <div class="nk-block-between">

                                <div class="nk-block-head-content">
                                    <h3 class="nk-block-title page-title">Users</h3>
                                </div>

                                <!-- .nk-block-head-content -->

                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                            data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                                        <div class="toggle-expand-content" data-content="more-options">
                                            <ul class="nk-block-tools g-3">
                                                <li>
                                                    <div id="clients_filter"
                                                        class="form-control-wrap dataTables_filter">
                                                        <div class="form-icon form-icon-right">
                                                            <em class="icon ni ni-search"></em>
                                                        </div>
                                                        <input type="search" class="form-control" id="search_client"
                                                            placeholder="Search by name">
                                                    </div>
                                                </li>
                                                <li class="nk-block-tools-opt">

                                                    <button class="btn btn-primary d-none d-md-inline-flex "
                                                        data-toggle="modal" data-target="#modalAdmin"><em
                                                            class="icon ni ni-plus"></em>
                                                        <span>Add</span>
                                                    </button>

                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- .nk-block-head-content -->
                            </div>
                            <!-- .nk-block-between -->
                        </div>
                        <!-- .nk-block-head -->
                        <div class="nk-block">


                            <h4 class="py-3"></h4>
                            <div class="nk-tb-list is-separate mb-3 no-car">
                                <div class="nk-tb-item nk-tb-head">


                                    <div class="nk-tb-col"><span class="sub-text">User</span></div>
                                    <div class="nk-tb-col"><span class="sub-text">Name</span></div>
                                    <div class="nk-tb-col"><span class="sub-text">Email</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Role</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Status</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Acción</span></div>

                                </div>
                                @foreach ($admins as $admin)
                                    <div class="nk-tb-item">

                                        <div class="nk-tb-col">
                                            <a href="admin-detail/{{ $admin->id }}">
                                                <div class="user-admind">
                                                    <div class="user-avatar bg-primary">
                                                        <span>{{ htmlspecialchars(ucfirst(substr($admin->name ?? '', 0, 1))) }}</span>
                                                    </div>

                                                </div>
                                            </a>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($admin->name ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($admin->email ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ $admin->is_admin == 1 ? 'Admin' : 'User' }}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            @if ($admin->active == 1)
                                                <span class="text-success">Activa</span>
                                            @else
                                                <span class="text-danger">Desactivada</span>
                                            @endif

                                        </div>



                                        <div class="nk-tb-col tb-col-md">


                                            {{-- <button data-id="{{ $admin->id }}" data-toggle="modal"
                                                data-target="#modalPayment" class="btn btn-primary btn-round btn-icon">
                                                <em class="icon ni ni-activity"></em>
                                            </button> --}}

                                            <button data-id="{{ $admin->id }}" data-name="{{ $admin->name }}"
                                                data-email="{{ $admin->email }}" data-toggle="modal"
                                                data-target="#modalAdminupdate"
                                                class="btn btn-primary btn-round btn-icon  admin-edit">
                                                <em class="icon ni ni-edit"></em>
                                            </button>



                                            @if ($admin->count() > 1)
                                                <a href="/delete-admin/{{ $admin->id }}"
                                                    class="btn btn-danger btn-round btn-icon ">
                                                    <em class="icon ni ni-trash-alt"></em>
                                                </a>
                                            @endif

                                        </div>

                                    </div>
                                @endforeach


                            </div>

                            <!-- pagination .card for Autos en Proceso -->
                            <div class="card">
                                <div class="card-inner">
                                    <div class="nk-block-between-md g-3">
                                        <div class="g">
                                            <ul class="pagination justify-content-center justify-content-md-start">
                                                @if ($admins->onFirstPage())
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1"
                                                            aria-disabled="true">Prev</a>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $admins->previousPageUrl() }}">Prev</a>
                                                    </li>
                                                @endif

                                                @if ($admins->hasMorePages())
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $admins->nextPageUrl() }}">Next</a>
                                                    </li>
                                                @else
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1"
                                                            aria-disabled="true">Next</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End pagination .card -->


                            {{-- no-results-message s --}}

                            <div class="card" id="no-results-message" style="display: none;">
                                <div class="card-inner">

                                    <b>No cars found.</b>

                                </div>
                            </div>

                            {{-- no-results-message e --}}

                        </div>








                    </div>
                </div>
            </div>
        </div>
        <!-- content @e -->

        {{--  modal start Add New Admin  --}}
        <div class="modal fade" id="modalAdmin">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar nuevo administrador</h5>
                    </div>
                    <div class="modal-body">
                        <!-- Alert for errors -->
                        <div id="errorMessages" class="alert alert-danger d-none">
                            <ul id="errorList"></ul>
                        </div>

                        <form id="adminForm" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>

                            <div class="form-group">
                                <label for="model">Correo electrónico
                                </label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>



                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="password">Contraseña</label>
                                </div>
                                <div class="form-control-wrap">
                                    <a tabindex="-1" href="#"
                                        class="form-icon form-icon-right passcode-switch lg" data-target="password">
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

                            {{-- <div class="form-group">
                                <label for="admin_id">Estado</label>
                                <select name="admin_id" id="admin_id" class="form-control" required>
                                    <option value="1">Activa</option>
                                    <option value="0">Desactivada</option>
                                </select>
                            </div> --}}



                            <div class="form-group d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Guardar registro</button>
                                <button class="btn btn-danger close-modal ml-auto"
                                    data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal End Add New  Admin --}}



        {{-- Admin Update Modal Start --}}

        <div class="modal fade" tabindex="-1" id="modalAdminupdate">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>

                    <div class="modal-body">
                        <!-- Alert for errors -->
                        <div class="alert alert-danger invalid-feedback" id="email-error" style="display: none;">
                        </div>


                        <form id="editAdminForm">
                            @csrf
                            <input type="hidden" name="id" id="admin-id">

                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control" id="admin-name" required>
                                <div class="alert alert-danger invalid-feedback" id="name-error"
                                    style="display: none;"></div> <!-- For name errors -->
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="admin-email" required>
                                <div class="alert alert-danger invalid-feedback" id="email-error"
                                    style="display: none;"></div> <!-- For email errors -->
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Actualizar perfil</button>
                                <button class="btn btn-danger close-modal ml-auto"
                                    data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        {{-- Admin Update  Modal End --}}





        <!-- footer @s -->
        @include('partials._footer')
        <!-- footer @e -->

    </div>
    <!-- wrap @e -->


</div>
<!-- main end -->


{{-- select2 search --}}

@include('partials.scripts')
