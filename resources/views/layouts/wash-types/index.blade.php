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
                                    <h3 class="nk-block-title page-title">Tipos de lavado
                                    </h3>
                                </div>

                                <!-- .nk-block-head-content -->

                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                            data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                                        <div class="toggle-expand-content" data-content="more-options">
                                            <ul class="nk-block-tools g-3">
                                                <li>
                                                    {{-- <div id="clients_filter"
                                                        class="form-control-wrap dataTables_filter">
                                                        <div class="form-icon form-icon-right">
                                                            <em class="icon ni ni-search"></em>
                                                        </div>
                                                        <input type="search" class="form-control" id="default-04"
                                                            placeholder="Search by name">
                                                    </div> --}}
                                                </li>


                                                <li class="nk-block-tools-opt">
                                                    <a href="#" class="btn btn-icon btn-primary d-md-none"><em
                                                            class="icon ni ni-plus"></em></a>
                                                    <button data-toggle="modal" data-target="#modalWash"
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

                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Precio</span></div>

                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Acción</span></div>
                                </div>
                                @foreach ($washTypes as $washType)
                                    <div class="nk-tb-item">


                                        <div class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary">
                                                    <span>{{ htmlspecialchars(ucfirst(substr($washType->name ?? '', 0, 1))) }}</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">{{ htmlspecialchars($washType->name ?? '') }}
                                                        <span class="dot dot-success d-md-none ms-1"></span>
                                                    </span>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($washType->price ?? '') }}</span>
                                        </div>


                                        <div class="nk-tb-col tb-col-md">

                                            <button data-id="{{ $washType->id }}" data-name="{{ $washType->name }}"
                                                data-price="{{ $washType->price }}" data-toggle="modal"
                                                data-target="#editWashModal" class="btn btn-success edit-wash">
                                                <em class="icon ni ni-edit"></em>
                                            </button>

                                            <a href="/delete-washType/{{ $washType->id }}" class="btn btn-danger ">
                                                <em class="icon ni ni-trash-alt"></em>
                                            </a>
                                        </div>

                                    </div>
                                @endforeach


                            </div>
                            {{-- no-results-message s --}}
                            <div class="card" id="no-results-message" style="display: none;">
                                <div class="card-inner">

                                    <b>No se encontraron tipos de lavado.</b>

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
                                                @if ($washTypes->onFirstPage())
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1"
                                                            aria-disabled="true">Prev</a>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $washTypes->previousPageUrl() }}">Prev</a>
                                                    </li>
                                                @endif

                                                @if ($washTypes->hasMorePages())
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $washTypes->nextPageUrl() }}">Next</a>
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



        {{--  modal start Add New  Wash Type  --}}

        <div class="modal fade" tabindex="-1" id="modalWash">
            <div class="modal-dialog" role="document">
                <div class="modal-content"> <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em> </a>
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Nuevo Wash Type</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('add-washType') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="model">Price</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="licensePlate">Precio</label>
                                <input type="text" name="price" class="form-control" id="price" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

        {{-- modal End Add New  Wash Type --}}


        <!-- Wash Type Update Modal S -->


        <div class="modal fade" id="editWashModal" tabindex="-1" role="dialog"
            aria-labelledby="editWashModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editWashModalLabel">Editar tipo de lavado
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editWashForm">
                            @csrf
                            <input type="hidden" name="id" id="wash-type-id">
                            <div class="form-group">
                                <label for="wash-type-name">Nombre</label>
                                <input type="text" class="form-control" id="wash-type-name" name="name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="wash-type-price">Precio</label>
                                <input type="text" class="form-control" id="wash-type-price" name="price"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar cambios
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wash Type Update Modal E -->





        <!-- footer @s -->
        @include('partials._footer')
        <!-- footer @e -->

    </div>
    <!-- wrap @e -->


</div>
<!-- main end -->


@include('partials.scripts')
