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
                                    <h3 class="nk-block-title page-title">Carros</h3>
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

                                                    <button class="btn btn-primary d-none d-md-inline-flex "
                                                        data-toggle="modal" data-target="#modalCar"><em
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
                                    <div class="nk-tb-col"><span class="sub-text">Modelo</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Matrícula</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Color</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Estado</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Tiempo</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Acción</span></div>

                                </div>

                                @foreach ($cars as $car)
                                    <div class="nk-tb-item">



                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($car->name ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($car->model ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($car->license_plate ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($car->color ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            {{-- <span>{{ htmlspecialchars($car->status ?? '') }}</span> --}}
                                            @if ($car->status != 'incomplete')
                                                <span class="tb-status text-success">Autos Listos</span>
                                            @else
                                                <span class="tb-status text-danger">Autos en Proceso</span>
                                            @endif
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            @if ($car->status != 'completed')
                                                <p><span class="timer" data-created-at="<?php echo $car->created_at; ?>"></span>
                                                </p>
                                            @else
                                                <span class="tb-status text-success">Done</span>
                                            @endif

                                        </div>


                                        <div class="nk-tb-col tb-col-md">

                                            <button data-id="{{ $car->id }}" data-name="{{ $car->name }}"
                                                data-model="{{ $car->model }}" data-colour="{{ $car->color }}"
                                                data-license="{{ $car->license_plate }}" data-toggle="modal"
                                                data-target="#editcarModal" class="btn btn-success edit-car">
                                                <em class="icon ni ni-edit"></em>
                                            </button>

                                            <a href="/delete-car/{{ $car->id }}" class="btn btn-danger ">
                                                <em class="icon ni ni-trash-alt"></em>
                                            </a>
                                        </div>

                                    </div>
                                @endforeach


                            </div>
                            {{-- no-results-message s --}}
                            <div class="card" id="no-results-message" style="display: none;">
                                <div class="card-inner">

                                    <b>No cars found.</b>

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
                                                @if ($cars->onFirstPage())
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1"
                                                            aria-disabled="true">Prev</a>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $cars->previousPageUrl() }}">Prev</a>
                                                    </li>
                                                @endif

                                                @if ($cars->hasMorePages())
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $cars->nextPageUrl() }}">Next</a>
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



        {{--  modal start Add New car  --}}

        <div class="modal fade" tabindex="-1" id="modalCar">
            <div class="modal-dialog" role="document">
                <div class="modal-content"> <a href="#" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <em class="icon ni ni-cross"></em> </a>
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Nuevo Car</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('add-car') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="model"> Nombre</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>

                            <div class="form-group">
                                <label for="model">Modelo </label>
                                <input type="text" name="model" class="form-control" id="model" required>
                            </div>

                            <div class="form-group">
                                <label for="licensePlate">Matrícula </label>
                                <input type="text" name="license_plate" class="form-control" id="license_plate"
                                    required>

                            </div>

                            <div class="form-group">
                                <label for="color">Color</label>
                                <input type="text" name="color" class="form-control" id="color " required>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

        {{-- modal End Add New  car --}}


        <!-- car Update Modal S -->

        <div class="modal fade" id="editcarModal" tabindex="-1" role="dialog" aria-labelledby="editcarModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editcarModalLabel">Update Car</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form id="editcarForm">
                            @csrf
                            <input type="hidden" name="id" id="car-id">

                            <div class="form-group">
                                <label for="car-name">Nombre</label>
                                <input type="text" class="form-control" id="car-name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="car-model">Modelo</label>
                                <input type="text" class="form-control" id="car-model" name="model" required>
                            </div>

                            <div class="form-group">
                                <label for="car-license">Matrícula</label>
                                <input type="text" class="form-control" id="car-license" name="license_plate"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="car-color">Color</label>
                                <input type="text" class="form-control" id="car-color" name="color" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- car Update Modal E -->




        {{--  modal start Add New  Client  --}}

        <div class="modal fade" tabindex="-1" id="modalClient">
            <div class="modal-dialog" role="document">
                <div class="modal-content"> <a href="#" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <em class="icon ni ni-cross"></em> </a>
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Nuevo Cliente</h5>
                    </div>
                    <div class="modal-body">
                        <div id="successMessage" class="alert alert-success" style="display: none;"></div>
                        <form action="{{ route('add-client-ajax') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="default-01">Nombre del Cliente</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="default-01" name="name"
                                        required>
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

                            {{-- <div class="form-group d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Guardar Cliente</button>
                                <button class="btn btn-danger  ml-auto" data-dismiss="modal"
                                    aria-label="Close">Cerrar</button>
                            </div> --}}
                        </form>

                    </div>

                </div>
            </div>
        </div>

        {{-- modal End Add New  Client --}}





        <!-- footer @s -->
        @include('partials._footer')
        <!-- footer @e -->

    </div>
    <!-- wrap @e -->


</div>
<!-- main end -->


@include('partials.scripts')
