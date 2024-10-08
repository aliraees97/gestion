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
                                    <h3 class="nk-block-title page-title">Ventas récord
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
                                                    <div class="drodown">
                                                        <a href="#"
                                                            class="dropdown-toggle btn btn-white btn-dim btn-outline-light"
                                                            data-bs-toggle="dropdown">
                                                            <em class="d-none d-sm-inline icon ni ni-filter-alt"></em>
                                                            <span>Filtered By</span>
                                                            <em class="dd-indc icon ni ni-chevron-right"></em>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#" class="filter-option"
                                                                        data-filter="all"><span>All</span></a></li>
                                                                <li><a href="#" class="filter-option"
                                                                        data-filter="open"><span>Open</span></a></li>
                                                                <li><a href="#" class="filter-option"
                                                                        data-filter="closed"><span>Closed</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
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
                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Teléfono</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Auto</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Tipo de lavado</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Complementos</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Método de pago</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Total</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Fecha</span></div>
                                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Estado de ventas</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Acción</span></div>
                                </div>

                                @foreach ($records as $record)
                                    <div class="nk-tb-item" data-status="{{ $record->status }}">



                                        <div class="nk-tb-col">
                                            <a href="detail/{{ $record->customer->id }}">
                                                <div class="user-card">
                                                    <div class="user-avatar bg-primary">
                                                        <span>{{ htmlspecialchars(ucfirst(substr($record->customer->name ?? '', 0, 1))) }}</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span
                                                            class="tb-lead">{{ htmlspecialchars($record->customer->name ?? '') }}
                                                            <span class="dot dot-success d-md-none ms-1"></span></span>
                                                        <span>{{ htmlspecialchars($record->customer->email ?? '') }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($record->customer->phone ?? '') }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($record->car->name ?? '') }}
                                                {{ htmlspecialchars($record->car->model ?? '') }}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($record->package->name ?? 'N/A') }}</span>
                                            <!-- Assuming relationship -->
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            @foreach (json_decode($record->services ?? '[]') as $service)
                                                <span
                                                    class="badge bg-primary me-1">{{ htmlspecialchars($service) }}</span>
                                            @endforeach
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($record->payment->name ?? 'N/A') }}</span>
                                            <!-- Assuming relationship -->
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ htmlspecialchars($record->total ?? 'N/A') }}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ $record->created_at ? $record->created_at->format('Y-m-d') : 'N/A' }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            @if ($record->status == 'open')
                                                <span
                                                    class="tb-status text-success">{{ ucfirst($record->status ?? 'N/A') }}</span>
                                            @else
                                                <span
                                                    class="tb-status text-danger">{{ ucfirst($record->status ?? 'N/A') }}</span>
                                            @endif

                                        </div>


                                        <div class="nk-tb-col tb-col-md">
                                            <div class="drodown">
                                                <a href="#"
                                                    class="btn btn-sm btn-icon btn-trigger dropdown-toggle"
                                                    data-bs-toggle="dropdown">
                                                    <em class="icon ni ni-more-h"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">

                                                        <li>
                                                            <a href="#" class="confirmSingleSale"
                                                                data-record-id="{{ $record->id }}">
                                                                <em class="icon ni ni-reports"></em>
                                                                <span>Venta Cerrada</span>
                                                            </a>

                                                        </li>

                                                        <li>
                                                            <a href="#" class="editrecord"
                                                                data-record-id="{{ $record->id }}">
                                                                <em class="icon ni ni-edit"></em>
                                                                <span>Editar </span>
                                                            </a>
                                                        </li>


                                                        <li>
                                                            <a href="delete-record/{{ $record->id }}">
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

                            <div class="no-data" style="display:none; text-align:center; padding:20px;">
                                <div class="card-inner">
                                    <b>No se encontraron registros.</b>
                                </div>
                            </div>



                        </div>





                    </div>
                </div>
            </div>
        </div>
        <!-- content @e -->



        <!-- Modal for Adding New Records S -->
        <div class="modal fade" tabindex="-1" id="modalDefault">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar nueva venta récord</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('add-record') }}" method="POST">
                            @csrf

                            <!-- Customer Selection -->
                            <div class="form-group">
                                <label for="customer_id">Client</label>
                                <select name="customer_id" id="customer_id" class="form-control" required>
                                    <option value="">Select Client</option>
                                    @foreach ($customer as $cust)
                                        <option value="{{ $cust->id }}">{{ $cust->name }}</option>
                                    @endforeach
                                </select>
                                <div class="form-note car-model">

                                    <a href="#" class="text-left" data-toggle="modal"
                                        data-target="#modalClient">
                                        Create a New Client</a>
                                </div>

                            </div>


                            <!-- Car Selection -->
                            <div class="form-group">
                                <label for="car_id">Car</label>
                                <select name="car_id" id="car_id" class="form-control" required>
                                    <option value="">Select Car</option>
                                    @foreach ($cars as $car)
                                        <option value="{{ $car->id }}">{{ $car->name }}</option>
                                    @endforeach
                                </select>
                                <div class="form-note">
                                    <a href="#" class="text-left" data-toggle="modal" data-target="#carModal">
                                        Create a New car</a>
                                </div>

                            </div>


                            <!-- Package Selection -->
                            <div class="form-group">
                                <label for="package_id">Package</label>
                                <select name="package_id" id="package_id" class="form-control" required>
                                    <option value="">Select Package</option>
                                    @foreach ($package as $pack)
                                        <option value="{{ $pack->id }}">{{ $pack->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Service Selection -->

                            <div class="form-group">
                                <label for="service_id">Service</label>
                                <div class="form-control-wrap">
                                    <select name="services[]" id="service_id"
                                        class="form-select js-select2 select2-hidden-accessible" multiple required
                                        data-placeholder="Select Multiple options" tabindex="-1" aria-hidden="true">
                                        @foreach ($services as $service)
                                            <option value="{{ $service->name }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <!-- Payment Method Selection -->
                            <div class="form-group">
                                <label for="payment_id">Payment Method</label>
                                <select name="payment_id" id="payment_id" class="form-control" required>
                                    <option value="">Select Payment Method</option>
                                    @foreach ($payment as $pay)
                                        <option value="{{ $pay->id }}">{{ $pay->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Guardar registro</button>

                                <button class="btn btn-danger close-modal ml-auto">Cerrar</button>
                            </div>

                        </form>
                    </div>


                </div>
            </div>
        </div>

        {{-- Modal for Adding New Records E --}}



        <!-- Edit Record Modal -->

        <div class="modal fade" id="editrecordModal" tabindex="-1" role="dialog"
            aria-labelledby="editrecordModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editrecordModalLabel">Editar Récord
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editRecordForm">
                            @csrf
                            <input type="hidden" name="id" id="record-id">

                            <div class="form-group">
                                <label for="package-id">Package</label>
                                <select class="form-control" id="package-id" name="package_id" required>
                                    <option value="">Select Package</option>
                                    @foreach ($package as $pack)
                                        <option value="{{ $pack->id }}">{{ $pack->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="car-id">Car</label>
                                <select class="form-control" id="car-id" name="car_id" required>
                                    <option value="">Select Car</option>
                                    @foreach ($cars as $car)
                                        <option value="{{ $car->id }}">{{ $car->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="services">Services</label>
                                <select class="form-control" id="services" name="services[]" multiple required>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->name }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="payment-id">Payment Method</label>
                                <select class="form-control" id="payment-id" name="payment_id" required>
                                    <option value="">Select Payment Method</option>
                                    @foreach ($payment as $pay)
                                        <option value="{{ $pay->id }}">{{ $pay->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>

                                <button class="btn btn-danger close-modal ml-auto">Cerrar</button>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Record Modal E -->





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





        {{--  modal start Add New car  --}}

        <div class="modal fade" tabindex="-1" id="carModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content"> <a href="#" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <em class="icon ni ni-cross"></em> </a>
                    <div class="modal-header">

                        <h5 class="modal-title">Agregar Nuevo Car</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('add-car-ajax') }}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" name="license_plate" class="form-control" id="license_plate "
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="licensePlate">Color</label>
                                <input type="text" name="color" class="form-control" id="color " required>
                            </div>

                            {{-- <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div> --}}

                            <div class="form-group d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button class="btn btn-danger  ml-auto" data-dismiss="modal"
                                    aria-label="Close">Cerrar</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

        {{-- modal End Add New  Service --}}




        <!-- footer @s -->
        @include('partials._footer')
        <!-- footer @e -->

    </div>
    <!-- wrap @e -->


</div>
<!-- main end -->


@include('partials.scripts')
