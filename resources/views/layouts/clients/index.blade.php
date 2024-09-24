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
                                    <h3 class="nk-block-title page-title">Clientas</h3>
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
                                                        <input type="search" class="form-control" id="default-04"
                                                            placeholder="Search by name">
                                                    </div>
                                                </li>


                                                <li class="nk-block-tools-opt">
                                                    <a href="#" class="btn btn-icon btn-primary d-md-none"><em
                                                            class="icon ni ni-plus"></em></a>
                                                    <button data-toggle="modal" data-target="#modalDefault"
                                                        class="btn btn-primary d-none d-md-inline-flex"><em
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
                            <div class="nk-tb-list is-separate mb-3">
                                <div class="nk-tb-item nk-tb-head">

                                    <div class="nk-tb-col"><span class="sub-text">Nombre</span></div>
                                    {{-- <div class="nk-tb-col tb-col-md"><span class="sub-text">Name</span></div> --}}
                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Teléfono</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Correo electrónico
                                        </span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">WhatsApp</span></div>

                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Acción</span></div>
                                </div>
                                @foreach ($clients as $client)
                                    <div class="nk-tb-item">


                                        <div class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary">
                                                    <span>{{ htmlspecialchars(ucfirst(substr($client->name ?? '', 0, 1))) }}</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">{{ htmlspecialchars($client->name ?? '') }}
                                                        <span class="dot dot-success d-md-none ms-1"></span>
                                                    </span>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($client->phone ?? '') }}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($client->email) ?? '' }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <button class="whatsapp-btn btn btn-success btn-round"
                                                data-phone="{{ $client->phone }}" data-name="{{ $client->name }}">
                                                <em class="icon ni ni-whatsapp"></em>
                                            </button>
                                        </div>


                                        <div class="nk-tb-col tb-col-md">
                                            <div class="drodown">
                                                <a href="#"
                                                    class="btn btn-sm btn-icon btn-trigger dropdown-toggle"
                                                    data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a href="detail/{{ $client->id }}">
                                                                <em class="icon ni ni-eye"></em>
                                                                <span>Detalle</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#editClientModal"
                                                                data-client-id="{{ $client->id }}">
                                                                <em class="icon ni ni-edit"></em>
                                                                <span>Editar</span>
                                                            </a>
                                                        </li>




                                                        <li>
                                                            <a href="delete-client/{{ $client->id }}">
                                                                <em class="icon ni ni-trash-fill"></em>
                                                                <span>Borrar</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                @endforeach


                            </div>
                            {{-- no-results-message s --}}
                            <div class="card" id="no-results-message" style="display: none;">
                                <div class="card-inner">

                                    <b>
                                        No se encontraron clientes.</b>

                                </div>
                            </div>
                            {{-- no-results-message e --}}

                            <!-- pagination .card -->
                            <div class="card">
                                <div class="card-inner">
                                    <div class="nk-block-between-md g-3">
                                        <div class="g">
                                            <!-- Pagination links with custom prev and next buttons -->
                                            <ul class="pagination justify-content-center justify-content-md-start">
                                                @if ($clients->onFirstPage())
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1"
                                                            aria-disabled="true">Prev</a>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $clients->previousPageUrl() }}">Prev</a>
                                                    </li>
                                                @endif

                                                @if ($clients->hasMorePages())
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $clients->nextPageUrl() }}">Next</a>
                                                    </li>
                                                @else
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1"
                                                            aria-disabled="true">Next</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>



                                        <!-- .pagination-goto -->
                                    </div>
                                    <!-- .nk-block-between -->
                                </div>
                                <!-- .card-inner -->
                            </div>
                            <!-- pagination .card  end-->
                        </div>




                    </div>
                </div>
            </div>
        </div>
        <!-- content @e -->



        {{--  modal start Add New  Client  --}}

        <!-- Modal Content Code -->
        <div class="modal fade" tabindex="-1" id="modalDefault">
            <div class="modal-dialog" role="document">
                <div class="modal-content"> <a href="#" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <em class="icon ni ni-cross"></em> </a>
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Nuevo Cliente</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('add-client') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="default-01">Nombre del Cliente</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="default-01" name="name">
                                    @if ($errors->has('name'))
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-01">Teléfono</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="default-01" name="phone">
                                    @if ($errors->has('phone'))
                                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="default-01">Correo electrónico
                                </label>
                                <div class="form-control-wrap">
                                    <input type="email" class="form-control" id="default-01" name="email">
                                    @if ($errors->has('email'))
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar Cliente</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

        {{-- modal End Add New  Client --}}


        <!-- Client Update Modal S -->

        <div class="modal fade" id="editClientModal" tabindex="-1" role="dialog"
            aria-labelledby="editClientModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editClientModalLabel">Editar cliente
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editClientForm">
                            @csrf
                            <input type="hidden" name="id" id="client-id">
                            <div class="form-group">
                                <label for="client-name">Nombre</label>
                                <input type="text" class="form-control" id="client-name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="client-email">Correo electrónico
                                </label>
                                <input type="email" class="form-control" id="client-email" name="email"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="client-phone">Teléfono</label>
                                <input type="text" class="form-control" id="client-phone" name="phone"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar cambios
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Client Update Modal E -->





        <!-- footer @s -->
        @include('partials._footer')
        <!-- footer @e -->

    </div>
    <!-- wrap @e -->


</div>
<!-- main end -->


@include('partials.scripts')
